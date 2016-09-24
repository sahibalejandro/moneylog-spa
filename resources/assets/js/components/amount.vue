<template>
    <div class="input-group">
        <span class="input-group-addon">$</span>
        <input class="form-control" :class="class" type="number" step="0.01"
            v-el:input
            v-model="amount | cents"
            placeholder="Monto"
            required
        >
    </div>
</template>

<script>
export default {
    props: {
        class: {
            default: '',
            type: String,
        },

        amount: {
            required: true,
        },
    },

    methods: {
        focus()
        {
            this.$els.input.focus();
        },
    },
};
</script>
