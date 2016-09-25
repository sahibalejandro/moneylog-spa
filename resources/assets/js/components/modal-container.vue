<template>
	<div class="modal-container" :class="{'is-open': currentModal}">
		<div class="modal-container__body">
			<button class="btn btn-danger modal-container__close" type="button" @click.prevent="close">&times;</button>
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