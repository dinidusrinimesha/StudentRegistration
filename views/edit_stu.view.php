<?php 
    session_start();
    require_once '../components/header.php';

    // Set Sessions
    if(isset($_SESSION['student_data'])) {
        $student = $_SESSION['student_data'];
    }
    if(isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
    }
?>

    <div class="container my-4">
        <h1 class="h2 fw-bold">Edit Student</h1>

        <?php if($student) {?>
            <!-- Edit student form -->
            <form action="../controllers/studentController.php" method="POST" id="edit_stu_form" class="bg-light border shadow-sm rounded p-4 my-4">

                <!-- Allerts -->
                <?php if(isset($_SESSION['error'])) { ?>
                    <div class="row mb-4">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $_SESSION['error'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                <?php }?>

                <!-- Unset Sessions (alerts) -->
                <?php unset($_SESSION['error']); ?>

                <div class="text-start">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="first_name" class="form-label"><span class="text-danger">* </span>First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $student['first_name']; ?>">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $student['last_name']; ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="email" class="form-label"><span class="text-danger">* </span>Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= $student['email']; ?>">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="contact_no" class="form-label"><span class="text-danger">* </span>Contact Number</label>
                            <input type="text" class="form-control" id="contact_no" name="contact_no" value="<?= $student['contact_no']; ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="address_line_1" class="form-label"><span class="text-danger">* </span>Address</label>
                            <input type="text" class="form-control mb-1" id="address_line_1" name="address_line_1" value="<?= $student['address_line_1']; ?>">
                            <input type="text" class="form-control mb-1" id="address_line_2" name="address_line_2" value="<?= $student['address_line_2']; ?>">
                            <input type="text" class="form-control mb-1" id="address_line_3" name="address_line_3" value="<?= $student['address_line_3']; ?>">
                        </div>
                    </div>

                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="stu_id" value="<?= $student['id'] ?>">
                </div>

                <div class="d-flex justify-content-between">
                    <small class="text-danger">* Required fields</small>
                    <div>
                        <button type="submit" class="btn btn-primary me-2">Edit</button>
                        <a class="btn btn-outline-danger" href="../index.php">Back</a>
                    </div>
                </div>
            </form>
        <?php }
        else {
            echo "<p>Sorry! No data found for this student.</p>";
        } ?>
    </div>

<?php require_once '../components/footer.php'?>