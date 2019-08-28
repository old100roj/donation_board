<template>
  <b-card>
    <b-card-header align="center">
      <h2>{{ cardName }}</h2>
    </b-card-header>
    <b-card-body>
      <b-card-title align="center">
        <h5>{{ cardEmail }}</h5>
      </b-card-title>
      <b-card-title align="center">
        <h5>{{ cardAmount }}</h5>
      </b-card-title>
      <b-card-text align="center">
        {{ cardMessage }}
      </b-card-text>
      <template>
        <div
          class="row"
          align="center"
        >
          <div class="col-md-6">
            <router-link
              :to="{ name: 'edit', params: { id: donateId }}"
              class="btn btn-primary"
            >
              <font-awesome-icon icon="pencil-alt" />
            </router-link>
          </div>
          <div class="col-md-6">
            <b-button
              class="btn btn-danger"
              @click="deleteDonate()"
            >
              <font-awesome-icon icon="trash" />
            </b-button>
          </div>
        </div>
      </template>
    </b-card-body>
  </b-card>
</template>
<script src="./Show.js"></script>
