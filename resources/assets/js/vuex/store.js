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
         * @param {object} state
         * @param {array} accounts
         */
        SET_ACCOUNTS(state, accounts)
        {
            state.accounts = accounts;
        },

        /**
         * Agrega una nueva cuenta.
         *
         * @param {object} state
         * @param {object} account
         */
        ADD_ACCOUNT(state, account)
        {
            state.accounts.push(account);
        }
    }
});
