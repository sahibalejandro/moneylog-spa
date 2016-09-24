import Vue from 'vue';
import moment from 'moment';
import 'moment/locale/es';

Vue.filter('moment', function (date) {
    return moment(date, 'YYYY-MM-DD').calendar(null, {
        sameDay: '[Hoy]',
        nextDay: '[Mañana]',
        nextWeek: '[Próximo] dddd',
        lastDay: '[Ayer]',
        lastWeek: '[El] dddd [pasado]',
        sameElse: 'ddd DD MMM YYYY'
    });
});
