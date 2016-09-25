<template>
    <div>
        Total: {{ accountsTotal | cents | currency }} &bull;
        Pagos: {{ paymentsTotal | cents | currency }} &bull;
        Disponible: {{ availableTotal | cents | currency }}
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