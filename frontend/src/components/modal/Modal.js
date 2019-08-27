import names from '../../constants/names'

export default {
  computed: {
    search: {
      get () {
        return this.$store.state.modal.search
      },
      set (value) {
        this.$store.commit(names.mutations.setSearch, value)
      }
    },
    minDate: {
      get () {
        return this.$store.state.modal.minDate
      },
      set (value) {
        this.$store.commit(names.mutations.setMinDate, value)
      }
    },
    maxDate: {
      get () {
        return this.$store.state.modal.maxDate
      },
      set (value) {
        this.$store.commit(names.mutations.setMaxDate, value)
      }
    },
    minAmount: {
      get () {
        return this.$store.state.modal.minAmount
      },
      set (value) {
        this.$store.commit(names.mutations.setMinAmount, value)
      }
    },
    maxAmount: {
      get () {
        return this.$store.state.modal.maxAmount
      },
      set (value) {
        this.$store.commit(names.mutations.setMaxAmount, value)
      }
    }
  },
  methods: {
    handleSubmit () {
      this.$router.push({ name: 'donations' })
      this.$store.dispatch(names.actions.getDonationsBoard)
    }
  }
}
