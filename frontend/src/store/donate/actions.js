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
      }
    }).catch((error) => {
      console.log(error)
    })
  }
}
