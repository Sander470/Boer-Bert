# Importing necessary libraries
from flask import Flask, request, jsonify
from chat import get_answer_for_question, load_knowledge_base, find_best_match

# Create a Flask web application
app = Flask(__name__)

# Load the knowledge base from a JSON file
knowledge_base = load_knowledge_base('knowledge_base.json')

# Define a route for the "/chat" endpoint that accepts POST requests
@app.route("/chat", methods=['POST'])
def chat_endpoint():
    # Extract JSON data from the incoming request
    data = request.get_json()

    # Extract the user's question from the JSON data
    user_question = data.get("question")

    # Find the best match for the user's question in the knowledge base
    best_match = find_best_match(user_question, [q["question"] for q in knowledge_base["questions"]])

    # Check if a best match is found
    if best_match:
        # Get the answer for the best-matched question from the knowledge base
        answer = get_answer_for_question(best_match, knowledge_base)
        response = {'answer': answer}
    else:
        # If no match is found, provide a default response
         
        response = {'answer': 'Bot: Ik weet het antwoord niet, kun je het mij leren?'}

    # Convert the response to JSON format and return it
    return jsonify(response)

# Run the Flask app if this script is executed directly
if __name__ == '__main__':
    app.run(debug=True)

    


