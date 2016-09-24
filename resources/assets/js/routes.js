export default {
    '/': {
        name: 'home',
        component: require('./components/home.vue'),
    },

    '/movements': {
        name: 'movements.index',
        component: require('./components/movements/movements.vue'),
    },

    '/movements/create': {
        name: 'movements.create',
        component: require('./components/movements/movement-form.vue'),
    },

    '/movements/:id/edit': {
        name: 'movements.edit',
        component: require('./components/movements/movement-form.vue'),
    },

    '/transfers/create': {
        name: 'transfers.create',
        component: require('./components/transfers/transfer-form.vue'),
    },
};
