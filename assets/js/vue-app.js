document.addEventListener("DOMContentLoaded", function () {
  const app = new Vue({
    el: "#app",
    methods: {
      saveProduct() {
        // Find the Vue instance for the form component and call submitForm
        const formComponent = app.$children.find(
          (child) => child.$options.name === "add-product-form"
        );
        if (formComponent) {
          formComponent.submitForm();
        }
      },
    },
  });

  // Attach event listener to the Save button
  document
    .getElementById("save-product")
    .addEventListener("click", function () {
      app.saveProduct();
    });
});
