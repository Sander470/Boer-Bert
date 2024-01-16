import { getClosestMatch } from 'difflib';
import { readFileSync, writeFileSync } from 'fs';

function loadKnowledgeBase(filePath) {
    try {
        const data = JSON.parse(readFileSync(filePath, 'utf-8'));
        return data;
    } catch (error) {
        console.error(`Error reading file ${filePath}:`, error);
        throw error;
    }
}

function saveKnowledgeBase(filePath, data) {
    try {
        writeFileSync(filePath, JSON.stringify(data, null, 2));
        console.log(`Data saved to ${filePath}`);
    } catch (error) {
        console.error(`Error writing to file ${filePath}:`, error);
        throw error;
    }
}

function findBestMatch(userQuestion, questions) {
    const matches = getClosestMatch(userQuestion, questions, 1, 0.6);
    return matches[0] || null;
}

function getAnswerForQuestion(question, knowledgeBase) {
    for (const q of knowledgeBase.questions) {
        if (q.question === question) {
            return q.answer;
        }
    }
    return null;
}

class CampingChatbot {
    constructor() {
        this.name = "";
        this.toilet = "";
        this.speeltuin = "";
    }

    stopProgram() {
        console.log("Isgoed. Doei doei!");
        process.exit();
    }

    getUserInfo() {
        console.log("Hi! Ik ben jouw camping chatbot. Ik kan jouw helpen met het kiezen van de juiste plek en eventuele andere vragen.");
        this.name = prompt("Hoe kan ik je noemen? ");
        console.log(`\nLeuk je te ontmoeten, ${this.name}! Ik zal je nu aan paar vragen stellen om de beste plek voor jouw uit te kiezen.`);
        this.toilet = prompt("Moet ik een kampeerplek regelen die niet te ver van 't toilet is? (Ja/Nee) ");
        this.speeltuin = prompt("Wil je een plekje dichtbij de speeltuin? (Ja/Nee) ");
    }

    suggestCampingLocation() {
        console.log(`\nHoi, ${this.name}! Gebaseerd op jouw keuzes, raad ik deze plek aan:`);
        if (this.toilet.toLowerCase().includes("ja") && this.speeltuin.toLowerCase().includes("ja")) {
            console.log(" A is de juiste plek voor jou!");
        } else if (this.toilet.toLowerCase().includes("ja") && this.speeltuin.toLowerCase().includes("nee")) {
            console.log(" B is de juiste plek voor jou!");
        } else if (this.toilet.toLowerCase().includes("nee") && this.speeltuin.toLowerCase().includes("ja")) {
            console.log(" C is de juiste plek voor jou!");
        } else if (this.toilet.toLowerCase().includes("nee") && this.speeltuin.toLowerCase().includes("nee")) {
            console.log(" D is de juiste plek voor jou!");
        } else if (this.toilet.toLowerCase() === "" && this.speeltuin.toLowerCase() === "") {
            const continueChat = prompt('Het was voor mij niet duidelijk. Wil je de test opnieuw doen? (ja/nee): ');
            if (continueChat.toLowerCase() === 'nee') {
                console.log("oke?");
            }
        }
    }

    main() {
        this.getUserInfo();
        this.suggestCampingLocation();
        const continueChat = prompt('Wil je blijven chatten? (ja/nee): ');
        if (continueChat.toLowerCase() === 'nee') {
            this.stopProgram();
        } else {
            console.log("Wat zijn je andere eventuele vragen?");
        }
    }

    chatBot() {
        const knowledgeBase = loadKnowledgeBase('knowledge_base.json');
        while (true) {
            const userInput = prompt('You: ');
            if (userInput.toLowerCase() === 'quit') {
                break;
            }
            const bestMatch = findBestMatch(userInput, knowledgeBase.questions.map(q => q.question));
            if (bestMatch) {
                const answer = getAnswerForQuestion(bestMatch, knowledgeBase);
                if (answer) {
                    console.log(`Bot: ${answer}`);
                    continue;
                } else {
                    console.log(`Bot: Ik weet het antwoord niet voor "${bestMatch}". kun je het me leren?`);
                    const newAnswer = prompt('Type the answer or "skip" to skip: ');
                    if (newAnswer.toLowerCase() !== 'skip') {
                        knowledgeBase.questions.push({ question: bestMatch, answer: newAnswer });
                        saveKnowledgeBase('knowledge_base.json', knowledgeBase);
                        console.log(`Bot: bedankt! Ik heb een nieuw antwoord geleerd voor "${bestMatch}"!`);
                    }
                }
            } else {
                console.log('Bot: Ik weet het antwoord niet, kun je het mij leren?');
                const newAnswer = prompt('Typ de vraag of skip om te skippen: ');
                if (newAnswer.toLowerCase() !== 'skip') {
                    const newAnswerResponse = prompt('Type het antwoord: ');
                    knowledgeBase.questions.push({ question: newAnswer, answer: newAnswerResponse });
                    saveKnowledgeBase('knowledge_base.json', knowledgeBase);
                    console.log(`Bot: Bedankt! Ik heb een nieuw antwoord geleerd voor "${newAnswer}"!`);
                }
            }
            const continueChat = prompt('Wil je blijven chatten? (ja/nee): ');
            if (continueChat.toLowerCase() === 'nee') {
                this.stopProgram();
            } else {
                console.log("Wat zijn je andere eventuele vragen?");
            }
        }
    }
}

const campingBot = new CampingChatbot();