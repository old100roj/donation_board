<template>
  <div>
    <b-card-group
      deck
      class="row px-2"
    >
      <topDonator />
      <monthlyAmount />
      <allTimeAmount />
    </b-card-group>
    <br>
    <b-table
      striped
      hover
      class="table table-striped table-dark"
      :items="getDonationsInfo"
    />
  </div>
</template>
<script src="./DonationsBoard.js"></script>
