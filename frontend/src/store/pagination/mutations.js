import names from '../../constants/names'

export default {
  [names.mutations.setPagination] (state, pagination) {
    state.items = pagination
  },
  [names.mutations.setCurrentPage] (state, currentPage) {
    state.currentPage = currentPage
  },
  [names.mutations.setAction] (state, action) {
    state.action = action
  }
}
