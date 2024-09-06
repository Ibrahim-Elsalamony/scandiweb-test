Vue.component("product-item", {
  props: ["product"],
  template: `
    <div class="cart-item">
      <input type="checkbox" v-model="product.selected" class="delete-checkbox" />
      <div class="product-info">
        <p>{{ product.sku }}</p>
        <p>{{ product.name }}</p>
        <p>{{ product.price }} $</p>
        <div v-if="product.type === 'DVD'">
            <p>Size: {{ product.size }} MB</p>
        </div>
        <div v-if="product.type === 'Furniture'">
            <p>Dimension: {{ product.height }}x{{ product.width }}x{{ product.length }}</p>
        </div>
        <div v-if="product.type === 'Book'">
            <p>Weight: {{ product.weight }} KG</p>
        </div>
      </div>
    </div>
  `,
});
