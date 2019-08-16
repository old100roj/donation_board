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
        <router-link
          :to="{ name: 'edit', params: { id: row.item.id }}"
          class="btn btn-primary"
        >
          <span
            class="fa fa-pencil-alt"
            title="pencil"
          />
        </router-link>
        <router-link
          :to="{ name: 'scope', params: { id: row.item.id}}"
          class="btn btn-secondary"
        >
          <span
            class="fa fa-search-plus"
            title="loupe"
          />
        </router-link>
        <router-link :to="{ name: 'delete', params: { id: row.item.id}}">
          <button
            class="btn btn-danger"
            type="submit"
          >
            <span class="fa fa-trash" />
          </button>
        </router-link>
      </template>
    </b-table>
  </div>
</template>
<script src="./DonationsBoard.js"></script>
