import axios from 'axios'

export default {
  getDonationsBoard ({ commit }) {
    axios.get('http://donationboard.loc/getDonates').then((response) => {
      if (Object.prototype.hasOwnProperty.call(response, 'data')) {
        commit('setDonationsBoard', response.data)
      }
    }).catch((error) => {
      console.log(error)
    })
  }
}
