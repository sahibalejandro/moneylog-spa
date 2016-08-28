<template>
    <div class="input-group">
        <span class="input-group-addon">$</span>
        <input class="form-control {{class}}" type="number" step="0.01" v-model="amount | cents" placeholder="Monto" required>
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
