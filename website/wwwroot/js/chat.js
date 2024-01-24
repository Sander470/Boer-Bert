// Import the MyConstants class
import CampingChatbot from './converted.js';

// Create an instance of the class
const campingBot = new CampingChatbot();

const chatbotToggler = document.querySelector(".chatbot-toggler");
const closeBtn = document.querySelector(".close-btn");
const chatbox = document.querySelector(".chatbox");
const chatInput = document.querySelector(".chat-input textarea");
const sendChatBtn = document.querySelector(".chat-input span");
let userMessage = null; // Variable to store user's message
let botResponse = "Error, something went wrong"; // Variable to store bot's message
let phase = 0;
let parser = true;
const inputInitHeight = chatInput.scrollHeight;
const createChatLi = (message, className) => {
  // Create a chat <li> element with passed message and className
  const chatLi = document.createElement("li");
  chatLi.classList.add("chat", `${className}`);
  let chatContent = className === "outgoing" ? `<p></p>` : `<span class="material-symbols-outlined">smart_toy</span><p></p>`;
  chatLi.innerHTML = chatContent;
  chatLi.querySelector("p").textContent = message;
  return chatLi;
}

function userMessageToCampingbot(um) {
  console.log(phase);
  if (phase >= 3) {
    campingBot.getUserInfo(um, phase, generateResponse);
  }
  else if (botResponse.includes("duidelijk")) {
    botResponse = campingBot.getUserInfo(um, phase, null);
    phase = 1;
  } else {
    botResponse = campingBot.getUserInfo(um, phase, null);
    phase++;
  }
  
}

function generateResponse(botResponse) {
  chatbox.appendChild(createChatLi(botResponse, "incoming"));
  chatbox.scrollTo(0, chatbox.scrollHeight);
}

const handleChat = () => {
  userMessage = chatInput.value.trim(); // Get user entered message and remove extra whitespace
  if (!userMessage) return;
  // Clear the input textarea and set its height to default
  chatInput.value = "";
  chatInput.style.height = `${inputInitHeight}px`;
  // Append the user's message to the chatbox
  chatbox.appendChild(createChatLi(userMessage, "outgoing"));
  chatbox.scrollTo(0, chatbox.scrollHeight);

  userMessageToCampingbot(userMessage);

  // Immediately generate the response
  if (parser){
    if (phase > 2) {
      parser = false;
    }
    generateResponse(botResponse);
  }
}

chatInput.addEventListener("input", () => {
  // Adjust the height of the input textarea based on its content
  chatInput.style.height = `${inputInitHeight}px`;
  chatInput.style.height = `${chatInput.scrollHeight}px`;
});
chatInput.addEventListener("keydown", (e) => {
  // If Enter key is pressed without Shift key and the window width is greater than 800px, handle the chat
  if (e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
    e.preventDefault();
    handleChat();
  }
});

sendChatBtn.addEventListener("click", handleChat);
closeBtn.addEventListener("click", () => document.body.classList.remove("show-chatbot"));
chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"));