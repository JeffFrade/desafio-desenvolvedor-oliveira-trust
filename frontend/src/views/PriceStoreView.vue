<template>
    <div>
        <div class="row" v-if="$store.state.messages.length > 0">
            <div class="toast-container top-0 end-0 p-3">
                <ToastComponent v-for="message in $store.state.messages" :key="message.message" :options="message"/>
            </div>
        </div>

        <form @submit.stop.prevent="save" id="new_price" name="new_price">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="original_value">Valor:</label>
                        <input type="number" id="original_value" name="original_value" class="form-control" placeholder="Valor" step="0.01" min="0" v-model="price.original_value">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="id_currency">Moeda Desejada:</label>
                        <select id="id_currency" name="id_currency" class="form-control" v-model="price.id_currency">
                            <SelectOptionsComponent :options="$store.state.currencies"/>
                        </select>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="id_payment_method">Método de Pagamento:</label>
                        <select id="id_payment_method" name="id_payment_method" class="form-control" v-model="price.id_payment_method">
                            <SelectOptionsComponent :options="$store.state.paymentMethods"/>
                        </select>
                    </div>
                </div>
                
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Salvar Cotação</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import SelectOptionsComponent from '@/components/SelectOptionsComponent.vue'
    import ToastComponent from '@/components/ToastComponent.vue'

    export default {
        data() {
            return {
                price: {
                    original_value: '',
                    id_currency: '',
                    id_payment_method: ''
                }
            }
        },

        methods: {
            save() {
                this.$store.dispatch('storePrice', this.price)
            }
        },

        components: {
            SelectOptionsComponent,
            ToastComponent
        },

        created() {
            this.$store.commit('clearMessage')
            this.$store.dispatch('getPaymentMethods')
            this.$store.dispatch('getCurrencies')
        }
    }
</script>
