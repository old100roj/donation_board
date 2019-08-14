<template>
  <b-modal
    id="exampleModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
    @ok="handleSubmit"
  >
    <form
      ref="form"
      @submit.stop.prevent="handleSubmit"
    >
      <b-form-group
        label="Text Search:"
        label-for="name-input"
        invalid-feedback="Name is required"
      >
        <b-form-input
          v-model="search"
          required
        />
      </b-form-group>
      <b-form-group
        label="Search by amount:"
        invalid-feedback="Value does not exist"
      >
        <div class="row">
          <div class="col-md-6">
            <b-form-input
              v-model="minAmount"
              type="number"
              step="0.01"
              min="0.01"
            />
          </div>
          <div class="col-md-6">
            <b-form-input
              v-model="maxAmount"
              type="number"
              step="0.01"
              min="0.01"
            />
          </div>
        </div>
      </b-form-group>
      <b-form-group
        label="Search by date:"
      >
        <div class="row">
          <div class="col-md-6">
            <b-form-input
              v-model="minDate"
              type="date"
            />
          </div>
          <div class="col-md-6">
            <b-form-input
              v-model="maxDate"
              type="date"
            />
          </div>
        </div>
      </b-form-group>
    </form>
    <template
      slot="modal-footer"
      slot-scope="{ ok, cancel }"
    >
      <b-button
        size="sm"
        variant="danger"
        @click="cancel()"
      >
        Cancel
      </b-button>
      <b-button
        size="sm"
        variant="success"
        @click="ok()"
      >
        OK!
      </b-button>
    </template>
  </b-modal>
</template>
<script src="./Modal.js"></script>
