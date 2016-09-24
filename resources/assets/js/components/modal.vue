<template>
	<div class="modal-component" :class="{'is-open': currentModal}">
		<div class="modal-component__body">
			<button class="btn btn-danger modal-component__close" type="button" @click.prevent="close">&times;</button>
			<component :is="currentModal"></component>
		</div>
	</div>
</template>

<script>
import {currentModal} from '../vuex/getters';
import AddAccount from './accounts/add-account.vue';

export default {
	components: {
		AddAccount,
	},
	vuex: {
		getters: {
			currentModal,
		},
		actions: {
			close(state)
			{
				state.dispatch('SET_MODAL', null);
			},
		},
	},
}
</script>