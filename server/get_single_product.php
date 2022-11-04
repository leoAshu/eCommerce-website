<?php

include('server/connection.php');

$id = $_GET['product_id'];

$stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
$stmt->bind_param("i", $id);

$stmt->execute();

$product = $stmt->get_result();

?>