import Vue from 'vue'
import Vuex from 'vuex'
import ProfileModule from './profile'
import DonationBoardModule from './donationBoard'
import Donate from './donate'

Vue.use(Vuex)

const modules = {
  profile: ProfileModule,
  donations: DonationBoardModule,
  donate: Donate
}

export default new Vuex.Store({ modules: modules })
