document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("productForm");
  const submitButton = document.getElementById("saveProduct");
  const productTypeSelect = document.getElementById("productType");
  const dvdSection = document.getElementById("DVD");
  const furnitureSection = document.getElementById("Furniture");
  const bookSection = document.getElementById("Book");

  function hideAllSections() {
    dvdSection.style.display = "none";
    furnitureSection.style.display = "none";
    bookSection.style.display = "none";
  }

  function addError(element, message) {
    const errorDiv = document.createElement("div");
    errorDiv.classList.add("error");
    errorDiv.textContent = message;
    element.parentElement.appendChild(errorDiv);
  }

  function removeErrors() {
    document.querySelectorAll(".error").forEach((error) => error.remove());
  }

  function validateForm(callback) {
    let isValid = true;
    removeErrors();

    const skuInput = document.getElementById("sku");
    const nameInput = document.getElementById("name");
    const priceInput = document.getElementById("price");

    if (!skuInput.value.trim()) {
      addError(skuInput, "Please, submit required data for SKU.");
      isValid = false;
    }
    if (!nameInput.value.trim()) {
      addError(nameInput, "Please, submit required data for Name.");
      isValid = false;
    }
    if (!priceInput.value.trim()) {
      addError(priceInput, "Please, submit required data for Price.");
      isValid = false;
    }

    const selectedType = productTypeSelect.value;
    if (!selectedType) {
      addError(productTypeSelect, "Please select a product type.");
      isValid = false;
    }

    switch (selectedType) {
      case "DVD":
        const sizeInput = document.getElementById("size");
        if (!sizeInput.value.trim()) {
          addError(sizeInput, "Please, submit required data for DVD Size.");
          isValid = false;
        }
        break;
      case "Furniture":
        const heightInput = document.getElementById("height");
        const widthInput = document.getElementById("width");
        const lengthInput = document.getElementById("length");
        if (!heightInput.value.trim()) {
          addError(
            heightInput,
            "Please, submit required data for Furniture Height."
          );
          isValid = false;
        }
        if (!widthInput.value.trim()) {
          addError(
            widthInput,
            "Please, submit required data for Furniture Width."
          );
          isValid = false;
        }
        if (!lengthInput.value.trim()) {
          addError(
            lengthInput,
            "Please, submit required data for Furniture Length."
          );
          isValid = false;
        }
        break;
      case "Book":
        const weightInput = document.getElementById("weight");
        if (!weightInput.value.trim()) {
          addError(
            weightInput,
            "Please, submit required data for Book Weight."
          );
          isValid = false;
        }
        break;
    }

    if (isValid) {
      $.ajax({
        url: "../../endpoints/check_unique_sku.php",
        type: "POST",
        data: { sku: skuInput.value.trim() },
        dataType: "json",
        success: function (response) {
          if (response.exists) {
            addError(
              skuInput,
              "SKU already exists. Please enter a unique SKU."
            );
            isValid = false;
          }
          callback(isValid);
        },
        error: function (xhr, status, error) {
          console.log("AJAX Error: ", status, error);
          console.log("Response: ", xhr.responseText);
          addError(
            skuInput,
            "An error occurred while checking SKU uniqueness."
          );
          callback(false);
        },
      });
    } else {
      callback(isValid);
    }
  }

  productTypeSelect.addEventListener("change", function () {
    hideAllSections();
    const selectedType = this.value;
    if (selectedType === "DVD") {
      dvdSection.style.display = "block";
    } else if (selectedType === "Furniture") {
      furnitureSection.style.display = "block";
    } else if (selectedType === "Book") {
      bookSection.style.display = "block";
    }
  });

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
