<?php
    session_start();
    require_once './components/header.php';
    require_once './views/add_new_stu.view.php';

    if(isset($_SESSION['update_success'])) {
        $error = $_SESSION['update_success'];
    }
?>

    <div class="container my-4">
        <h1 class="h2 fw-bold">All Students</h1>

        <!-- Update success alert -->
        <?php if(isset($_SESSION['update_success'])) { ?>
            <div class="row">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $_SESSION['update_success'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> 
            </div>
        <?php }?>

        <!-- Add new button: Call addNewStuModel -->
        <div class="container text-end">
            <button type="button" class="btn btn-primary btn-sm my-3" data-bs-toggle="modal" data-bs-target="#addNewStuModel">
                + Add New Student
            </button>
        </div>

        <?php require_once './views/all_stu.view.php' ?>
    </div>

<?php 
    require_once './components/footer.php';
    unset($_SESSION['update_success']);
?>

