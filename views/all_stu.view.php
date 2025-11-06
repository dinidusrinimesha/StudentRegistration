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
            if($result) {
                mysqli_fetch_all($result);
            }
            else {
                echo "No data";
            }
        
            die();
        
        ?>
        <tr>
            <th scope="row">1</th>
            <td>Sunil</td>
            <td>Perera</td>
            <td>sunil@gmail.com</td>
            <td>0112 123 123</td>
            <td>
                <span id="view-btn" class="badge bg-primary me-1" data-bs-toggle="modal" data-bs-target="#viewStuModel">View</span>
                <span id="edit-btn" class="badge bg-warning me-1">Edit</span>
                <span id="delete-btn" class="badge bg-danger me-1">Delete</span>
            </td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Sunil</td>
            <td>Perera</td>
            <td>sunil@gmail.com</td>
            <td>0112 123 123</td>
            <td>
                <span id="view-btn" class="badge bg-primary me-1">View</span>
                <span id="edit-btn" class="badge bg-warning me-1">Edit</span>
                <span id="delete-btn" class="badge bg-danger me-1">Delete</span>
            </td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Sunil</td>
            <td>Perera</td>
            <td>sunil@gmail.com</td>
            <td>0112 123 123</td>
            <td>
                <span id="view-btn" class="badge bg-primary me-1" data-bs-toggle="modal" data-bs-target="#addNewStuModel">View</span>
                <span id="edit-btn" class="badge bg-warning me-1">Edit</span>
                <span id="delete-btn" class="badge bg-danger me-1">Delete</span>
            </td>
        </tr>
    </tbody>
</table>