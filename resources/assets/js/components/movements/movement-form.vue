<template>
    <div class="lead">{{ editMode ? 'Editar' : 'Agregar' }} movimiento</div>
    <hr>

    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">

            <form @submit.prevent="save">

                <!-- Amount -->
                <div class="form-group">
                    <label for="amount" class="control-label">Cantidad:</label>
                    <amount class="input-lg" :amount.sync="movement.amount" v-ref:amount></amount>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description" class="control-label">Descripción:</label>
                    <input class="form-control" type="text" v-model="movement.description" required>
                </div>

                <!-- Date -->
                <div class="form-group">
                    <label for="date" class="control-label">Fecha:</label>
                    <input class="form-control" type="date" v-model="movement.date" required>
                </div>

                <!-- Account -->
                <div class="form-group">
                    <label for="account" class="control-label">Cuenta:</label>
                    <select-account :id.sync="movement.account_id"></select-account>
                </div>

                <!-- Botón para agregar cuenta -->
                <div class="form-group">
                    <btn-modal modal="add-account">Agregar cuenta</btn-modal>
                </div>

                <!-- Botón para guardar -->
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import m from '../../messages';
import Amount from '../amount.vue';
import SelectAccount from '../accounts/select-account.vue';
import BtnModal from '../btn-modal.vue';
import {incrementAccountsTotal} from '../../vuex/actions/accounts';

export default {

    components: {
        Amount,
        SelectAccount,
        BtnModal,
    },

    vuex: {
        actions: {incrementAccountsTotal},
    },

    data()
    {
        return {
            editMode: false,
            states: {
                saving: false,
            },
            movement: {
                description: null,
                amount: null,
                date: null,
                account_id: null,
            },
        };
    }, // data

    created()
    {
        this.editMode = this.$route.params.id != undefined;

        // Obtener los datos del movimiento si estamos en modo de edición.
        if (this.editMode) {
            this.get(this.$route.params.id);
        }
    },

    ready()
    {
        this.$nextTick( () => this.$refs.amount.focus() );
    },

    methods: {
        /**
         * Obtiene desde el servidor los datos de un movimiento.
         *
         * @param {Number} id
         */
        get(id)
        {
            this.$http.get('/api/movements/' + id).then(
                response => {
                    this.movement = response.json();
                },
                response => {
                    // bootstrap/vue-resource.js
                    this.$router.go({name: 'movements.index'});
                }
            );
        }, // methods.get

        save()
        {
            // El método y url para el request dependerá de si estamos en modo
            // dición (patch) o no (post).
            let method = this.editMode ? 'patch' : 'post';
            let url = this.editMode
                ? '/api/movements/' + this.movement.id
                : '/api/movements';

            this.$http[method](url, this.movement).then(
                response => {
                    let message = method == 'post'
                        ? 'Movimiento registrado'
                        : 'Movimiento actualizado';

                    m.success(message);
                    this.incrementAccountsTotal(this.movement.amount);
                    this.$router.go({name: 'movements.index'});
                },
                response => {
                    // bootstrap/vue-resource.js
                }
            );
        }, // methods.save
    }, // methods
};
</script>
