<?php
function getAll() {
    global $conn;
    $sql = "SELECT * FROM sms_db";
    $result = mysqli_query($conn, $sql);
    return $result;
}

// Check email exists
function isEmailUsed($email) {
    global $conn;
    $sql = "SELECT email FROM students WHERE email='$email';";

    $result = mysqli_query($conn, $sql);
    
    if($result && mysqli_num_rows($result) > 0){
        return true;
    } else {
        return false;
    }

}

// Add new student
function addStudent($first_name, $last_name, $email, $contact_no, $address_line_1, $address_line_2, $address_line_3) {
    global $conn;

    $sql = "INSERT INTO students(first_name, last_name, email, contact_no, address_line_1, address_line_2, address_line_3)
    VALUES ('$first_name', '$last_name', '$email', '$contact_no', '$address_line_1', '$address_line_2', '$address_line_3')";

    $result = mysqli_query($conn, $sql);
    return $result;
}

// Get student details by id
function getStudent($id) {
    global $conn;

    $sql = "SELECT * FROM students WHERE id = $id";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    return $row;
}

// Update student
function updateStudent($stu_id, $first_name, $last_name, $email, $contact_no, $address_line_1, $address_line_2, $address_line_3) {
    global $conn;

    $sql = "UPDATE students 
    SET first_name = '$first_name', last_name = '$last_name', email = '$email', contact_no = '$contact_no', 
    address_line_1 = '$address_line_1', address_line_2 = '$address_line_2', address_line_3 = '$address_line_3'
    WHERE id=$stu_id";

    $result = mysqli_query($conn, $sql);
    return $result;
    
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

// mysqli_close($conn);

