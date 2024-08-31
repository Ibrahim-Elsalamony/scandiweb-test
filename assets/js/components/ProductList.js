Vue.component("product-list", {
  data() {
    return {
      products: [],
    };
  },
  methods: {
    fetchProducts() {
      fetch("../../../endpoints/fetch_products.php")
        .then((response) => response.json())
        .then((data) => {
          this.products = data;
        })
        .catch((error) => console.error("Error fetching products:", error));
    },
  },
  mounted() {
    this.fetchProducts();
  },
  template: `
      <div>
        <product-item v-for="product in products" :key="product.id" :product="product" class="cart-item"></product-item>
      </div>
    `,
});
