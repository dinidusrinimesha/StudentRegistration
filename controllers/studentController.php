<?php
session_start();
if($_SERVER["REQUEST_METHOD"] === "POST" ) {
    require_once "../database/db.php";
    require_once "../database/models/student.php";

    $action = htmlspecialchars(trim($_POST["action"]));

    // Error Handling
    // Check empty inputs
    function isInputEmpty($first_name, $email, $contact_no, $address_line_1) {
        if(empty($first_name) || empty($email) || empty($contact_no) || empty($address_line_1)){
            return true;
        } else {
            return false;
        }
    }

    // Chekc email format
    function isValidEmail($email) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    // Add/Update student
    if($action === "add" || $action === "update") {
        $first_name     = htmlspecialchars(trim($_POST["first_name"]));
        $last_name      = htmlspecialchars(trim($_POST["last_name"]));
        $email          = htmlspecialchars(trim($_POST["email"]));
        $contact_no     = htmlspecialchars(trim($_POST["contact_no"]));
        $address_line_1 = htmlspecialchars(trim($_POST["address_line_1"]));
        $address_line_2 = htmlspecialchars(trim($_POST["address_line_2"]));
        $address_line_3 = htmlspecialchars(trim($_POST["address_line_3"]));

        // Add Student
        if($action === "add"){
            if(isInputEmpty($first_name, $email, $contact_no, $address_line_1)) {
                $_SESSION['error'] = "Fill all required inputs!";
                header("Location:../index.php?error?fill-all-required-fields");
            }
            else if(!isValidEmail($email)) {
                $_SESSION['error'] = "Please insert valid Email!";
                header("Location:../index.php?error?invalid-email");
            }
            else if(isEmailUsed($email)) {
                $_SESSION['error'] = "This email is already taken!";
                header("Location:../index.php?error?email-already-taken");
            }
            else {
                $stuAdd = addStudent($first_name, $last_name, $email, $contact_no, $address_line_1, $address_line_2,$address_line_3);

                if($stuAdd) {
                    $_SESSION['success'] = "New student added";
                    header("Location:../index.php?success");
                } else {
                    $_SESSION['error'] = "Error with inserting";
                    header("Location:../index.php?error");
                }
            }
        // Update Student
        } else {
            $stu_id = htmlspecialchars(trim($_POST["stu_id"]));

            if(isInputEmpty($first_name, $email, $contact_no, $address_line_1)) {
                $_SESSION['error'] = "Fill all required inputs!";
                header("Location:../views/edit_stu.view.php?error?fill-all-required-fields");
            }
            else if(!isValidEmail($email)) {
                $_SESSION['error'] = "Please insert valid Email!";
                header("Location:../views/edit_stu.view.php?error?invalid-email");
            }
            else {
                $stuUpdate = updateStudent($stu_id, $first_name, $last_name, $email, $contact_no, $address_line_1, $address_line_2,$address_line_3);

                if($stuUpdate) {
                    $_SESSION['update_success'] = "Student data updated!";
                    header("Location:../index.php");
                } else {
                    $_SESSION['error'] = "Error with updating";
                    header("Location:../views/edit_stu.view.php?error");
                }
            }
        }
    }

    // View/Load-Edit-Form
    if($action === "view" || $action === "edit_form"){
        $stu_id = htmlspecialchars(trim($_POST["stu_id"]));
        $studentData = getStudent($stu_id);
        $_SESSION['student_data'] = $studentData;

        // View Student
        if($action === "view") {
            header("Location: ../views/view_stu.view.php");
        }
        // Load Edit Form
        else{
            header("Location: ../views/edit_stu.view.php");
        }
    }

    // Delete Student
    if($action === "delete"){
        var_dump("Delete ID : $stu_id");
    }

} else {
    header("Location: ../index.php");
    die();
}