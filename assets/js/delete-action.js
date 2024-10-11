export default function DeleteAction(baseUrl, selectedProducts) {
  $.ajax({
    url: `${baseUrl}/endpoints/delete_products.php`,
    method: "POST",
    contentType: "application/json",
    data: JSON.stringify({ ids: selectedProducts }),
    dataType: "json",
    success: function (data) {
      if (data.success) {
        location.reload();
      } else {
        console.error("Error deleting products:", data.error);
      }
    },
    error: function (xhr, status, error) {
      console.error("Error deleting products:", error);
    },
  });
}
