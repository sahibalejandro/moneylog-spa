<template>
    <div class="make-payment">

        <div class="lead">Hacer pago</div>

        <div class="row">
            <!-- Descripción -->
            <div class="col-sm-7 col-md-6">
                <p class="make-payment__description">
                    {{ payment.description }}
                </p>
                <p>Vence: {{ payment.due_date | moment }}</p>
            </div>

            <!-- Monto -->
            <div class="col-sm-5 col-md-3">
                <div class="make-payment__amount">
                    {{ payment.amount | cents | currency }}
                </div>
            </div>

            <div class="col-sm-offset-7 col-sm-5 col-md-offset-0 col-md-3">
                <!-- Seleccionar cuenta -->
                <div class="form-group">
                    <label>Cargar a la cuenta:</label>
                    <select class="form-control">
                        <option v-for="account in accounts" :value="account.id">{{ account.name }}</option>
                    </select>
                </div>
                <button class="btn btn-block btn-success">Hacer pago</button>
            </div>
        </div>
    </div>
</template>

<script>
import {accounts} from '../../vuex/getters';
import {closeModal} from '../../vuex/actions/modal';

export default {
    vuex: {
        getters: {accounts},
        actions: {closeModal}
    },

    data() {
    
        return {
            payment: {}
        };
    
    }, /* End of data() */

    created()
    {
        this.$http.get('/api/payments/' + this.$route.params.id).then(
            response => {
                this.payment = response.json();
            },
            response => {
                // bootstrap/vue-resource.js
            }
        ); /* End of this.$http.get(...) */
    },
}
</script>
