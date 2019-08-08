import axios from 'axios'
import PropChecker from '../../services/PropChecker'
import names from '../../constants/names'

export default {
  [names.actions.getDonationsBoard] ({ commit }) {
    axios.get('http://donationboard.loc/donatesAPI').then((response) => {
      if (PropChecker.has(response, 'data')) {
        console.log(response.data)
        commit(names.mutations.setDonationsBoard, response.data.donations.data)
        if (PropChecker.has(response.data, 'topDonator')) {
          commit(names.mutations.setTopDonator, response.data.topDonator)
        }
        if (PropChecker.has(response.data, 'mounthlyAmount')) {
          commit(names.mutations.setMonthlyAmount, response.data.mounthlyAmount)
        }
        if (PropChecker.has(response.data, 'allTimeAmount')) {
          commit(names.mutations.setAllTimeAmount, response.data.allTimeAmount)
        }
      }
    }).catch((error) => {
      console.log(error)
    })
  }
}
