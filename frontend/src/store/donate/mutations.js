import names from '../../constants/names'

export default {
  [names.mutations.setName] (state, name) {
    state.name = name
  },

  [names.mutations.setEmail] (state, email) {
    state.email = email
  },

  [names.mutations.setAmount] (state, amount) {
    state.amount = amount
  },

  [names.mutations.setMessage] (state, message) {
    state.message = message
  },

  [names.mutations.setID] (state, id) {
    state.id = id
  },

  [names.mutations.setErrors] (state, errors) {
    state.errors = errors
  }
}
