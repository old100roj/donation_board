<template>
  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Amount</th>
        <th>Message</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <tr
        v-for="(donate, index) of getDonationsBoard"
        :key="index"
      >
        <td>{{ donate.name }}</td>
        <td>{{ donate.email }}</td>
        <td>{{ donate.amount }}</td>
        <td>{{ donate.message }}</td>
        <td>{{ donate.date }}</td>
      </tr>
    </tbody>
  </table>
</template>
<script src="./DonationsBoard.js"></script>
