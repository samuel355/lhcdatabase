<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "lhc_clients_db";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
