<template>
  <div>
    <h2>Add a New Product</h2>
    <form @submit.prevent="submitForm">
      <div>
        <label for="type">Product Type:</label>
        <select v-model="form.type" @change="updateFields">
          <option value="">Select Product Type</option>
          <option value="electronics">Electronics</option>
          <option value="clothing">Clothing</option>
        </select>
      </div>

      <div>
        <label for="name">Product Name:</label>
        <input type="text" v-model="form.name" required />
      </div>

      <div>
        <label for="price">Price:</label>
        <input type="number" v-model="form.price" required />
      </div>

      <div v-if="form.type === 'electronics'">
        <label for="warranty">Warranty (years):</label>
        <input type="number" v-model="form.warranty" required />
      </div>

      <div v-if="form.type === 'clothing'">
        <label for="size">Size:</label>
        <input type="text" v-model="form.size" required />
      </div>

      <button type="submit">Save Product</button>
    </form>
    <p v-if="message">{{ message }}</p>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      form: {
        type: "",
        name: "",
        price: "",
        warranty: "",
        size: "",
      },
      message: "",
    };
  },
  methods: {
    updateFields() {
      this.form.warranty = "";
      this.form.size = "";
    },
    submitForm() {
      axios
        .post("save.php", this.form)
        .then((response) => {
          this.message = response.data.message;
        })
        .catch((error) => {
          this.message = "Error saving product: " + error.message;
        });
    },
  },
};
</script>
