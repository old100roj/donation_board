export default {
  computed: {
    getDonationsBoard () {
      return this.$store.state.donations.donations
    }
  },

  created () {
    this.$store.dispatch('getDonationsBoard')
  }
}
