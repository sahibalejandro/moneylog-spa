import Vue from 'vue';
import store from './vuex/store';
import ModalContainer from './components/modal-container.vue';
import GlobalTotals from './components/global-totals.vue';
import {setAccounts, setAccountsTotal, setPaymentsTotal} from './vuex/actions/accounts';

export default Vue.extend({
    store,

    components: {GlobalTotals, ModalContainer},

    vuex: {
        actions: {
            setAccounts,
            setAccountsTotal,
            setPaymentsTotal,
        },
    },

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

    methods: {
        loadGlobalData()
        {
            this.$http.get('/api/global-data').then(
                response => {
                    const data = response.json();

                    this.setAccounts(data.accounts);
                    this.setAccountsTotal(data.accounts_total);
                    this.setPaymentsTotal(data.payments_total);

                    this.ready = true;
                },
                response => {
                    // bootstrap/vue-resource.js
                }
            );
        },
    },
});
