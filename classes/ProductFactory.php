<?php
// class ProductFactory
// {
//     public static function createProduct($productData, $pdo)
//     {
//         switch ($productData['product_type']) {
//             case 'Book':
//                 $product = new Book($productData['id'], $productData['sku'], $productData['name'], $productData['price'], $productData['product_type']);
//                 break;
//             case 'DVD':
//                 $product = new DVD($productData['id'], $productData['sku'], $productData['name'], $productData['price'], $productData['product_type']);
//                 break;
//             case 'Furniture':
//                 $product = new Furniture($productData['id'], $productData['sku'], $productData['name'], $productData['price'], $productData['product_type']);
//                 break;
//             default:
//                 throw new Exception("Invalid product type");
//         }

//         // Fetch type-specific data for the product
//         $product->fetchSpecificData($pdo);

//         return $product;
//     }
// }
