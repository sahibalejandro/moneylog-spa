<template>
    <div class="payment">
        <div class="row">
            <!-- Monto -->
            <div class="col-xs-6">
                <div class="payment__amount">
                    {{ payment.amount | cents | currency }}
                    <span class="badge badge-info">2 de 10</span>
                </div>
            </div>

            <!-- Fecha -->
            <div class="col-xs-6 text-right">
                <div class="payment__due-date text-muted">
                    {{ payment.due_date | moment }}
                    <span class="glyphicon glyphicon-calendar"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Descripción -->
            <div class="col-sm-9">
                <div class="payment__description">{{ payment.description }}</div>
            </div>

            <!-- Botón pagar -->
            <div class="col-sm-3 text-right">
                <a class="btn btn-sm btn-success" v-link="{name:'payments.pay', params: {id: payment.id}}">
                    <span class="glyphicon glyphicon-ok"></span>
                    Pagar ahora
                </a>
            </div>
        </div>

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
