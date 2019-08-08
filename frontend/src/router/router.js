import Vue from 'vue'
import Router from 'vue-router'
// import UserProfileComponent from '../components/profile/UserProfile.vue'
import DonationsBoardComponent from '../components/donations/DonationsBoard.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      // name: 'user-profile',
      // component: UserPro fileComponent
      name: 'donations',
      component: DonationsBoardComponent
    }
    // {
    //   path: '/donations',
    //   name: 'donations',
    //   component: DonationsBoardComponent
    // }
  ]
})
