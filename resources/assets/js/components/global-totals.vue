<template>
    <div class="global-totals">
        <div>
            <label>Total:</label><br class="visible-xs-inline">
            {{ accountsTotal | cents | currency }}
        </div>
        <div>
            <label>Pagos del mes:</label><br class="visible-xs-inline">
            {{ paymentsTotal | cents | currency }}
        </div>
        <div>
            <label>Disponible:</label><br class="visible-xs-inline">
            {{ availableTotal | cents | currency }}
        </div>
    </div>
</template>

<script>
import {accountsTotal, paymentsTotal, availableTotal} from '../vuex/getters';

export default {
    vuex: {
        getters: {
            accountsTotal,
            paymentsTotal,
            availableTotal,
        },
    },
}
</script>
