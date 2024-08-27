<template>
  <div class="cart-container">
    <div v-for="product in products" :key="product.id" class="cart-item">
      <input type="checkbox" class="delete-checkbox" />
      <div class="product-info">
        {{ product.name }} - {{ product.price }}
        <span v-if="product.type === 'DVD'"> DVD</span>
        <span v-else-if="product.type === 'furniture'"> furniture</span>
        <span v-else-if="product.type === 'book'"> book</span>
        <span v-else> (Other)</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      products: [],
    };
  },
  mounted() {
    this.fetchProducts();
  },
  methods: {
    async fetchProducts() {
      try {
        const response = await fetch("/endpoints/fetch_products.php");
        const data = await response.json();
        this.products = data;
      } catch (error) {
        console.error("Error fetching products:", error);
      }
    },
  },
};
</script>
