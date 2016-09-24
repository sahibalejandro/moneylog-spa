import Vue from 'vue';
import VueResource from 'vue-resource';
import Cookie from 'js-cookie';
import show_response_error from '../show-response-error';

Vue.use(VueResource);

// Obtenemos el token que está en la cookie y lo agregamos a los headers de
// todos los request que se hagan con vue resource.
Vue.http.headers.common['X-XSRF-TOKEN'] = Cookie.get('XSRF-TOKEN');

Vue.http.interceptors.push((request, next) => {
    next(response => {
        if (! response.ok) {
            show_response_error(response);
        }
    });
});
