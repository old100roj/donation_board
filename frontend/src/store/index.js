import Vue from 'vue'
import Vuex from 'vuex'
import DonationBoardModule from './donationBoard'
import Donate from './donate'
import Pagination from './pagination'
import Modal from './modal'

Vue.use(Vuex)

const modules = {
  donations: DonationBoardModule,
  donate: Donate,
  pagination: Pagination,
  modal: Modal
}

export default new Vuex.Store({ modules: modules })
