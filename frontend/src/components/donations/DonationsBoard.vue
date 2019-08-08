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
    />
  </div>
</template>
<script src="./DonationsBoard.js"></script>
