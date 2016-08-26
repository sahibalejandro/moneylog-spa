<template>
<div class="transfer-form">
    <div class="lead">Transferencia</div>
    <hr>
    <form>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-offset-3 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <amount class="input-lg" :amount.sync="amount"></amount>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">Cuenta retiro:</label>
                    <select-account :id.sync="src_account"></select-account>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">Cuenta destino:</label>
                    <select-account :id.sync="dst_account"></select-account>
                </div>
            </div>
        </div>
    </form>
</div>
</template>

<script>
import SelectAccount from '../accounts/select-account.vue';
import Amount from '../amount.vue';

export default {
    components: {
        Amount,
        SelectAccount,
    },

    data()
    {
        return {
            amount: null,
            src_account: null,
            dst_account: null,
        };
    },
};
</script>
