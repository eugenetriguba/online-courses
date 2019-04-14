var todoList = {
	todos: [],

	// Display all todos
	displayTodos: function() {
		console.log('My todos: ', this.todos);
	},

	// Add a todo object & display all todos
	addTodo: function(todoText) {
    this.todos.push({
    	todoText: todoText,
    	completed: false
    });
    this.displayTodos();
	},

	// Change a todo & display all todos
	changeTodo: function(position, todoText) {
		this.todos[position - 1].todoText = todoText; // Subtract 1 for human-readable counting
		this.displayTodos();
	},

	// Delete a todo & display all todos
	deleteTodo: function(position){
		this.todos.splice(position - 1, 1);
		this.displayTodos();
	},

	// toggle the completed state as true or false
	toggleCompleted: function(position){
		var todo = this.todos[position - 1]; 
		todo.completed = !todo.completed;
		this.displayTodos();
	}
};