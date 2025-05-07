from flask import Flask, jsonify, request

app = Flask(__name__)

# Sample data to simulate a database
tasks = [
    {"id": 1, "title": "Buy groceries", "done": False},
    {"id": 2, "title": "Clean the house", "done": True},
]

# Route to get all tasks
@app.route('/api/tasks', methods=['GET'])
def get_tasks():
    return jsonify({"tasks": tasks})

# Route to get a single task by ID
@app.route('/api/tasks/<int:task_id>', methods=['GET'])
def get_task(task_id):
    task = next((task for task in tasks if task['id'] == task_id), None)
    if task is None:
        return jsonify({"message": "Task not found"}), 404
    return jsonify({"task": task})

# Route to create a new task
@app.route('/api/tasks', methods=['POST'])
def create_task():
    new_task = request.get_json()
    new_task['id'] = len(tasks) + 1
    tasks.append(new_task)
    return jsonify({"task": new_task}), 201

# Route to update an existing task
@app.route('/api/tasks/<int:task_id>', methods=['PUT'])
def update_task(task_id):
    task = next((task for task in tasks if task['id'] == task_id), None)
    if task is None:
        return jsonify({"message": "Task not found"}), 404
    
    updated_task = request.get_json()
    task.update(updated_task)
    return jsonify({"task": task})

# Route to delete a task
@app.route('/api/tasks/<int:task_id>', methods=['DELETE'])
def delete_task(task_id):
    global tasks
    tasks = [task for task in tasks if task['id'] != task_id]
    return jsonify({"message": "Task deleted successfully"})

if __name__ == '__main__':
    app.run(debug=True)
