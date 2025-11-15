<?php 
session_start();
require_once __DIR__ . "/../database/db.php";
require_once __DIR__ .  "/../models/Student.php";

function getAllStudents() {
    $student = new Student();
    return $student->getAll();
}

function isEmptyInput($first_name, $email, $contact_no, $address_line_1) {
    if(empty($first_name)) {
        $_SESSION["error"] = "First name is required.";
        return true;
    } else if(empty($email)) {
        $_SESSION["error"] = "Email is required.";
        return true;
    } else if(empty($contact_no)) {
        $_SESSION["error"] = "Contact Number is required.";
        return true;
    } else if(empty($address_line_1)) {
        $_SESSION["error"] = "Address is required.";
        return true;
    } else {
        return false;
    }
}

function isValidEmail($email) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        $_SESSION["error"] = "Please enter a valid email address.";
        return false;
    }
}

function addStudent($student, $first_name, $last_name, $email, $contact_no, $address_line_1, $address_line_2, $address_line_3) {
    if(!isEmptyInput($first_name, $email, $contact_no, $address_line_1) && isValidEmail($email)) {
        if(!$student->isEmailUsed($email)) {
            $student->addNew($first_name, $last_name, $email, $contact_no, $address_line_1, $address_line_2, $address_line_3);
            $_SESSION['success'] = "New student added successfully.";
        } else {
            $_SESSION["error"] = "This email address is already in use.";
        }
    }
}

function viewStudent($id) {
    $student = new Student();
    return $student->view($id);
}

function editStudent($student, $id, $first_name, $last_name, $email, $contact_no, $address_line_1, $address_line_2, $address_line_3) {
    if(!isEmptyInput($first_name, $email, $contact_no, $address_line_1) && isValidEmail($email)) {
        if(!$student->isEmailUsed($email)) {
            $update = $student->update($id, $first_name, $last_name, $email, $contact_no, $address_line_1, $address_line_2, $address_line_3);
            return $update;
        } else {
            $_SESSION["error"] = "This email address is already in use.";
            $update = false;
            return $update;
        }
    }
}

function deleteStudent($id) {
    $student = new Student();
    return $student->delete($id);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = htmlspecialchars(trim($_POST['action']));
    $student = new Student();

    // Handle actions adn run logics
    switch($action) {
        case 'add':
            $first_name     = htmlspecialchars(trim($_POST['first_name']));
            $last_name      = htmlspecialchars(trim($_POST['last_name']));
            $email          = htmlspecialchars(trim($_POST['email']));
            $contact_no     = htmlspecialchars(trim($_POST['contact_no']));
            $address_line_1 = htmlspecialchars(trim($_POST['address_line_1']));
            $address_line_2 = htmlspecialchars(trim($_POST['address_line_2']));
            $address_line_3 = htmlspecialchars(trim($_POST['address_line_3']));
            
            addStudent($student, $first_name, $last_name, $email, $contact_no, $address_line_1, $address_line_2, $address_line_3);
            header('Location: ../index.php?student-added');
            break;

        case 'edit_form':
        case 'view':
            $id = htmlspecialchars(trim($_POST['stu_id']));

            $action == 'view' ? 
                header('Location: ../views/student/view_stu.view.php?id=' . $id) :
                header('Location: ../views/student/edit.view.php?id=' . $id) ;
            break;

        case 'delete':
            $id = htmlspecialchars(trim($_POST['stu_id']));
            if(deleteStudent($id)) {
                $_SESSION['delete_success'] = "Student Deleted Successfully.";
                header('Location: ../index.php?success&student-deleted');
            } else {
                $_SESSION['delete_error'] = "Error with deletion";
                header('Location: ../index.php?error');
            }
            break;

        case 'update':
            $stu_id         = htmlspecialchars(trim($_POST['stu_id']));
            $first_name     = htmlspecialchars(trim($_POST['first_name']));
            $last_name      = htmlspecialchars(trim($_POST['last_name']));
            $email          = htmlspecialchars(trim($_POST['email']));
            $contact_no     = htmlspecialchars(trim($_POST['contact_no']));
            $address_line_1 = htmlspecialchars(trim($_POST['address_line_1']));
            $address_line_2 = htmlspecialchars(trim($_POST['address_line_2']));
            $address_line_3 = htmlspecialchars(trim($_POST['address_line_3']));

            $edit = editStudent($student, $stu_id, $first_name, $last_name, $email, $contact_no, $address_line_1, $address_line_2, $address_line_3);
            if($edit) {
                $_SESSION['success'] = "Student details updated successfully.";
                header('Location: ../views/student/edit.view.php?id=' . $stu_id);
            } else {
                $_SESSION['error'] = "Error updating.";
                header('Location: ../views/student/edit.view.php?id=' . $stu_id);
            }
            break;

        default:
            echo 'Something went wrong!';
    }
}