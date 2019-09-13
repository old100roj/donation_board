<template>
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
      label="Amount"
    >
      <b-form-input
        v-model="amount"
        type="number"
        step="0.01"
        min="0.01"
      />
    </b-form-group>
    <b-form-group
      label="Message"
    >
      <b-form-textarea
        v-model="message"
        type="text"
      />
    </b-form-group>
  </div>
</template>
<script src="./donateForm.js"></script>
