<template>
  <ul class="pagination justify-content-center">
    <li
      v-for="item in paginationItems"
      :key="item.id"
      class="page-item"
      :disabled="currentPage === item.toPage || item.disabled"
      :class="[{ disabled: currentPage === item.toPage || item.disabled }, {active: currentPage === item.toPage || item.disabled }]"
      @click.prevent="redirect(item)"
    >
      <div
        class="page-link"
      >
        {{ item.text }}
      </div>
    </li>
  </ul>
</template>
<script src="./Pagination.js"></script>
