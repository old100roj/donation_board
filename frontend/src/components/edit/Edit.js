import DonateForm from '../donateForm/donateForm.vue'
import names from '../../constants/names'

export default {
  components: {
    DonateForm: DonateForm
  },
  methods: {
    update () {
      this.$store.dispatch(names.actions.updateDonate)
    }
  }
}
