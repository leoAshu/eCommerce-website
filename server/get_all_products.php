<?php

include('connection.php');

$page_no = 1;

if(isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];
}

$stmt = $conn->prepare("SELECT COUNT(*) AS total_records FROM products");
$stmt->execute();
$stmt->bind_result($total_records);
$stmt->store_result();
$stmt->fetch();

$records_per_page = 8;

$offset = ($page_no-1) * $records_per_page;

$previous_page = $page_no - 1;
$next_page = $page_no + 1;

$adjacents = "2";

$total_pages = ceil($total_records/$records_per_page);


$stmt1 = $conn->prepare("SELECT * FROM products LIMIT $offset, $records_per_page");
$stmt1->execute();
$products = $stmt1->get_result();

?>