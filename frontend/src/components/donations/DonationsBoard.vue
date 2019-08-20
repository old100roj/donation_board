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
      :fields="tableColumn"
    >
      <template
        slot="actions"
        slot-scope="row"
      >
        <div class="row">
          <router-link
            :to="{ name: 'show', params: { id: row.item.id}}"
            class="btn btn-secondary"
          >
            <font-awesome-icon icon="search-plus" />
          </router-link>
          <router-link
            :to="{ name: 'edit', params: { id: row.item.id }}"
            class="btn btn-primary"
          >
            <font-awesome-icon icon="pencil-alt" />
          </router-link>
          <router-link :to="{ name: 'delete', params: { id: row.item.id}}">
            <button
              class="btn btn-danger"
              type="submit"
            >
              <font-awesome-icon icon="trash" />
            </button>
          </router-link>
        </div>
      </template>
    </b-table>
  </div>
</template>
<script src="./DonationsBoard.js"></script>
