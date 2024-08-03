<script setup>
import ProductListItem from "./ProductListItem.vue";

const props= defineProps({
  products:{
    type:Array,
    required:true
  }
})
</script>

<template>
<div class="row my-4">
  <ProductListItem v-for="product in products" :key="product.id"
                   :product="product"
  />
</div>
</template>
