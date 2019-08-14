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
      name: 'donations',
      component: DonationsBoardComponent
    },
    {
      path: '/edit/:id',
      name: 'edit',
      component: {
        template: '<div>Пользователь {{ $route.params.id }}</div>'
      }
    }
  ]
})
