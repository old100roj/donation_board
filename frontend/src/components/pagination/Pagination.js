import names from '../../constants/names'

export default {
  computed: {
    paginationItems () {
      return this.$store.state.pagination.items
    },
    currentPage () {
      return this.$store.state.pagination.currentPage
    }
  },
  methods: {
    redirect (item) {
      if (!item.disabled) {
        this.$store.commit(names.mutations.setCurrentPage, item.toPage)
        this.$store.dispatch(this.$store.state.pagination.action)
      }
    }
  }
}
