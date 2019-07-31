import names from '../../constants/names'
import EnvRetriever from '../../services/EnvRetriever'
import ComponentTopDonator from './topDonator/TopDonator.vue'
import ComponentMonthlyAmount from './monthlyAmount/MonthlyAmount.vue'
import ComponentAllTimeAmount from './allTimeAmount/AllTimeAmount.vue'

export default {
  components: {
    topDonator: ComponentTopDonator,
    monthlyAmount: ComponentMonthlyAmount,
    allTimeAmount: ComponentAllTimeAmount
  },

  computed: {
    getDonationsInfo () {
      console.log(this.$store.state.donations)
      return this.$store.state.donations.donations
    }
  },

  created () {
    console.log(EnvRetriever.getEnvVar('API_URL'))
    this.$store.dispatch(names.actions.getDonationsBoard)
  }
}
