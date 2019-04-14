// STORE TODOS
var todos = [];

// DISPLAY TODOS
console.log(todos);

// ADD TODO
todos.push('new todo');
todos.push('another todo');
todos.push('last todo');

// CHANGE TODO
todos[1] = 'get milk';

// REMOVE TODO
todos.splice(1, 1); // removes second todo
todos.pop();       // removes last todo
todos.shift();     // removes first todo