<template>
<button class="type btn btn-sm btn-link" type="button" @click.prevent="toggle">Agregar cuenta</button>
<div class="form-inline" v-show="states.opened">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Nueva cuenta" size="40"
            v-el:name
            v-model="account.name"
            @keydown.enter.prevent="save"
        >
        <button type="button" class="btn btn-default" @click="save">Agregar</button>
    </div>
</div>
</template>

<script>
export default {
    data()
    {
        return {
            states: {
                opened: false,
            },
            account: {
                name: ''
            },
        };
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
            }
        }
    },

    methods: {
        /**
         * Muestra/oculta el formulario para agregar una nueva cuenta.
         */
        toggle()
        {
            this.states.opened = !this.states.opened;

            if (this.states.opened) {
                this.$nextTick( () => this.$els.name.focus() );
            }
        },

        /**
         * Envia los datos de la nueva cuenta para guardarla en base de datos.
         */
        save()
        {
            this.$http.post('/api/accounts', this.account)
                .then(this.saveSuccess, this.saveFailed);
        },

        /**
         * Cuando el guardado es exitoso.
         *
         * @param {object} response
         */
        saveSuccess(response)
        {
            let account = response.json();

            this.addAccount(account);
            this.account.name = '';
            this.toggle();
            this.$dispatch('account-added', account);
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
