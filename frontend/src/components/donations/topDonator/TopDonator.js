export default {
  computed: {
    name () {
      return this.$store.state.donations.topDonator.name
    },
    amount () {
      return this.$store.state.donations.topDonator.amount
    }
  }
}
