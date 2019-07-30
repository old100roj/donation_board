export default {
  getDonationsBoard ({ commit }) {
    // axios, promise, resolve, reject
    commit('setDonationsBoard', [
      {
        name: 'aaa0',
        email: 'cxc@mail.sru',
        amount: 25.12,
        message: 'Zdarova!',
        date: '2019-07-29 18:00'
      },
      {
        name: 'bbbb1',
        email: 'cxc@ukr.net',
        amount: 22.8,
        message: 'Slava Ukraine!',
        date: '2019-07-28 11:00'
      },
      {
        name: 'cccc2',
        email: 'cxc@yandex.sru',
        amount: 28.54,
        message: 'Ya pokakal',
        date: '2019-07-22 19:56'
      }
    ])
  }
}
