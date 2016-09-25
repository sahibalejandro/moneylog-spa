export const addAccount = ({dispatch}, account) => {
    dispatch('ADD_ACCOUNT', account);
};

export const setAccounts = ({dispatch}, accounts) => {
    dispatch('SET_ACCOUNTS', accounts);
};

export const setAccountsTotal = ({dispatch}, total) => {
    dispatch('SET_ACCOUNTS_TOTAL', total);
};

export const setPaymentsTotal = ({dispatch}, total) => {
    dispatch('SET_PAYMENTS_TOTAL', total);
};

export const incrementAccountsTotal = ({dispatch}, amount) => {
    dispatch('INCREMENT_ACCOUNTS_TOTAL', amount);
};