<?php

  $hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";

  $conexion = mysqli_connect($hostname,$username,$password,$db);
  if ($conexion->connect_error) {
    die("Database connection failed: " . $conexion->connect_error);
  }


?>
