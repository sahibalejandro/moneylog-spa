<template>
    <button :class="cssClass" type="button" @click.prevent="setModal(this.modal)">
        <slot>Modal</slot>
    </button>
</template>

<script>
import {setModal} from '../vuex/actions/modal';

export default {
    props: {
        modal: {
            required: true,
            type: String,
        },
        cssClass: {
            type: String,
            default: 'btn btn-sm btn-default',
        },
    },

    vuex: {
        actions: {
            setModal,
        },
    },
}
</script>