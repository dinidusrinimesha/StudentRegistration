<?php

$servername = "localhost";
$username = "root";
$password = "";

$dbCreateConn = mysqli_connect($servername, $username, $password);

// Create Database --------------------------------------------------------------------------------------------------------------------------------------------------------------------
if (!$dbCreateConn) {
  die("Connection failed: " . mysqli_connect_error());
}
$createDB_sql = "CREATE DATABASE sms_db";

if (mysqli_query($dbCreateConn, $createDB_sql)) {
  echo "Database created successfully!";
} else {
  echo "Error creating database: " . mysqli_error($dbCreateConn);
}

mysqli_close($dbCreateConn);