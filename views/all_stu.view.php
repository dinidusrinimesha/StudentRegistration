<?php
    require './database/db.php';

    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn, $sql);
?>

<table class="shadow-sm rounded table table-bordered table-striped table-hover">
    <thead class="text-center">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Contact No.</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    
    <tbody>
        <?php 
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){ 
        ?>

        <tr>
            <th scope="row"><?= $row['id']?></th>
            <td><?= $row['first_name']?></td>
            <td><?= $row['last_name']?></td>
            <td><?= $row['email']?></td>
            <td><?= $row['contact_no']?></td>
            <td>
                <form action="./controllers/studentController.php" method="POST" class="d-inline">
                    <input type="hidden" name="action" value="view">
                    <input type="hidden" name="stu_id" value="<?= $row['id'] ?>">
                    <button type="submit" class="badge bg-primary border-0">
                        View
                    </button>
                </form> 
                <form action="./controllers/studentController.php" method="POST" class="d-inline">
                    <input type="hidden" name="action" value="edit_form">
                    <input type="hidden" name="stu_id" value="<?= $row['id'] ?>">
                    <button type="submit" class="badge bg-warning border-0">
                        Edit
                    </button>
                </form> 
                <form action="./controllers/studentController.php" method="POST" class="d-inline">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="stu_id" value="<?= $row['id'] ?>">
                    <button type="submit" class="badge bg-danger border-0">
                        Delete
                    </button>
                </form> 
            </td>
        </tr>

        <?php 
            }
        } else {
            echo "<td colspan='6' class='text-center'> No Students Found </td>";
        } 
        ?>
    </tbody>
</table>