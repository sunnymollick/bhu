<!-- Common Delete Confirmation Modal -->
<div class="modal fade" id="commonDeleteModal" tabindex="-1" role="dialog" aria-labelledby="commonDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="commonDeleteForm" method="POST" action="">
      @csrf
      @method('DELETE')
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="commonDeleteModalTitle">
            <i class="fas fa-exclamation-triangle"></i> <span id="deleteItemType">Delete Item</span>
          </h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="mb-0" id="deleteConfirmMessage">Are you sure you want to delete this item?</p>
          <p class="text-muted small mb-0">This action cannot be undone.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fas fa-times"></i> Cancel
          </button>
          <button type="submit" class="btn btn-danger">
            <i class="fas fa-trash"></i> Delete
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
// Common delete modal function
function showDeleteModal(itemId, itemType, deleteUrl) {
    // Set the delete form action URL
    $('#commonDeleteForm').attr('action', deleteUrl);

    // Set the modal title
    $('#deleteItemType').text('Delete ' + itemType);

    // Set the confirmation message
    $('#deleteConfirmMessage').text('Are you sure you want to delete this ' + itemType.toLowerCase() + '?');

    // Show the modal
    $('#commonDeleteModal').modal('show');
}
</script>
