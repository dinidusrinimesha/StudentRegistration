<table class="shadow-sm rounded table table-bordered table-striped table-hover">
    <thead class="text-center">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Contact No.</th>
            <th scope="col">Address</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    
    <tbody>
        <?php if(count($students) > 0) {?>
        <?php foreach($students as $student) {?>
            <tr>
                <td scope="row"><?= $student['id']?></td>
                <td scope="row"><?= $student['first_name'] . " " . $student['last_name']?></td>
                <td scope="row"><?= $student['email']?></td>
                <td scope="row"><?= $student['contact_no']?></td>
                <td scope="row"><?= $student['address_line_1']. " " . $student['address_line_2'] . " " . $student['address_line_3']?></td>
                <td>
                    <form action="./controllers/studentController.php" method="POST" class="d-inline">
                        <input type="hidden" name="action" value="view">
                        <input type="hidden" name="stu_id" value="<?= $student['id']?>">
                        <button type="submit" class="badge bg-primary border-0">
                            View
                        </button>
                    </form> 

                    <form action="./controllers/studentController.php" method="POST" class="d-inline">
                        <input type="hidden" name="action" value="edit_form">
                        <input type="hidden" name="stu_id" value="<?= $student['id']?>">
                        <button type="submit" class="badge bg-warning border-0">
                            Edit
                        </button>
                    </form>

                    <button type="button" class="badge bg-danger border-0"
                            data-bs-toggle="modal" data-bs-target="#deleteModal"
                            data-student-id="<?= $student['id']; ?>">
                        Delete
                    </button>
                </td>
            </tr>
        <?php }?>
        <?php } else {?>
            <tr>
                <td colspan="6" class="text-center">No data found.</td>
            </tr>
        <?php }?>
    </tbody>
</table>