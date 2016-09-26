<template>

    <div class="row">
        <div class="col-sm-6">
            <div class="lead">Próximos pagos</div>
            <payments-list url="/api/payments/current"></payments-list>
        </div>
        <div class="col-sm-6">
            <div class="lead">Pagos vencidos</div>
        </div>
    </div>

</template>

<script>
import PaymentsList from './payments/list.vue';

export default {
    components: {PaymentsList}
}
</script>
