<!-- Add New Student Model -->
<div class="modal fade" id="viewStuModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewStuModelLabel"> View Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="#" id="view_stu_form">
                <div class="modal-body text-start">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Sunil" required disabled value="Dinidu Sri Nimesha">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Perera" disabled>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="sunil@sample.com" required disabled>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="contact_no" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="07X X XXXXXX" required disabled>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="address_line_1" class="form-label">Address</label>
                            <input type="text" class="form-control mb-1" id="address_line_1" name="address_line_1" placeholder="Address Line 1" required disabled>
                            <input type="text" class="form-control mb-1" id="address_line_2" name="address_line_2" placeholder="Address Line 2" disabled>
                            <input type="text" class="form-control mb-1" id="address_line_3" name="address_line_3" placeholder="Address Line 3" disabled>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <!-- <button type="submit" class="btn btn-primary">Add</button> -->
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>