<?php
    // Define Constants
    define("SYS_NAME", "Student Management System");
    define("SYS_ROOT", "http://127.0.0.1/StudentRegistration");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .btn{
            transition: 0.2s;
        }

        .badge{
            cursor: pointer;
            transition: 0.2s;
        }
        .btn:hover, .badge:hover{
            transform: scale(1.05);
        }
        #view_stu_form input:hover {
            cursor: no-drop;
        }

    </style>

    <title><?= SYS_NAME ?></title>
  </head>

  <body>
    
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href=<?= SYS_ROOT ?> > <?= SYS_NAME ?> </a>
            <div>
                <button class="btn btn-sm btn-light me-3" type="submit">Login</button>
                <button class="btn btn-sm btn-outline-light" type="submit">Register</button>
            </div>
        </div>
    </nav>