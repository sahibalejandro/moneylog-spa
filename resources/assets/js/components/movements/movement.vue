<template>
    <div class="row">
        <div class="col-sm-4">{{ movement.description }}</div>
        <div class="col-sm-2">
            {{ movement.amount | cents | currency }} <br>
            {{ movement.account.name }}
        </div>
        <div class="col-sm-2">{{ movement.date | moment }}</div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-sm btn-default" v-link="{name:'movements.edit', params: {id: movement.id}}">Editar</button>
            <button type="button" class="btn btn-sm btn-danger" @click.prevent="remove(movement.id)">Borrar</button>
        </div>
    </div>
    <hr>
</template>

<script>
    export default {
        props: {
            movement: {
                required: true,
                type: Object
            },
            remove: {
                required: true,
                type: Function
            }
        }
    };
</script>
