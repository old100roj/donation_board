// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import axios from 'axios'
import VueMoment from 'vue-moment'
import VueVisible from 'vue-visible'
import AwesomeMask from 'awesome-mask'
import AppComponent from './components/App.vue'
import router from './routes'
import store from './store'

// centralized event hub
window.eventHub = new Vue()

Vue.prototype.$http = axios

Vue.use(VueMoment)
Vue.use(VueVisible)
Vue.directive('mask', AwesomeMask)

// this is needed for acceptance testing console
window.testingErrors = []

window.onerror = function (error, url, line) {
  window.testingErrors.push(error + '. Line: ' + line)
}

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,
  template: '<App></App>',
  components: {
    App: AppComponent
  }
})
