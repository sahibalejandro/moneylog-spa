<template>

    <div class="lead">Movimientos</div>

    <a v-link="{name:'movements.create'}" class="btn btn-default">
        Agregar movimiento
    </a>

    <a v-link="{name:'transfers.create'}" class="btn btn-default">
        Hacer transferencia
    </a>

    <hr>

    <movement v-for="movement in movements" :movement="movement" :remove="remove"></movement>
</template>

<script>
import m from '../../messages';
import Movement from './movement.vue';

export default {
    components: {
        Movement
    },

    data()
    {
        return {
            movements: []
        };
    },

    compiled()
    {
        this.loadMovements();
    },

    methods: {
        loadMovements()
        {
            this.$http.get('/api/movements').then(
                response => {
                    this.movements = response.json();
                },
                response => {
                    // bootstrap/vue-resource.js
                }
            );
        },

        remove(id)
        {
            let movement = this.movements.find(m => m.id == id);

            m.ask(`¿Borrar: ${movement.description}?`).then(() => {
                this.delete(movement.id);
            }, dismiss => {
                console.log(dismiss);
            });
        },

        delete(id)
        {
            this.$http.delete('/api/movements/' + id).then(
                response => {
                    let index = this.movements.findIndex(m => m.id == id);
                    this.movements.splice(index, 1);
                },
                response => {
                    // bootstrap/vue-resource.js
                }
            );
        },
    }
}
</script>
