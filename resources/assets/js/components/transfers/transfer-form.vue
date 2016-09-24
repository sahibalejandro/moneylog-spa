<template>
<div class="transfer-form">
    <div class="lead">Transferencia</div>
    <hr>
    <form @submit.prevent="submit">

        <div class="row">
            <div class="col-sm-offset-1 col-sm-10 col-md-offset-3 col-md-6">
                <div class="row">

                    <!-- Monto -->
                    <div class="col-xs-12">
                        <div class="form-group">
                            <amount class="input-lg" :amount.sync="amount"></amount>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="col-xs-12">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="description" class="control-label">Descripción:</label>
                                <input class="form-control" type="text" v-model="description" :value="auto_description" autofocus required>
                            </div>
                        </div>
                    </div>

                    <!-- Cuenta de retiro -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Cuenta retiro:</label>
                            <select-account :id.sync="from_account_id"></select-account>
                        </div>
                    </div>

                    <!-- Cuenta destino -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Cuenta destino:</label>
                            <select-account :id.sync="to_account_id"></select-account>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <btn-modal modal="add-account">Agregar cuenta</btn-modal>
                        </div>
                    </div>

                    <!-- Fecha -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="date" class="control-label">Fecha:</label>
                            <input class="form-control" type="date" v-model="date" required>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Transferir</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</template>

<script>
import m from '../../messages';
import Amount from '../amount.vue';
import {accounts} from '../../vuex/getters';
import SelectAccount from '../accounts/select-account.vue';
import BtnModal from '../btn-modal.vue';

export default {
    components: {
        Amount,
        SelectAccount,
        BtnModal,
    },

    vuex: { getters: {accounts} },

    data()
    {
        return {
            amount: null,
            from_account_id: null,
            to_account_id: null,
            date: null,
            description: null,
        };
    },

    computed: {
        /**
         * Devuelve la descripción automática para de la transferencia.
         *
         * @return {string}
         */
        auto_description()
        {
            let from = this.getAccount(this.from_account_id).name;
            let to   = this.getAccount(this.to_account_id).name;

            return `Transferencia de ${from} a ${to}`;
        },
    },

    methods: {
        /**
         * Devuelve la cuenta con el id dado.
         *
         * @param  {number} id
         * @return {object}
         */
        getAccount(id)
        {
            return this.accounts.find(a => a.id == id);
        },

        /**
         * Envia los datos de la transferecia.
         */
        submit()
        {
            this.$http.post('/api/transfers', this.$data)
                .then(this.submitSuccess, this.submitFails);
        },

        /**
         * Cuando el envío es exitoso.
         *
         * @param {object} response
         */
        submitSuccess(response)
        {
            m.success('Transferencia realizada');
            
            this.$router.go({name: 'movements.index'});
        },

        /**
         * Cuando el envío falla.
         *
         * @param {object} response
         */
        submitFails(response)
        {
            // bootstrap/vue-resource.js
        },
    }, // methods
};
</script>
