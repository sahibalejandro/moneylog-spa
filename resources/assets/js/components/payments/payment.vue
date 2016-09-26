<template>
    <div>
        {{ payment.description }}
    </div>
</template>

<script>
export default {
    props: {
        payment: {
            required: true,
            type: Object
        }
    }
}
</script>