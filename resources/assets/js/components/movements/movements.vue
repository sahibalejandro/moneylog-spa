<template>
    <div class="lead">Movimientos</div>

    <a v-link="{name:'movements.create'}" class="btn btn-sm btn-link">
        + Movimiento
    </a>
    <a v-link="{name:'transfers.create'}" class="btn btn-sm btn-link">
        + Transferencia
    </a>
    <hr>

    <movement v-for="movement in movements"
        :movement="movement"
        :remove="remove"
    ></movement>
</template>

<script>
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
                this.$http.get('/api/movements').then(response => {
                    this.movements = response.json();
                }, response => {
                    console.error('No se pudieron cargar los movimientos');
                });
            },

            remove(id)
            {
                const movement = this.movements.find(m => m.id == id);

                if (confirm(`¿Borrar: ${movement.description}?`)) {
                    this.delete(movement.id);
                }
            },

            delete(id)
            {
                this.$http.delete('/api/movements/' + id)
                    .then(response => {
                        let index = this.movements.findIndex(m => m.id == id);
                        this.movements.splice(index, 1);
                    }, response => {
                        console.error('No se pudo borrar el movimiento');
                    });
            },
        }
    }
</script>
