from flask import Flask, jsonify, request

app = Flask(__name__)

@app.route("/chatbot", methods=["POST"])
def chatbot()
    user_data = {
        "user_id": user_id,
        "name": "Tiana",
        "email": "Tiana@example.com"
    }
        
    extra = request.args.get("extra")
    if extra:
        user_data["extra"] = extra

    return jsonify(user_data), 200


@app.route("/create-user", methods=["POST"])
def create_user():
    data = request.get_json()

    return jsonify(data), 201

if __name__ == "__main__":
    app.run(debug=True)