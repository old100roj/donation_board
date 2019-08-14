import names from '../../constants/names'
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
      return this.$store.state.donations.donations
    }
  },

  created () {
    this.$store.dispatch(names.actions.getDonationsBoard, this.$route.query)
  }
}
