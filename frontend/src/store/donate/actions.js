import names from '../../constants/names'
import axios from 'axios'
import PropChecker from '../../services/PropChecker'

export default {
  [names.actions.getDonate] ({ commit }, id) {
    axios.get('http://donationboard.loc/donatesAPI/' + id).then((response) => {
      if (PropChecker.has(response, 'data')) {
        commit(names.mutations.setName, response.data.name)
        commit(names.mutations.setEmail, response.data.email)
        commit(names.mutations.setAmount, response.data.donation_amount)
        commit(names.mutations.setMessage, response.data.message)
        commit(names.mutations.setID, response.data.id)
      }
    }).catch((error) => {
      console.log(error)
    })
  },
  [names.actions.updateDonate] ({ rootState, commit }) {
    console.log(rootState.donate)
    const donate = {
      name: rootState.donate.name,
      email: rootState.donate.email,
      donationAmount: rootState.donate.amount,
      message: rootState.donate.message
    }
    axios.put('http://donationboard.loc/donatesAPI/' + rootState.donate.id, donate).then((response) => {
      // if (PropChecker.has(response, 'updated')) {
      //
      // }
      console.log(response)
    }).catch((errors) => {
      commit(names.mutations.setErrors, errors.response.data.errors)
    })
  }
}
