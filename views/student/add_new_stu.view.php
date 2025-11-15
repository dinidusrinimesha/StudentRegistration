<?php 
    session_start();
    require_once "../layouts/header.php";
?>

    <div class="container my-4">
        <!-- Page Title -->
        <h1 class="h2 fw-bold">Add New Student</h1>

        <!-- Bradcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= SYS_ROOT ?>">All Students</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add New Student</li>
            </ol>
        </nav>

        <!-- Add New Form -->
        <form action="../../controllers/studentController.php" method="POST" id="add_new_form" class="bg-light border shadow-sm rounded p-4 my-4">
            <!-- Alerts -->
            <?php if(isset($_SESSION['error'])) {?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <b><?= $_SESSION['error']; ?></b>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['error']);  ?>
            <?php }?>

            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="first_name" class="form-label"><span class="text-danger">* </span>First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Sunil">
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Perera">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="email" class="form-label"><span class="text-danger">* </span>Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="sunil@sample.com">
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="contact_no" class="form-label"><span class="text-danger">* </span>Contact Number</label>
                    <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="07X X XXXXXX">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="address_line_1" class="form-label"><span class="text-danger">* </span>Address</label>
                    <input type="text" class="form-control mb-1" id="address_line_1" name="address_line_1" placeholder="Address Line 1">
                    <input type="text" class="form-control mb-1" id="address_line_2" name="address_line_2" placeholder="Address Line 2">
                    <input type="text" class="form-control mb-1" id="address_line_3" name="address_line_3" placeholder="Address Line 3">
                </div>
            </div>

            <input type="hidden" name="action" value="add">

            <div class="d-flex justify-content-between">
                <small class="text-danger text-start">* Required fields</small>
                <div>
                    <button type="submit" class="btn btn-primary me-3">Add</button>
                    <a class="btn btn-outline-danger" href="../../index.php">Back</a>
                </div>
            </div>
        </form>
    </div>

<?php require_once '../layouts/footer.php';?>