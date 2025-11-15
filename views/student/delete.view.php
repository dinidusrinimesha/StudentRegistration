<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Are you sure?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure? you want to delelet this record.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Close</button>
        <form action="./controllers/studentController.php" method="POST" class="d-inline">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" id="stu_id" name="stu_id">
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
        </form> 
      </div>
    </div>
  </div>
</div>

<script>
    /**
     * generated *
     * Add value attribute for the input stu_id
     * value pass from all_stu.view.php
     */

    const deleteModal = document.getElementById('deleteModal');

    deleteModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-student-id');
        document.getElementById('stu_id').value = id;
    });
</script>