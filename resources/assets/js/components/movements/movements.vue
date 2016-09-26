<template>
    <movements-list url="/api/movements" title="Mis movimientos"></movements-list>
</template>

<script>
import MovementsList from './list.vue';

export default {
    components: {MovementsList}
}
</script>