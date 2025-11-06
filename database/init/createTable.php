<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sms_db";

$tableCreateConn = mysqli_connect($servername, $username, $password, $dbname);

// Create Table -------------------------------------------------------------------------------------------------------------------------------------------------------------------------
if (!$tableCreateConn) {
  die("Connection failed: " . mysqli_connect_error());
}

$createTable_sql = "CREATE TABLE students(
    id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50),
    email VARCHAR(50) NOT NULL UNIQUE,
    contact_no VARCHAR(10) NOT NULL,
    address_line_1 VARCHAR(100) NOT NULL,
    address_line_2 VARCHAR(100),
    address_line_3 VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (mysqli_query($tableCreateConn, $createTable_sql)) {
  echo "Students table created successfully!";
} else {
  echo "Error creating table: " . mysqli_error($tableCreateConn);
}

mysqli_close($tableCreateConn);