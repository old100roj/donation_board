import names from '../../constants/names'
import ComponentTopDonator from './topDonator/TopDonator.vue'
import ComponentMonthlyAmount from './monthlyAmount/MonthlyAmount.vue'
import ComponentAllTimeAmount from './allTimeAmount/AllTimeAmount.vue'
import PaginationComponent from './../pagination/Pagination.vue'

export default {
  components: {
    topDonator: ComponentTopDonator,
    monthlyAmount: ComponentMonthlyAmount,
    allTimeAmount: ComponentAllTimeAmount,
    pagination: PaginationComponent
  },

  computed: {
    getDonationsInfo () {
      return this.$store.state.donations.donations
    },
    tableColumn () {
      return ['name', 'email', 'donation_amount', 'message', 'created_at', 'actions']
    }
  },

  methods: {
    deleteDonate (id) {
      this.$store.dispatch(names.actions.deleteDonate, id)
    }
  },

  created () {
    this.$store.commit(names.mutations.setAction, names.actions.getDonationsBoard)
    this.$store.dispatch(names.actions.getDonationsBoard)
  }
}
