<template>
  <div class="custom-bs">
    <div class="col-sm-8 offset-sm-2">
      <h1>Make Donate</h1>
      <DonateForm />
      <b-button
        type="button"
        variant="outline-success"
        @click="store()"
      >
        Submit
      </b-button>
    </div>
  </div>
</template>
<script src="./Create.js"></script>
