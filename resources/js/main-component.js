const axios = require('axios').default;

export default {
    data() {
        return {
            message: 'Hello Vue!',
            customers: ''
        }
    },
    methods: {
        loadUsers(){
            axios.get('./api/customers').then(response => {
                this.customers = response.data.customers;
                // console.log(response)
            });
        }
    },
    mounted() {
        console.log('....app mounted')
        this.loadUsers();
    },
    template: `<div>Customers: <div v-for="customer of customers">{{customer.name}}</div></div>`
}
