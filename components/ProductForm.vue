<template>
  <div>
    <form @submit.prevent="submitForm">
      <div class="fixed-input">
        <div class="fill">
          <label for="SKU">SKU:</label>
          <input
            type="text"
            id="sku"
            placeholder="SKU"
            v-model="form.sku"
            required
          />
        </div>
      </div>
      <div class="fixed-input">
        <div class="fill">
          <label for="name">Name:</label>
          <input
            type="text"
            id="name"
            placeholder="Name"
            v-model="form.name"
            required
          />
        </div>
      </div>
      <div class="fixed-input">
        <div class="fill">
          <label for="price">Price ($):</label>
          <input
            type="number"
            id="price"
            placeholder="Price ($)"
            v-model="form.price"
            required
          />
        </div>
      </div>

      <div>
        <label for="type">Product Type:</label>
        <select v-model="form.type" @change="updateFields">
          <option value="">Select Product Type</option>
          <option value="dvd">DVD</option>
          <option value="furniture">Furniture</option>
          <option value="book">Book</option>
        </select>
      </div>

      <div v-if="form.type === 'dvd'">
        <div class="result" id="DVD">
          <div class="fill">
            <label for="size">Size (MB):</label>
            <input
              type="number"
              placeholder="Size (MB)"
              v-model="form.size"
              required
            />
          </div>
          <p>*Product Description*</p>
        </div>
      </div>

      <div v-if="form.type === 'furniture'">
        <div class="result" id="furniture">
          <div class="fill">
            <label for="height">Height (CM)</label>
            <input
              type="number"
              placeholder="Height (CM)"
              v-model="form.height"
              required
            />
          </div>
          <div class="fill">
            <label for="width">Width (CM)</label>
            <input
              type="number"
              placeholder="Width (CM)"
              v-model="form.width"
              required
            />
          </div>
          <div class="fill">
            <label for="length">Length (CM)</label>
            <input
              type="number"
              placeholder="Length (CM)"
              v-model="form.length"
              required
            />
          </div>
          <p>*Product Description*</p>
        </div>
      </div>

      <div v-if="form.type === 'book'">
        <div class="result" id="furniture">
          <div class="fill">
            <label for="weight">Weight (KG)</label>
            <input
              type="number"
              placeholder="Weight (KG)"
              v-model="form.weight"
              required
            />
          </div>
          <p>*Product Description*</p>
        </div>
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
        sku: "",
        name: "",
        price: "",
        size: "",
        height: "",
        width: "",
        length: "",
        weight: "",
      },
      message: "",
    };
  },
  methods: {
    updateFields() {
      this.form.size = "";
      this.form.height = "";
      this.form.width = "";
      this.form.length = "";
      this.form.weight = "";
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
