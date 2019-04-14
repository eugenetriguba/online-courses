var todos = [];

function displayTodos() {
	console.log('My todos: ', todos);
}

function addTodo(todo) {
	todos.push(todo);
	displayTodos();
}

function changeTodo(position, newValue) {
	todos[position - 1] = newValue; // subtract 1 for user-friendly counting
	displayTodos();
}

function deleteTodo(position) {
	todos.splice(position - 1, 1); // subtract 1 for user-friendly counting
	displayTodos();
}