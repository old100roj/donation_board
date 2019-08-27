import names from '../../constants/names'

export default {
  [names.mutations.setSearch] (state, search) {
    state.search = search
  },

  [names.mutations.setMinAmount] (state, minAmount) {
    state.minAmount = minAmount
  },

  [names.mutations.miaxAmount] (state, maxAmount) {
    state.miaxAmount = maxAmount
  },

  [names.mutations.minData] (state, minData) {
    state.minData = minData
  },

  [names.mutations.maxData] (state, maxData) {
    state.maxData = maxData
  }
}
