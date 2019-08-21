<template>
  <div class="custom-bs">
    <div class="col-sm-8 offset-sm-2">
      <h1>Edit Donate</h1>
      <DonateForm />
      <b-button
        type="button"
        variant="outline-success"
        @click="update()"
      >
        Submit
      </b-button>
    </div>
  </div>
</template>
<script src="./Edit.js"></script>
