import axios from 'axios'
import PropChecker from '../../services/PropChecker'
import names from '../../constants/names'
import SnakeGetParamsURICreator from '../../services/SnakeGetParamsURICreator'

export default {
  [names.actions.getDonationsBoard] ({ commit, rootState }) {
    let queryStr = SnakeGetParamsURICreator.getQueryStr(rootState.modal)
    queryStr += 'page=' + rootState.pagination.currentPage
    console.log(queryStr)
    axios.get('http://donationboard.loc/donatesAPI' + queryStr).then((response) => {
      console.log(response)
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
        if (PropChecker.has(response.data, 'paginationBlock')) {
          commit(names.mutations.setPagination, response.data.paginationBlock)
        }
      }
    }).catch((error) => {
      console.log(error)
    })
  },
  [names.actions.deleteDonate] ({ dispatch, commit, state }, id) {
    console.log('HERE!')
    axios.delete('http://donationboard.loc/donatesAPI/' + id).then((response) => {
      if (PropChecker.has(response.data, 'deleted') && response.data.deleted === 1) {
        dispatch(names.actions.getDonationsBoard)
      }
    }).catch((error) => {
      console.log(error)
    })
  }
}
