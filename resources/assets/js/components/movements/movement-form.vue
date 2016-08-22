<template>
    <div class="lead">{{ editMode ? 'Editar' : 'Agregar' }} movimiento</div>
    <hr>

    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">

            <!-- Mensaje de error en caso de fallar al cargar la información -->
            <div v-show="states.loadFailed" class="alert alert-sm alert-danger">
                No se pudo cargar la información.
            </div>

            <form v-show="!states.loadFailed" @submit.prevent="save">

                <!-- Description -->
                <div class="form-group">
                    <label for="description" class="control-label">Descripción:</label>
                    <input class="form-control" type="text" v-model="movement.description" autofocus>
                </div>

                <!-- Amount -->
                <div class="form-group">
                    <label for="amount" class="control-label">Cantidad:</label>
                    <input class="form-control" type="number" step="0.01" v-model="movement.amount | cents">
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

                <!-- Botón para guardar -->
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
    import SelectAccount from '../accounts/select-account.vue';

    export default {
        components: {
            SelectAccount
        },

        data()
        {
            return {
                editMode: false,
                states: {
                    loadFailed: false,
                    saving: false,
                    saveFailed: false
                },
                movement: {
                    description: null,
                    amount: null,
                    date: null,
                    account_id: null,
                }
            };
        }, // data

        created()
        {
            this.editMode = this.$route.params.id != undefined;

            if (this.editMode) {
                this.get(this.$route.params.id);
            }
        },

        methods: {
            get(id)
            {
                this.$http.get('/api/movements/' + id).then(
                    res => {
                        this.movement = res.json();
                    },
                    res => {
                        this.states.loadFailed = true;
                    }
                );
            }, // methods.get

            save()
            {
                let method = this.editMode ? 'patch' : 'post';
                let url = this.editMode
                    ? '/api/movements/' + this.movement.id
                    : '/api/movements';

                this.$http[method](url, this.movement).then(
                    res => {
                        this.$router.go({name: 'movements.index'});
                    },
                    res => {
                        console.error('No se pudo guardar.');
                    }
                );
            } // methods.save
        } // methods
    };
</script>
