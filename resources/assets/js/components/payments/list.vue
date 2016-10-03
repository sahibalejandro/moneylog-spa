<template>
    <payment v-for="payment in payments" :payment="payment"></payment>
</template>

<script>
import Payment from './payment.vue';

export default {
    props: {
        url: {
            required: true,
            type: String
        }
    },

    components: {Payment},

    data() {
        return {
            loading: false,
            payments: []
        }
    },

    compiled()
    {
        this.loadPayments();
    },

    methods: {
        loadPayments()
        {
            this.loading = true;

            this.$http.get(this.url).then(
                response => this.payments = response.json(),
                response => {
                    // bootstrap/vue-resource.js
                }
            ).then( payments => this.loading = false );
        },
    }
}
</script>
