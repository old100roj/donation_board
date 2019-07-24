import Vue from "vue";
import Vuex from "vuex";

import donations from "./Donations.vue";

Vue.use(Vuex);

export default new Vuex.Store({

    modules: {
        donations
    },

    actions: {

    }
    // name: 'Donations',
    // data() {
    //     return {
    //         fields: ['donator_name', 'email', 'amount', 'message', 'date'],
    //         items: [
    //             { donator_name: 'Ser gay', email: 'cxc@mail.sru', amount: 77.1, message: 'Zdarava papania', date: '2019-05-24' },
    //             { donator_name: 'Alex', email: 'sanya@mail.sru', amount: 27.8, message: 'Zdarava', date: '2019-06-24' },
    //             {  donator_name: 'Svetlana', email: 'shining228@mail.sru', amount: 22.8, message: 'Sasat shkila', date: '2019-06-24' }
    //         ]
    //     }
    // }
});
