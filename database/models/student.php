<?php
require_once "../db.php";

function getAll() {
    global $conn;
    $sql = "SELECT * FROM sms_db";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getStudent($id) {
    global $conn;
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function addStudent($first_name, $last_name, $email, $contact_no, $address_line_1, $address_line_2, $address_line_3) {
    global $conn;

    $sql = "INSERT INTO students(first_name, last_name, email, contact_no, address_line_1, address_line_2, address_line_3)
    VALUES ($first_name, $last_name, $email, $contact_no, $address_line_1, $address_line_2, $address_line_3)";

    if($conn->query($sql) === TRUE) {
        return "New Student Added!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function updateStudent($first_name, $last_name, $email, $contact_no, $address_line_1, $address_line_2, $address_line_3) {
    global $conn;

    $sql = "UPDATE students 
    SET first_name = '$first_name', last_name = '$last_name' email = '$email', contact_no = '$contact_no', 
    address_line_1 = '$address_line_1', address_line_2 = '$address_line_2', address_line_3 = '$address_line_3'";

    if($conn->query($sql) === TRUE) {
        return "Update Successfull!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function deleteStudent($id) {
    global $conn;

    $sql = "DELETE FROM students WHERE id = $id";

    if($conn->query($sql) === TRUE) {
        return "Student Deleted!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

