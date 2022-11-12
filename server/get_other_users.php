<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://ashutoshojha.ml/server/get_all_users.php');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$contents = curl_exec($ch);

curl_close($ch);

?>