import PropChecker from '../../services/PropChecker'
import names from '../../constants/names'

export default {
  [names.mutations.setDonationsBoard] (state, donations) {
    state.donations = donations
  },

  [names.mutations.setTopDonator] (state, topDonator) {
    if (PropChecker.has(topDonator, 'name')) {
      state.topDonator.name = topDonator.name
    }
    if (PropChecker.has(topDonator, 'amount')) {
      state.topDonator.amount = topDonator.amount
    }
  },

  [names.mutations.setMonthlyAmount] (state, monthlyAmount) {
    state.monthlyAmount = monthlyAmount
    console.log(state.monthlyAmount)
  },

  [names.mutations.setAllTimeAmount] (state, allTimeAmount) {
    state.allTimeAmount = allTimeAmount
  }
}
