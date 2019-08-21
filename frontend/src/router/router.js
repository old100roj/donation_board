import Vue from 'vue'
import Router from 'vue-router'
import DonationsBoardComponent from '../components/donations/DonationsBoard.vue'
import EditComponent from '../components/edit/Edit.vue'
import CreateDonateComponent from '../components/create/Create.vue'

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
      component: EditComponent
    },
    {
      path: '/show/:id',
      name: 'show',
      component: DonationsBoardComponent
    },
    {
      path: '/createDonate',
      name: 'createDonate',
      component: CreateDonateComponent
    }
  ]
})
