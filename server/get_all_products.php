<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products");

$stmt->execute();

$products = $stmt->get_result();

// $products_array = [];

// while($row = $products->fetch_row()) {
//     $products_array[] = $row;
// }

?>