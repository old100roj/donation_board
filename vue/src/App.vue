<template>
  <div id="app">
    <img alt="Vue logo" src="./assets/logo.png">
      <Donations/>
<!--    <HelloWorld msg="Welcome Dima!"/>-->
  </div>
</template>

<script>
// import HelloWorld from './components/HelloWorld.vue'
import Donations from './components/Donations/Donations.vue'

export default {
  name: 'app',
  components: {
    Donations
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
