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
    <table class="table table-striped table-dark">
      <thead>
        <tr class="row m-0">
          <th class="d-inline-block col-2">
            Donator Name
          </th>
          <th class="d-inline-block col-3">
            Email
          </th>
          <th class="d-inline-block col-1">
            Amount
          </th>
          <th class="d-inline-block col-2">
            Message
          </th>
          <th class="d-inline-block col-2">
            Date
          </th>
          <th class="d-inline-block col-2">
            Actions
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="donation in getDonationsInfo"
          :key="donation.id"
          class="row m-0"
        >
          <td class="d-inline-block col-2">
            {{ donation.name }}
          </td>
          <td class="d-inline-block col-3">
            {{ donation.email }}
          </td>
          <td class="d-inline-block col-1">
            {{ donation.donation_amount }}
          </td>
          <td class="d-inline-block col-2">
            {{ donation.message }}
          </td>
          <td class="d-inline-block col-2">
            {{ donation.created_at }}
          </td>
          <td class="d-inline-block col-2">
            <div class="row">
              <div class="col-md-4">
                <router-link
                  :to="{ name: 'show', params: { id: donation.id}}"
                  class="btn btn-secondary"
                >
                  <font-awesome-icon icon="search-plus" />
                </router-link>
              </div>
              <div class="col-md-4">
                <router-link
                  :to="{ name: 'edit', params: { id: donation.id }}"
                  class="btn btn-primary"
                >
                  <font-awesome-icon icon="pencil-alt" />
                </router-link>
              </div>
              <div class="col-md-4">
                <b-button
                  class="btn btn-danger"
                  @click="deleteDonate(donation.id)"
                >
                  <font-awesome-icon icon="trash" />
                </b-button>
              </div>
            </div>
          </td>
        </tr>
        <!--    <b-table-->
        <!--      striped.-->
        <!--      hover-->
        <!--      class="table table-striped table-dark"-->
        <!--      :items="getDonationsInfo"-->
        <!--      :fields="tableColumn"-->
        <!--    >-->
        <!--      <template slot-scope="props">-->
        <!--        <b-table-column field="name" class="d-inline-block col-12">-->
        <!--          {{ props.row.name }}-->
        <!--        </b-table-column>-->
        <!--        <template-->
        <!--          slot-scope="row"-->
        <!--          field="actions"-->
        <!--        >-->
        <!--          <div class="row">-->
        <!--            <router-link-->
        <!--              :to="{ name: 'show', params: { id: row.item.id}}"-->
        <!--              class="btn btn-secondary"-->
        <!--            >-->
        <!--              <font-awesome-icon icon="search-plus" />-->
        <!--            </router-link>-->
        <!--            <router-link-->
        <!--              :to="{ name: 'edit', params: { id: row.item.id }}"-->
        <!--              class="btn btn-primary"-->
        <!--            >-->
        <!--              <font-awesome-icon icon="pencil-alt" />-->
        <!--            </router-link>-->
        <!--            <b-button-->
        <!--              class="btn btn-danger"-->
        <!--              @click="deleteDonate(row.item.id)"-->
        <!--            >-->
        <!--              <font-awesome-icon icon="trash" />-->
        <!--            </b-button>-->
        <!--          </div>-->
        <!--        </template>-->
        <!--      </template>-->
        <!--    </b-table>-->
      </tbody>
    </table>
  </div>
</template>
<script src="./DonationsBoard.js"></script>
