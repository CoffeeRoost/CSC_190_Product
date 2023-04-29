<?php
$password = "root";
$hash = password_hash($password, PASSWORD_DEFAULT);
echo $hash;
?>