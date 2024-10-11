<?php
require_once __DIR__ . '/../config/autoload.php';

$database = new Database();

$products = Product::getAllProducts($database);
?>

<!-- header -->
<?php include 'templates/product_list/header.php'; ?>

<!-- content -->
<?php include 'templates/product_list/content.php'; ?>

<!-- footer -->
<?php include 'templates/product_list/footer.php'; ?>


<!-- <script src="/assets/js/vue-app.js"></script> -->