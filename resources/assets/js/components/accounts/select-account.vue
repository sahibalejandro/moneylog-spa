<template>
    <select class="form-control" name="account_id" id="account_id" v-model="id">
        <option v-for="account in accounts" :value="account.id">{{ account.name }}</option>
    </select>
</template>

<script>
    import {accounts} from '../../vuex/getters';
    import pubsub from '../../utils/pubsub';

    export default {
        props: ['id'],
        vuex: { getters: { accounts } },

        created()
        {
            this.selectDefaultAccount();

            pubsub.sub('account.added', account => {
                this.id = account.id;
            });
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
        }
    };
</script>
