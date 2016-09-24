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

        currentModal: null,
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
