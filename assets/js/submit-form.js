import { validateForm, addError, removeErrors } from "./formValidation.js";
import {
  hideAllSections,
  handleProductTypeChange,
} from "./productTypeHandler.js";

document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("productForm");
  const submitButton = document.getElementById("saveProduct");

  hideAllSections();
  handleProductTypeChange();

  submitButton.addEventListener("click", function (event) {
    event.preventDefault();

    submitButton.classList.add("clicked");

    setTimeout(() => {
      submitButton.classList.remove("clicked");
    }, 300);

    validateForm(function (isValid) {
      if (isValid) {
        setTimeout(() => {
          form.submit();
        }, 300);
      }
    });
  });

  function clearInputs() {
    form.reset();
    hideAllSections();
  }
  clearInputs();
});
