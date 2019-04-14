var todoList = {
	todos: [],

	// Add a todo object
	addTodo: function(todoText) {
    this.todos.push({
    	todoText: todoText,
    	completed: false
    });
	},

	// Change a todo
	changeTodo: function(position, todoText) {
		this.todos[position - 1].todoText = todoText; // Subtract 1 for human-readable counting
	},

	// Delete a todo
	deleteTodo: function(position) {
		this.todos.splice(position - 1, 1);
	},

	// toggle the completed state as true or false
	toggleCompleted: function(position) {
		var todo = this.todos[position - 1]; 
		todo.completed = !todo.completed;
	},

	// toggle all todos completed status to true or false
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
	}
};

// Handle user interaction
var handlers = {
	addTodo: function() {
		var addTodoTextInput = document.getElementById('addTodoTextInput');
		todoList.addTodo(addTodoTextInput.value);
		addTodoTextInput.value = '';
		view.displayTodos();
	},
	changeTodo: function() {
		// Grab inputs from DOM
		var changeTodoPositionInput = document.getElementById('changeTodoPositionInput');
		var changeTodoTextInput     = document.getElementById('changeTodoTextInput');

		todoList.changeTodo(changeTodoPositionInput.valueAsNumber, changeTodoTextInput.value);

		// Reset inputs
		changeTodoPositionInput.value = '';
		changeTodoTextInput.value     = '';

		view.displayTodos();
	},
	deleteTodo: function() {
		var deleteTodoPositionInput = document.getElementById('deleteTodoPositionInput');
		todoList.deleteTodo(deleteTodoPositionInput.valueAsNumber);
		deleteTodoPositionInput = '';
		view.displayTodos();
	},
	toggleCompleted: function() {
		var toggleCompletedPositionInput = document.getElementById('toggleCompletedPositionInput');
		todoList.toggleCompleted(toggleCompletedPositionInput.valueAsNumber);
		toggleCompletedPositionInput = '';
		view.displayTodos();
	},
	toggleAll: function() {
		todoList.toggleAll();
		view.displayTodos();
	}
};

// Handle information displayed to the screen
var view = {
	displayTodos: function() {
		var todosUl = document.getElementById('todosUl');

		// Reset todosUl
		todosUl.innerHTML = '';

		for (var i = 0; i < todoList.todos.length; i++) {
			var todoLi  = document.createElement('li');
			var todo    = todoList.todos[i];
			var todoTextWithCompletion = '';

			// Find out if todo's completed status & assign value accordingly
			if (todo.completed === true) {
				todoTextWithCompletion = `(x) ${todo.todoText}`;
			} else {
				todoTextWithCompletion = `( ) ${todo.todoText}`;
			}

			todoLi.textContent = todoTextWithCompletion;
			todosUl.appendChild(todoLi);
		}
	}
};