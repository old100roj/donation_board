import axios from 'axios'
import PropChecker from '../../services/PropChecker'
import names from '../../constants/names'
import SnaleGetParamsURICreator from './../../services/SnakeGetParamsURICreator'

export default {
  [names.actions.getDonationsBoard] ({ commit }, query) {
    console.log('GOT!')
    const queryStr = SnaleGetParamsURICreator.getQueryStr(query || {})
    axios.get('http://donationboard.loc/donatesAPI' + queryStr).then((response) => {
      if (PropChecker.has(response, 'data')) {
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
  },
  [names.actions.deleteDonate] ({ dispatch, commit, state }, id, query) {
    axios.delete('http://donationboard.loc/donatesAPI/' + id).then((response) => {
      if (PropChecker.has(response.data, 'deleted') && response.data.deleted === 1) {
        dispatch(names.actions.getDonationsBoard, query)
      }
    }).catch((error) => {
      console.log(error)
    })
  }
}
