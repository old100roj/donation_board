<template>
  <div>
    <b-navbar
      toggleable="lg"
      type="dark"
      variant="dark"
    >
      <b-navbar-nav>
        <router-link
          :to="{ name: 'register'}"
          class="nav-item"
        >
          <b-button squared variant="outline-primary">Sign up</b-button>
        </router-link>
      </b-navbar-nav>
    </b-navbar>
  </div>
</template>
<script src="./SignIn.js"></script>
