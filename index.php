<?php
    require_once  __DIR__ . "/controllers/studentController.php";
    require_once "./views/layouts/header.php";
    require_once "./views/student/delete.view.php";

    $students = getAllStudents();
?>  

    <div class="container my-4">
        <h1 class="h2 fw-bold">All Students</h1>

     <!-- New Student Added Alert -->
        <?php if(isset($_SESSION['success'])) {?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['success']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['success']);  ?>
        <?php }?>

     <!-- Student View Error Alerts -->
        <?php if(isset($_SESSION['view_error'])) {?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <b><?= $_SESSION['view_error']; ?></b>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['view_error']);  ?>
        <?php }?>

     <!-- Student Delete Error/Success Alerts -->
        <?php if(isset($_SESSION['delete_success'])) {?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <b><?= $_SESSION['delete_success']; ?></b>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['delete_success']);  ?>
        <?php }?>
        <?php if(isset($_SESSION['delete_error'])) {?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <b><?= $_SESSION['delete_error']; ?></b>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['delete_error']);  ?>
        <?php }?>

     <!-- Add New Student Button -->
        <div class="container text-end">
            <a href="./views/student/add_new_stu.view.php" class="btn btn-primary btn-sm my-3">
                + Add New Student
            </a>
        </div>

     <!-- All Students Table -->
        <?php require_once './views/student/all_stu.view.php' ?>

    </div>

<?php require_once './views/layouts/footer.php';?>

