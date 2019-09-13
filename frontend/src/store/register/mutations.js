import names from '../../constants/names'

export default {
  [names.mutations.setDonationUserName] (state, name) {
    state.name = name
  },
  [names.mutations.setDonationUserEmail] (state, email) {
    state.email = email
  },
  [names.mutations.setRegistrationError] (state, errors) {
    state.registrationError = errors
  }
}
