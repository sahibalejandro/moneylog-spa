<template>
    <div class="input-group">
        <span class="input-group-addon">$</span>
        <input class="form-control {{class}}" type="number" step="0.01" placeholder="Monto" v-model="amount | cents">
    </div>
</template>

<script>
export default {
    props: {
        class: {
            default: '',
        },
        amount: {
            required: true,
        },
    },
};
</script>
