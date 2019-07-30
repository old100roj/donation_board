import Vue from 'vue'
import Vuex from 'vuex'
import ProfileModule from './profile'
import DonationBoardModule from './donationBoard'

Vue.use(Vuex)

const modules = {
  profile: ProfileModule,
  donations: DonationBoardModule
}

export default new Vuex.Store({ modules: modules })
