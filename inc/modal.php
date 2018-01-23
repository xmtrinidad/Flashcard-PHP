<?php 
  require('./config/functions.php');
    if (isset($_POST['delete'])) {
        $sql = "DELETE FROM flashcard_set WHERE set_id = ?";
        prepareAndExecute($sql, array($set_id)); // $set_id is defined in the page that uses this modal.

        $sql = "DROP TABLE `$setName`";
        prepareAndExecute($sql, array());

        header('Location: ' . 'index.php' . '');
    }
?>


<!-- Button trigger modal -->
<div class="modal-trigger text-center">
  <button type="button" class="btn btn-danger mb-4" data-toggle="modal" data-target="#delete-modal">
              Delete Set
  </button>
</div>

<!-- Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="Delete Flashcard Set" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete <?php echo $setName; ?> set?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>You will not be able to recover this set once it's deleted.  Are you sure you want to delete this set?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form method="POST">
            <button name="delete" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>