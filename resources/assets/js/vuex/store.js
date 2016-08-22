import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        /**
         * Lista de cuentas bancarias disponibles.
         *
         * @type {Array}
         */
        accounts: []
    },

    mutations: {
        /**
         * Guarda las cuentas bancarias del usuario.
         *
         * @param {Object} state
         * @param {Array} accounts
         */
        SET_ACCOUNTS(state, accounts)
        {
            state.accounts = accounts;
        },
    }
});
