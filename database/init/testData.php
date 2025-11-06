<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sms_db";

$insertConn = mysqli_connect($servername, $username, $password, $dbname);

// Create Table -------------------------------------------------------------------------------------------------------------------------------------------------------------------------
if (!$insertConn) {
  die("Connection failed: " . mysqli_connect_error());
}

$insert_test_data_sql = "INSERT INTO students(first_name, last_name, email, contact_no, address_line_1, address_line_2, address_line_3)
VALUES ('Dinidu', 'Nimesha', 'din@sample.com', '0112123123', 'colombo06')";

if (mysqli_query($insertConn, $insert_test_data_sql)) {
  echo "Students table created successfully!";
} else {
  echo "Error creating table: " . mysqli_error($insertConn);
}

mysqli_close($insertConn);