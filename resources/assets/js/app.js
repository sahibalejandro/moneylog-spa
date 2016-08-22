import Vue from 'vue';
import store from './vuex/store';

export default Vue.extend({
    store,
    data()
    {
        return {
            ready: false
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
                this.$http.get('/api/accounts').then(resp => {
                    store.dispatch('SET_ACCOUNTS', resp.json());
                    this.ready = true;
                }, resp => {
                    console.error('No se pudieron cargar las cuentas.');
                });
            } // vuex.actions.loadAccounts
        } // vuex.actions
    } // vuex
});
