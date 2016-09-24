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

        /**
         * Agrega una nueva cuenta.
         *
         * @param {Object} state
         * @param {Object} account
         */
        ADD_ACCOUNT(state, account)
        {
            state.accounts.push(account);
        },

        /**
         * Establece el monto total en las cuentas.
         *
         * @param {Object} state
         * @param {Number} total
         */
        SET_ACCOUNTS_TOTAL(state, total)
        {
            state.accountsTotal = total;
        },

        /**
         * Establece el monto total a pagar.
         *
         * @param {Object} state
         * @param {Number} total
         */
        SET_PAYMENTS_TOTAL(state, total)
        {
            state.paymentsTotal = total;
        },

        /**
         * Establece el nombre del componente que se mostrará en un modal.
         *
         * @param {Object} state
         * @param {String} state
         */
        SET_MODAL(state, modal)
        {
            state.currentModal = modal;
        },
    }
});
