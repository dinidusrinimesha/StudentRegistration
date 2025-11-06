<?php
if($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name     = formDataVal($_POST["first_name"]);
    $last_name      = formDataVal($_POST["last_name"]);
    $email          = formDataVal($_POST["email"]);
    $contact_no     = formDataVal($_POST["contact_no"]);
    $address_line_1 = formDataVal($_POST["address_line_1"]);
    $address_line_2 = formDataVal($_POST["address_line_2"]);
    $address_line_3 = formDataVal($_POST["address_line_3"]);
    $action         = formDataVal($_POST["action"]);

    $errors = [];

    require_once "../database/models/student.php";

    // Validate Form Inputs
    function formDataVal ($formInput) {
        $formInput = trim($formInput);
        $formInput = htmlspecialchars($formInput);
        return $formInput;
    }
    
    // Error Handling
    function isInputEmpty($first_name, $email, $contact_no, $address_line_1) {
        if(empty($first_name) || empty($email) || empty($contact_no) || empty($address_line_1)){
            return true;
        } else {
            return false;
        }
    }

    function isValidEmail($email) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    // Set Errors
    if(isInputEmpty($first_name,  $email, $contact_no, $address_line_1)){
        $errors["empty_input"] = "Fill in all required fields!";
    } 
    if(!isValidEmail($email)) {
        $errors["invalid_email"] = "Invalid Email!";
    }

    // Execute Models
    if($errors == []) {
        
    }

} else {
    header("Location: ../index.php");
    die();
}