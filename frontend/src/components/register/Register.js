import names from '../../constants/names'

export default {
  data () {
    return {
      name: '',
      email: '',
      password: ''
    }
  },
  computed: {
    errors () {
      return this.$store.state.register.registrationError
    }
  },
  methods: {
    rememberUser () {
      this.$store.dispatch(names.actions.postRegister, this.$data)
    }
  }
}
