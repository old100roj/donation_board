import SnakeGetParamsCreator from './../../services/SnakeGetParamsURICreator'
import names from '../../constants/names'

export default {
  data () {
    return {
      search: null,
      minAmount: null,
      maxAmount: null,
      minDate: null,
      maxDate: null
    }
  },
  methods: {
    handleSubmit () {
      this.$router.push({ name: 'donations', query: SnakeGetParamsCreator.getQueryObj(this.$data) })
      this.$store.dispatch(names.actions.getDonationsBoard, this.$route.query)
    }
  }
}
