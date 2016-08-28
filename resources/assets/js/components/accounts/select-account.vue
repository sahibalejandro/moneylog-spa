<template>
    <select class="form-control" name="account_id" id="account_id" v-model="id">
        <option v-for="account in accounts" :value="account.id">{{ account.name }}</option>
    </select>
    <add-account @account-added="selectAddedAccount"></add-account>
</template>

<script>
    import {accounts} from '../../vuex/getters';
    import AddAccount from './add-account.vue';

    export default {
        props: ['id'],
        components: { AddAccount },
        vuex: { getters: { accounts } },

        created()
        {
            this.selectDefaultAccount();
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
            },

            /**
             * Invocado cuando se agregó una cuenta nueva.
             *
             * @param {object} account
             */
            selectAddedAccount(account)
            {
                this.id = account.id;
            },
        }
    };
</script>
