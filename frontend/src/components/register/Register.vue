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
          Sign Up
        </router-link>
      </b-navbar-nav>
    </b-navbar>
    <div class="col-sm-8 offset-sm-2">
      <h1>Sign Up</h1>
      <div>
        <div
          v-if="errors.length > 0"
          class="alert alert-danger"
        >
          <ul>
            <li
              v-for="error in errors"
              :key="error.id"
            >
              {{ error }}
            </li>
          </ul>
        </div>
        <b-form-group
          label="Name"
        >
          <b-form-input
            v-model="name"
            type="text"
          />
        </b-form-group>
        <b-form-group
          label="Email"
        >
          <b-form-input
            v-model="email"
            type="email"
          />
        </b-form-group>
        <b-form-group
          label="Password"
        >
          <b-form-input
            v-model="password"
            type="password"
          />
        </b-form-group>
      </div>
      <b-button
        type="button"
        variant="outline-success"
        @click="rememberUser"
      >
        Submit
      </b-button>
    </div>
  </div>
</template>
<script src="./Register.js"></script>
