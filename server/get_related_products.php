<?php

include('server/get_single_product.php');

$product_category = $product->fetch_assoc()['product_category'];

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category = ? AND product_id != ? LIMIT 4");
$stmt->bind_param("si", $product_category, $id);

$stmt->execute();

$related_products = $stmt->get_result();

?>