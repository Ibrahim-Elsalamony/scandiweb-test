import DeleteAction from "./delete-action.js";

$(document).ready(function () {
  $("#delete-product-btn").on("click", function () {
    $(this).addClass("clicked");

    setTimeout(() => {
      $(this).removeClass("clicked");
    }, 100);

    const selectedProducts = $(".delete-checkbox:checked")
      .closest(".cart-item")
      .map(function () {
        return $(this).data("id");
      })
      .get();

    if (selectedProducts.length > 0) {
      const baseUrl = window.location.origin;

      DeleteAction(baseUrl, selectedProducts);
    } else {
      alert("Please select at least one product to delete.");
    }
  });
});

$(".delete-checkbox").prop("checked", false);
