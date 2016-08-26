import Vue from 'vue';
import {is_empty} from '../helpers';

Vue.filter('cents', {
    read(value)
    {
        return is_empty(value) ? null : value / 100;
    },

    write(value)
    {
        return is_empty(value) ? null : value * 100;
    },
});
