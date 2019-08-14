<template>
  <div>
    <b-card-group
      deck
      class="row px-2"
    >
      <topDonator class="m-1" />
      <monthlyAmount class="m-1" />
      <allTimeAmount class="m-1" />
    </b-card-group>
    <b-table
      striped.
      hover
      class="table table-striped table-dark"
      :items="getDonationsInfo"
    >
      <template slot="actions" slot-scope="row">
        <router-link :to="{ name: 'edit', params: { id: row.item.id }}">Edit</router-link>
        <router-link :to="{ name: 'scope', params: { id: row.item.id}}">Scope</router-link>
        <router-link :to="{ name: 'delete', params: { id: row.item.id}}">Delete</router-link>
      </template>
    </b-table>
  </div>
</template>
<script src="./DonationsBoard.js"></script>
