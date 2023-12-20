from flask import Flask, request, jsonify
from chat import get_answer_for_question, load_knowledge_base, find_best_match

app = Flask(__name__)

knowledge_base = load_knowledge_base('knowledge_base.json')


@app.route("/chat", methods=['POST'])
def chat_endpoint():
    data = request.get_json()
    user_question = data.get("question")

    best_match = find_best_match(user_question, [q["question"] for q in knowledge_base["questions"]])

    if best_match:
        answer = get_answer_for_question(best_match, knowledge_base)
        response = {'answer': answer}
    
    return jsonify(response)

if __name__ == '__main__':
    app.run(debug=True)
    


