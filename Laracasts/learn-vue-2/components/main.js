Vue.component('task', {
    template: '<li><slot></slot></li>',

    data() {
        return {
            message: 'foo'
        };
    }
});

new Vue({
    el: '#root'
});