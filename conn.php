<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "pweb";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
  die("Failed");
}

?>