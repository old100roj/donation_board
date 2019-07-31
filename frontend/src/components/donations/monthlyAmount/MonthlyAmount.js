export default {
  computed: {
    mounth () {
      // console.log(this.$store.state.donations.monthlyAmount)
      return this.$store.state.donations.monthlyAmount
    }
  }
}
