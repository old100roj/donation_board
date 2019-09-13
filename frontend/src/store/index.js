import Vue from 'vue'
import Vuex from 'vuex'
import DonationBoardModule from './donationBoard'
import Donate from './donate'
import Pagination from './pagination'
import Modal from './modal'
import Register from './register'

Vue.use(Vuex)

const modules = {
  donations: DonationBoardModule,
  donate: Donate,
  pagination: Pagination,
  modal: Modal,
  register: Register
}

export default new Vuex.Store({ modules: modules })
