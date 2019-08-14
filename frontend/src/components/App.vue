<template>
  <div
    id="app"
  >
    <b-navbar
      toggleable="lg"
      type="dark"
      variant="dark"
    >
      <b-navbar-brand href="#">
        Donations
      </b-navbar-brand>
      <b-navbar-nav>
        <b-nav-item href="#">
          Make Donation
        </b-nav-item>
      </b-navbar-nav>
      <b-navbar-nav class="ml-auto">
        <b-button v-b-modal.exampleModal>
          Filter
        </b-button>
        <ComponentModal />
      </b-navbar-nav>
    </b-navbar>
    <router-view class="container-fluid" />
  </div>
</template>

<script src="./App.js"></script>
