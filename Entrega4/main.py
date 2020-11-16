from flask import Flask, json, request
from pymongo import MongoClient

USER = "grupo2"
PASS = "grupo2"
DATABASE = "grupo2"

URL = f"mongodb://{USER}:{PASS}@gray.ing.puc.cl/{DATABASE}?authSource=admin"
client = MongoClient(URL)

# MENSAJES
MESSAGE_KEYS = ['date', 'lat', 'long',
            'message', 'mid', 'receptant', 'sender']
# TEXT-SEARCH
SEARCH_KEYS = ['desired', 'required', 'forbidden', 'userId']
# NO RESULTS
no_results = {"success": True, "results": "empty", "reason": "no results"}
# NO USER ID
no_user_id = {"success": True, "results": "empty", "reason": "no user ID"}
# Nombre bbd
db = client["grupo2"]

app = Flask(__name__)

@app.route("/")
def home():
    '''
    Página de inicio
    '''
    return "<h1>¡Hola!</h1>"

@app.route("/users")
def get_users():
    '''
        usuarios.find({}, {_id: 0})
    '''
    users = list(db.usuarios.find({}, {"_id": 0}))

    return json.jsonify(users)


@app.route("/users/<int:uid>")
def get_user(uid):
    '''
        usuarios.find({}, {"_id": 0})
    '''
    users = list(db.usuarios.find({"uid": uid}, {"_id": 0}))

    return json.jsonify(users)

@app.route("/messages")
def get_messages():
    '''
        mensajes.find({}, {_id: 0})
    '''
    messages = list(db.mensajes.find({}, {"_id": 0}))
    
    return json.jsonify(messages)

@app.route("/messages/<int:mid>")
def get_message(mid):
    '''
        mensajes.find({}, {"_id": 0})
    '''
    messages = list(db.mensajes.find({"mid": mid}, {"_id": 0}))
    
    return json.jsonify(messages)

@app.route("/messages", methods=['POST'])
def create_message():

    data = {key: request.json[key] for key in MESSAGE_KEYS}

    result = db.mensajes.insert_one(data)

    return json.jsonify({"success": True})

@app.route("/messages", methods=['DELETE'])
def delete_message():
    mid = request.json['mid']
    db.mensajes.remove({"mid": mid})
    return json.jsonify({"success": True})


@app.route("/text-search")
# db.mensajes.find({$text: {$search: "salu3"}, sender: 320}, {_id: 0})
# db.mensajes.find({$text: {$search: "salu3"}, sender: { $in: [320, 325]}}, {_id: 0})
# db.mensajes.createIndex({"message": "text"})
def search_message():
    data = request.json
    for key in SEARCH_KEYS:
        if key not in data.keys():
            data[key] = []
    
    if type(data["userId"]) == int:
        mensajes = list(db.mensajes.find({"$text": {"$search": "salu3"}, "sender": data["userId"]}, {"_id": 0}))
        if not mensajes:
            return json.jsonify(no_user_id)
        return json.jsonify(mensajes)
    else:
        mensajes = list(db.mensajes.find({"$text": {"$search": "salu3"}}, {"_id": 0}))
        return json.jsonify(mensajes)


if __name__ == "__main__":
    app.run()
    app.run(debug=True)
