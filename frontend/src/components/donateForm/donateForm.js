import PropChecker from '../../services/PropChecker'
import names from '../../constants/names'

export default {
  computed: {
    name: {
      get () {
        return this.$store.state.donate.name
      },
      set (value) {
        this.$store.commit(names.mutations.setName, value)
        console.log(this.$store.state.donate.name)
      }
    },
    email: {
      get () {
        return this.$store.state.donate.email
      },
      set (value) {
        this.$store.commit(names.mutations.setEmail, value)
      }
    },
    amount: {
      get () {
        return this.$store.state.donate.amount
      },
      set (value) {
        this.$store.commit(names.mutations.setAmount, value)
      }
    },
    message: {
      get () {
        return this.$store.state.donate.message
      },
      set (value) {
        this.$store.commit(names.mutations.setMessage, value)
      }
    },
    errors: {
      get () {
        console.log(this.$store.state.donate.errors)
        return this.$store.state.donate.errors
      }
    }
  },
  created () {
    this.$store.commit(names.mutations.setErrors, [])
    if (PropChecker.has(this.$route.params, 'id')) {
      this.$store.dispatch(names.actions.getDonate, this.$route.params.id)
    }
  }
}
