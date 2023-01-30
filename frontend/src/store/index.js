import { createStore } from 'vuex'
import axios from 'axios'

export default createStore({
  state: {
    price: {
      original_value: '',
      id_currency: '',
      id_payment_method: ''
    },

    prices: []
  },
  mutations: {
    storePrices(state, payload) {
      state.prices = payload
    }
  },
  getters: {
  },
  actions: {
    indexPrice(ctx, id) {
      axios.get(`http://localhost:8000/api/prices/${id}`).then((response) => {
        ctx.commit('storePrices', response.data.data)
      })
    },

    storePrice(ctx, data) {
      axios.post('http://localhost:8000/api/prices', data)
    }
  }
})
