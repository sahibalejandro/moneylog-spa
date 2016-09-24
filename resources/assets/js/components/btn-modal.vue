<template>
	<button :class="cssClass" type="button" @click.prevent="showModal">
		<slot>Modal</slot>
	</button>
</template>

<script>
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
			showModal(state)
			{
				state.dispatch('SET_MODAL', this.modal);
			}
		}
	}
}
</script>