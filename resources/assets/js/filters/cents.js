import Vue from 'vue';

Vue.filter('cents', {
    read(value)
    {
        return value / 100;
    },

    write(value)
    {
        return value * 100;
    },
});
