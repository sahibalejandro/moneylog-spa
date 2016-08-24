<template>
    <button class="type btn btn-sm btn-link" type="button" @click.prevent="toggle">Agregar cuenta</button>
    <div v-show="states.opened">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Nueva cuenta"
                v-el:name
                v-model="account.name"
                @keydown.enter.prevent="save"
            >
            <button type="button" class="btn btn-default" @click="save">Agregar cuenta</button>
        </div>
    </div>
</template>

<script>
    export default {
        data()
        {
            return {
                states: {
                    opened: false,
                },
                account: {
                    name: ''
                },
            };
        },

        vuex: {
            actions: {
                addAccount(state, account)
                {
                    state.dispatch('ADD_ACCOUNT', account);
                }
            }
        },

        methods: {
            toggle()
            {
                this.states.opened = !this.states.opened;

                if (this.states.opened) {
                    this.$nextTick( () => this.$els.name.focus() );
                }
            },

            save()
            {
                this.$http.post('/api/accounts', this.account).then(
                    res => {
                        let account = res.json();
                        this.addAccount(account);
                        this.account.name = '';
                        this.toggle();
                        this.$dispatch('account-added', account);
                    },
                    res => {
                        console.error('No se pudo agregar la cuenta');
                    }
                );
            },
        },
    };
</script>
