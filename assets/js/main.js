$(document).ready(function () {
  $("#delete-product-btn").on("click", function () {
    $(this).addClass("clicked");

    setTimeout(() => {
      $(this).removeClass("clicked");
    }, 100); // Match the CSS transition duration

    const selectedProducts = $(".delete-checkbox:checked")
      .closest(".cart-item")
      .map(function () {
        return $(this).data("id");
      })
      .get();

    if (selectedProducts.length > 0) {
      const baseUrl = window.location.origin;

      $.ajax({
        url: `${baseUrl}/endpoints/delete_products.php`,
        method: "POST",
        contentType: "application/json",
        data: JSON.stringify({ ids: selectedProducts }),
        dataType: "json",
        success: function (data) {
          if (data.success) {
            location.reload(); // Refresh page to update the list
          } else {
            console.error("Error deleting products:", data.error);
          }
        },
        error: function (xhr, status, error) {
          console.error("Error deleting products:", error);
        },
      });
    } else {
      alert("Please select at least one product to delete.");
    }
  });
});

$(".delete-checkbox").prop("checked", false);
