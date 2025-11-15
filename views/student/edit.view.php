<?php
    require_once '../layouts/header.php';
    require_once  __DIR__ . "/../../controllers/studentController.php";

    $id = isset($_GET['id']) ? $_GET['id'] : null; 
    $stu = viewStudent($id);

    if(!$id) {
        $_SESSION['view_error'] = 'Student ID is missing.';
        header('Location: ../index.php');
        exit();
    }
    else if(!$stu) {
        $_SESSION['view_error'] = 'No student found for this Student Id. (Student Id: ' . $id . ')';
        header('Location: ../index.php');
        exit();  
    }
?>

    <div class="container my-4">
        <!-- Page Title -->
        <h1 class="h2 fw-bold">Edit Student</h1>

        <!-- Bradcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= SYS_ROOT ?>">All Students</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Student</li>
            </ol>
        </nav>

        <!-- Edit student form -->
        <form action="../../controllers/studentController.php" method="POST" id="edit_form" class="bg-light border shadow-sm rounded py-2 px-3 my-4">
            
            <!-- Alerts -->
            <?php if(isset($_SESSION['success'])) {?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <b><?= $_SESSION['success']; ?></b>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['success']);  ?>
            <?php }?>
            <?php if(isset($_SESSION['error'])) {?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <b><?= $_SESSION['error']; ?></b>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['error']);  ?>
            <?php }?>

            <div class="modal-body text-start">
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $stu['first_name']; ?>">
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $stu['last_name']; ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= $stu['email']; ?>">
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="contact_no" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contact_no" name="contact_no" value="<?= $stu['contact_no']; ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="address_line_1" class="form-label">Address</label>
                        <input type="text" class="form-control mb-1" id="address_line_1" name="address_line_1" value="<?= $stu['address_line_1']; ?>">
                        <input type="text" class="form-control mb-1" id="address_line_2" name="address_line_2" value="<?= $stu['address_line_2']; ?>">
                        <input type="text" class="form-control mb-1" id="address_line_3" name="address_line_3" value="<?= $stu['address_line_3']; ?>">
                    </div>
                </div>

                <input type="hidden" name="action" value="update">
                <input type="hidden" name="stu_id" value=<?= $id ?>>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-3">Update</button>
                <a class="btn btn-outline-danger" href="../../index.php">Back</a>
            </div>
        </form>
    </div>

<?php require_once '../layouts/footer.php'; ?>