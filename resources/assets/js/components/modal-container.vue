<template>
	<div class="modal-container" :class="{'is-open': currentModal}">
		<div class="modal-container__body">
			<button class="btn btn-danger modal-container__close" type="button" @click.prevent="closeModal">&times;</button>
			<component :is="currentModal"></component>
		</div>
	</div>
</template>

<script>
import {currentModal} from '../vuex/getters';
import AddAccount from './accounts/add-account.vue';
import {closeModal} from '../vuex/actions/modal';

export default {
	components: {
		AddAccount,
	},

	vuex: {
		getters: {
			currentModal,
		},
		actions: {
			closeModal,
		},
	},
}
</script>