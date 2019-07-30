new Vue({
    el: '#app',

    data: {
        name: '',
        description: ''
    },

    methods: {
        onSubmit() {
            axios.post('/projects', this.$data);
        }
    }
});