import names from '../../constants/names'
import axios from 'axios'

export default {
  [names.actions.postRegister] ({ commit }, data) {
    commit(names.mutations.setRegistrationError, [])
    axios.post('http://donationboard.loc/register/user', data).then((response) => {
      commit(names.mutations.setDonationUserName, response.data.name)
      commit(names.mutations.setDonationUserEmail, response.data.email)
    }).catch((errors) => {
      commit(names.mutations.setRegistrationError, errors.response.data.errors)
    })
  }
}
