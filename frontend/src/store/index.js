import { createStore } from 'vuex'
import axios from 'axios'

export default createStore({
  state: {
    price: {
      original_value: '',
      id_currency: '',
      id_payment_method: ''
    },

    prices: [],
    currencies: [{
      name: 'Carregando...'
    }],
    paymentMethods: [{
      name: 'Carregando...'
    }],
    messages: []
  },
  mutations: {
    storePaymentMethods(state, payload) {
      state.paymentMethods = payload
    },

    storeCurrencies(state, payload) {
      state.currencies = payload
    },

    storePrices(state, payload) {
      state.prices = payload
    },

    pushMessage(state, payload) {
      state.messages.push(payload)
    },

    clearMessage(state) {
      state.messages = []
    }
  },
  actions: {
    getPaymentMethods(ctx) {
      axios.get('http://localhost:8000/api/payment-methods').then((response) => {
        ctx.commit('storePaymentMethods', response.data.data)
      })
    },

    getCurrencies(ctx)
    {
      axios.get('http://localhost:8000/api/currencies').then((response) => {
        ctx.commit('storeCurrencies', response.data.data)
      })
    },

    indexPrice(ctx, id) {
      return axios.get(`http://localhost:8000/api/prices/${id}`).then((response) => {
        ctx.commit('storePrices', response.data.data)
      })
    },

    storePrice(ctx, data) {
      ctx.commit('clearMessage')

      axios.post('http://localhost:8000/api/prices', data).then((response) => {
        ctx.commit('pushMessage', {
          type: 'success',
          message: response.data.message
        })
      }).catch((error) => {
        let errors = error.response.data.errors
        for (let err in errors) {
          ctx.commit('pushMessage', {
            type: 'danger',
            message: errors[err][0]
          })
        }
      })
    }
  }
})
