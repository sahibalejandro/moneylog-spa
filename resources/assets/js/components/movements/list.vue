<template>
    <div>
        <div class="lead">{{ title }}</div>

        <a v-link="{name:'movements.create'}" class="btn btn-link">
            Agregar movimiento
        </a>

        <a v-link="{name:'transfers.create'}" class="btn btn-link">
            Hacer transferencia
        </a>

        <hr>

        <movement v-for="movement in movements" :movement="movement" :remove="remove"></movement>
    </div>
</template>

<script>
import m from '../../messages';
import Movement from './movement.vue';
import {incrementAccountsTotal} from '../../vuex/actions/accounts';

export default {
    props: {
        title: {
            default: 'Movimientos'
        },
        url: {
            required: true,
            type: String
        }
    },

    components: {
        Movement
    },

    vuex: {
        actions: {
            incrementAccountsTotal
        }
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
            this.$http.get(this.url).then(
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

            m.confirm(`¿Borrar: ${movement.description}?`).then(() => {
                this.delete(movement.id);
            }, dismiss => {
                // No hacer nada.
            });
        },

        delete(id)
        {
            this.$http.delete('/api/movements/' + id).then(
                response => {
                    let index = this.movements.findIndex(m => m.id == id);
                    this.incrementAccountsTotal(-this.movements[index].amount);
                    this.movements.splice(index, 1);
                },
                response => {
                    // bootstrap/vue-resource.js
                }
            );
        }
    }
}
</script>
