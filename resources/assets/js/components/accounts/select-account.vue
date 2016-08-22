<template>
    <select class="form-control" name="account_id" id="account_id" v-model="id">
        <option v-for="account in accounts" :value="account.id">{{ account.name }}</option>
    </select>
</template>

<script>
    import {accounts} from '../../vuex/getters';

    export default {
        props: ['id'],
        vuex: { getters: { accounts } },

        ready()
        {
            this.selectDefaultAccount();
        },

        watch: {
            accounts()
            {
                // El array 'accounts' es cargado de forma asincrónica, por
                // esta razón debemos llamar 'selectDefaultAccount' aquí
                // además de ser llamado en el método 'ready'. Fusha!
                this.selectDefaultAccount();
            }
        },

        methods: {
            /**
             * Selecciona una cuenta por default.
             */
            selectDefaultAccount()
            {
                if (! this.id && this.accounts.length > 0) {
                    this.id = this.accounts[0].id;
                }
            }
        }
    };
</script>
