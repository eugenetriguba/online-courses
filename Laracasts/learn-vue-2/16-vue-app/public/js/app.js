new Vue({
    el: '#app',

    data: {
        skills: []
    },

    mounted() {
        // make an ajax request to our server - /skills
        // fetch() ? need to use polyfill
        // if jQuery, $.ajax() or $.getJson()
        // axios

        axios.get('/skills').then(response => this.skills = response.data);
    }
});