<?php 
    session_start();
    require_once '../components/header.php';

    // Set sessions
    if(isset($_SESSION['student_data'])) {
        $student = $_SESSION['student_data'];
    }
?>

    <div class="container my-4">
        <h1 class="h2 fw-bold">View Student</h1>

        <?php if($student) {?>

        <!-- View student form -->
        <form action="../controllers/studentController.php" method="POST" id="view_stu_form" class="bg-light border shadow-sm rounded py-2 px-3 my-4">
            <div class="modal-body text-start">
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $student['first_name']; ?>" readonly>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $student['last_name']; ?>" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= $student['email']; ?>" readonly>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="contact_no" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contact_no" name="contact_no" value="<?= $student['contact_no']; ?>" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="address_line_1" class="form-label">Address</label>
                        <input type="text" class="form-control mb-1" id="address_line_1" name="address_line_1" value="<?= $student['address_line_1']; ?>" readonly>
                        <input type="text" class="form-control mb-1" id="address_line_2" name="address_line_2" value="<?= $student['address_line_2']; ?>" readonly>
                        <input type="text" class="form-control mb-1" id="address_line_3" name="address_line_3" value="<?= $student['address_line_3']; ?>" readonly>
                    </div>
                </div>

                <input type="hidden" name="action" value="add">
            </div>

            <div class="d-flex justify-content-end">
                <a class="btn btn-outline-danger" href="../index.php">Back</a>
            </div>
        </form>

        <?php }
        else {
            echo "<p>Sorry! No data found for this student.</p>";
        } ?>
    </div>

<?php require_once '../components/footer.php'?>