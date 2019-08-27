import DonateForm from '../donateForm/donateForm.vue'
import names from '../../constants/names'

export default {
  components: {
    DonateForm: DonateForm
  },
  methods: {
    store () {
      this.$store.dispatch(names.actions.storeDonate)
      this.$router.push('/')
    }
  }
}
