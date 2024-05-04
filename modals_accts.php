 <?php
    echo "<div class='modal fade' id='delUser$id' aria-labelledby='modal' aria-hidden='true'>
            <form method='get' action='actions.php'>
                <div class='modal-dialog modal-lg'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='modal'>Remove User</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>                   
                            <div class='mb-3'>
                                Content Here
                            </div>
                        </div>
                        <div class='modal-footer mt-3'>
                            <button type='button' class='btn btn-sm btn-danger' data-bs-dismiss='modal'><i class='fa-solid fa-x'></i> Cancel</button>
                            <button type='submit' class='btn btn-sm  btn-success m-1' data-toggle='tooltip' data-placement='top' title='Set as Released'><i class='fa-solid fa-check'></i> Confirm</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>";
?>
