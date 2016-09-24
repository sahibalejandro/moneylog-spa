<template>
    <div class="lead">Agregar nueva cuenta</div>
    <form @submit.prevent="save" class="form-vertical">
        <div class="row">
            <!-- Nombre de la cuenta -->
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="add-account-name">Cuenta:</label>
                    <input type="text" class="form-control" placeholder="Cuenta Bancaria" size="40"
                        required
                        v-el:name
                        v-model="account.name"
                    >
                </div>
            </div>

            <!-- Monto inicial -->
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="add-account-amount">Monto inicial:</label>
                    <amount :amount.sync="account.amount"></amount>
                </div>
            </div>

            <!-- Botón para agregar -->
            <div class="col-xs-12 text-right">
                <button type="submit" class="btn btn-success">Agregar cuenta</button>
            </div>
        </div>
    </form>
</template>

<script>
import Amount from '../amount.vue';
import pubsub from '../../utils/pubsub';

export default {
    components: {Amount},

    data()
    {
        return {
            account: {
                name: '',
                amount: 100000,
            },
        };
    },

    ready()
    {
        this.$nextTick( () => this.$els.name.focus() );
    },

    vuex: {
        actions: {
            /**
             * Agrega una cuenta al store.
             *
             * @param {object} state
             * @param {object} account
             */
            addAccount(state, account)
            {
                state.dispatch('ADD_ACCOUNT', account);
            },

            close(state)
            {
                state.dispatch('SET_MODAL', null);
            }
        }
    },

    methods: {

        /**
         * Envia los datos de la nueva cuenta para guardarla en base de datos.
         */
        save()
        {
            this.$http.post('/api/accounts', this.account)
                .then(this.saveSuccess, this.saveFailed);
        },

        /**
         * Cuando el guardado es exitoso. Despacha el evento "account-added".
         *
         * @param {object} response
         */
        saveSuccess(response)
        {
            let account = response.json();

            this.addAccount(account);

            pubsub.pub('account.added', account);

            this.close();
        },

        /**
         * Cuando el guardado falla.
         *
         * @param {object} response
         */
        saveFailed(response)
        {
            // bootstrap/vue-resource.js
        },
    },
};
</script>
