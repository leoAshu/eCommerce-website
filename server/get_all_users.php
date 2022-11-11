<?php

include('connection.php');

$stmt = $conn->prepare("SELECT user_name, user_email, user_contact, user_address FROM users");

$stmt->execute();

$users = $stmt->get_result();

?>