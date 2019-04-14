var todoList = {
	todos: [],

	// Display all todos & their completed status
	displayTodos: function() {

		if(this.todos.length === 0) {
			// Print a message if todo's are empty.
			console.log("You have no todos yet.");
		} else {
			// Print each todo's text & their completed status
			for(var i = 0; i < this.todos.length; i++) {
				if (this.todos[i].completed === true) {
					console.log(`Todo #${i + 1}: (x)`, this.todos[i].todoText);
				} else {
					console.log(`Todo #${i + 1}: ( )`, this.todos[i].todoText);
				}
			}
		}
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
	deleteTodo: function(position) {
		this.todos.splice(position - 1, 1);
		this.displayTodos();
	},

	// toggle the completed state as true or false
	toggleCompleted: function(position) {
		var todo = this.todos[position - 1]; 
		todo.completed = !todo.completed;
		this.displayTodos();
	},

	toggleAll: function() {
		var totalTodos = this.todos.length;
		var completedTodos = 0;
		var i;

		// Get number of completed todos.
		for (i = 0; i < totalTodos; i++) {
			if (this.todos[i].completed === true) {
				completedTodos++;
			}
		}

		// If everything is true
		if (completedTodos === totalTodos) {
			// make everything false
			for (i = 0; i < totalTodos; i++) {
				this.todos[i].completed = false;
			}
		} else {
			// Otherwise, make everything true
			for (i = 0; i < totalTodos; i++) {
				this.todos[i].completed = true;
			}
		}

		// Display all todos
		this.displayTodos();
	}
};