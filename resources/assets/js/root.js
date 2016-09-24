import Vue from 'vue';
import store from './vuex/store';
import Modal from './components/modal.vue';
import GlobalTotals from './components/global-totals.vue';

export default Vue.extend({
    store,

    components: {GlobalTotals, Modal},

    data()
    {
        return {
            ready: false,
            fail: false,
        };
    },

    compiled()
    {
        this.loadGlobalData();
    },

    vuex: {
        actions: {
            /**
             * Carga la lista de cuentas bancarias.
             *
             * @param {Vuex.Store} store
             */
            loadGlobalData(store)
            {
                this.$http.get('/api/global-data').then(
                    response => {
                        const data = response.json();

                        store.dispatch('SET_ACCOUNTS', data.accounts);
                        store.dispatch('SET_ACCOUNTS_TOTAL', data.accounts_total);
                        store.dispatch('SET_PAYMENTS_TOTAL', data.payments_total);

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
