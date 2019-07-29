export default {
  components: {
    // profileElement: ProfileElement
  },

  computed: {
    getFullUsername () {
      return this.$store.state.profile.userInfo.firstName + ' ' + this.$store.state.profile.userInfo.lastName
    }
  },

  created () {
    this.$store.dispatch('getUserInfo')
  }
}
