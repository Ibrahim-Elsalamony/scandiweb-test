Vue.component("product-item", {
  props: ["product"],
  template: `
      <div class="cart-item">
        <input type="checkbox" v-model="product.selected" class="delete-checkbox" />
        <div v-if="product.type === 'dvd'" class="product-info">
        <p>{{ product.sku }}</p>
        <p>{{ product.name }}</p>
        <p>{{ product.price} }} $</p>
        <p>{{ product.size }} MB</p>
      </div>
      <div v-if="product.type === 'furniture'" class="product-info">
        <p>{{ product.sku }}</p>
        <p>{{ product.name }}</p>
        <p>{{ product.price }} $</p>
        <p>Dimension: {{ product.height }}x{{ product.width }}x{{ product.length }}</p>
      </div>
      <div v-if="product.type === 'book'" class="product-info">
        <p>{{ product.sku }}</p>
        <p>{{ product.name }}</p>
        <p>{{ product.price} }} $</p>
        <p>{{ product.weight }} KG</p>
      </div>
      </div>
    `,
});
