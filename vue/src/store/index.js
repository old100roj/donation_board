import Vue from 'vue'
import Vuex from 'vuex'
import ProfileModule from './profile'

Vue.use(Vuex)

const modules = {
  profile: ProfileModule
}

export default new Vuex.Store({ modules: modules })
