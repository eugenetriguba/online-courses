var todoList = {
	todos: [],

	// Display all todos
	displayTodos: function() {
		console.log('My todos: ', this.todos);
	},

	// Add a todo & display all todos
	addTodo: function(todo) {
    this.todos.push(todo);
    this.displayTodos();
	},

	// Change a todo & display all todos
	changeTodo: function(position, newValue) {
		this.todos[position - 1] = newValue; // subtract 1 for human-friendly counting
		this.displayTodos();
	},

	// Delete a todo & display all todos
	deleteTodo: function(position){
		this.todos.splice(position - 1, 1); // subtract 1 for human-friendly counting
		this.displayTodos();
	}
};