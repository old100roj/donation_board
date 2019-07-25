import Vue from 'vue'
import Router from 'vue-router'
import UserProfileComponent from './components/profile/UserProfile.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'user-profile',
      component: UserProfileComponent
    }
  ]
})
