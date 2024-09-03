Vue.component("product-list", {
  data() {
    return {
      products: [],
    };
  },
  template: `
    <div>
      <product-item
        v-for="product in products"
        :key="product.id"
        :product="product">
      </product-item>
    </div>
  `,
  methods: {
    fetchProducts() {
      // Define the base URL using JavaScript
      const baseUrl = window.location.origin;
      fetch(`${baseUrl}/endpoints/fetch_products.php`)
        .then((response) => response.json())
        .then((data) => {
          this.products = data;
        })
        .catch((error) => console.error("Error fetching products:", error));
    },
    massDelete() {
      const deleteButton = document.getElementById("delete-product-btn");
      // Add 'clicked' class to button
      deleteButton.classList.add("clicked");

      // Optional: Remove the class after the transition
      setTimeout(() => {
        deleteButton.classList.remove("clicked");
      }, 100); // Duration should match the CSS transition time

      const selectedProducts = this.products
        .filter((product) => product.selected)
        .map((product) => product.id);

      if (selectedProducts.length > 0) {
        // Define the base URL using JavaScript
        const baseUrl = window.location.origin;

        fetch(`${baseUrl}/endpoints/delete_products.php`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({ ids: selectedProducts }),
        })
          .then((response) => response.json())
          .then((data) => {
            if (data.success) {
              this.fetchProducts(); // Refresh the product list after deletion
            } else {
              console.error("Error deleting products:", data.error);
            }
          })
          .catch((error) => console.error("Error deleting products:", error));
      } else {
        // alert("Please select at least one product to delete.");
      }
    },
  },
  mounted() {
    this.fetchProducts();

    const submitButton = document.getElementById("delete-product-btn"); // Add event listener for delete button
    submitButton.addEventListener("click", () =>
      setTimeout(() => {
        this.massDelete();
      }, 300)
    );
  },
});
