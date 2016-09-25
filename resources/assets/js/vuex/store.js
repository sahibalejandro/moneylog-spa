import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    strict: true,
    state: {
        /**
         * Lista de cuentas bancarias disponibles.
         *
         * @type {Array}
         */
        accounts: [],

        /**
         * Nombre del componente que se muestra en el modal.
         * 
         * @type {String}
         */
        currentModal: null,

        /**
         * Monto total en las cuentas.
         * 
         * @type {Number}
         */
        accountsTotal: 0,

        /**
         * Monto total a pagar.
         *
         * @type {Number}
         */
        paymentsTotal: 0,
    },

    mutations: {
        SET_ACCOUNTS: (state, accounts) => state.accounts = accounts,
        ADD_ACCOUNT: (state, account) => state.accounts.push(account),
        SET_ACCOUNTS_TOTAL: (state, total) => state.accountsTotal = total,
        SET_PAYMENTS_TOTAL: (state, total) => state.paymentsTotal = total,
        INCREMENT_ACCOUNTS_TOTAL: (state, amount) => state.accountsTotal += amount,
        SET_MODAL: (state, modal) => state.currentModal = modal,
    },
});
