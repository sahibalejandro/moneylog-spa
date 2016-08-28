import Vue from 'vue';
import store from './vuex/store';

export default Vue.extend({
    store,

    data()
    {
        return {
            ready: false,
            fail: false,
        };
    },

    compiled()
    {
        this.loadAccounts();
    },

    vuex: {
        actions: {
            /**
             * Carga la lista de cuentas bancarias.
             *
             * @param {Vuex.Store} store
             */
            loadAccounts(store)
            {
                this.$http.get('/api/accounts').then(
                    response => {
                        store.dispatch('SET_ACCOUNTS', response.json());
                        this.ready = true;
                    },
                    response => {
                        // bootstrap/vue-resource.js
                    }
                );
            } // vuex.actions.loadAccounts
        } // vuex.actions
    } // vuex
});
