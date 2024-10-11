export function hideAllSections() {
  document.getElementById("DVD").style.display = "none";
  document.getElementById("Furniture").style.display = "none";
  document.getElementById("Book").style.display = "none";
}

export function handleProductTypeChange() {
  const productTypeSelect = document.getElementById("productType");

  productTypeSelect.addEventListener("change", function () {
    hideAllSections();
    const selectedType = this.value;
    if (selectedType === "DVD") {
      document.getElementById("DVD").style.display = "block";
    } else if (selectedType === "Furniture") {
      document.getElementById("Furniture").style.display = "block";
    } else if (selectedType === "Book") {
      document.getElementById("Book").style.display = "block";
    }
  });
}
