export default {
  getUserInfo ({ commit }) {
    // axios, promise, resolve, reject
    commit('setFirstName', 'Dima')
    commit('setLastName', 'Mart')
  }
}
