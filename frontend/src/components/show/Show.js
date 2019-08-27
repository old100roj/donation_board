import DonateForm from '../donateForm/donateForm.vue'
import names from '../../constants/names'

export default {
  components: {
    DonateForm: DonateForm
  },
  methods: {
    deleteDonate () {
      this.$store.dispatch(names.actions.deleteDonate, this.$route.params.id, this.$route.query || {})
      this.$router.push('/')
    }
  },
  computed: {
    donateId () {
      return this.$route.params.id
    },

    cardName () {
      return this.$store.state.donate.name
    },

    cardEmail () {
      return this.$store.state.donate.email
    },

    cardAmount () {
      return this.$store.state.donate.amount
    },

    cardMessage () {
      return this.$store.state.donate.message
    }
  },
  created () {
    // console.log(this.$router.options.routes)
    this.$store.dispatch(names.actions.getDonate, this.$route.params.id)
  }
}
