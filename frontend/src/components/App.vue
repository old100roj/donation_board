<template>
  <div
    id="app"
  >
    <b-navbar
      toggleable="lg"
      type="dark"
      variant="dark"
    >
      <b-navbar-brand>
        <router-link
          :to="{ name: 'donations'}"
        >
          Donations
        </router-link>
      </b-navbar-brand>
      <b-navbar-nav>
        <router-link
          :to="{ name: 'createDonate'}"
          class="nav-item"
        >
          Make Donation
        </router-link>
      </b-navbar-nav>
      <b-navbar-nav>
        <router-link
          :to="{ name: 'register'}"
          class="nav-item"
        >
          Sign Up
        </router-link>
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
