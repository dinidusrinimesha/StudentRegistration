<?php require_once './components/header.php'?>

    <div class="container my-4">
        <h1 class="h2 fw-bold">All Students</h1>

        <!-- Add new button: Call addNewStuModel -->
        <div class="container text-end">
            <button type="button" class="btn btn-primary btn-sm my-3" data-bs-toggle="modal" data-bs-target="#addNewStuModel">
                + Add New Student
            </button>
        </div>

        <?php require_once './views/all_stu.view.php' ?>

    </div>

<?php require_once './components/footer.php'?>
