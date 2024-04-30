 <?php

echo"<div class='modal fade' id='release$id' aria-labelledby='modal' aria-hidden='true'>
        <form method='get' action='actions.php'>
        <div class='modal-dialog modal-lg'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='modal'>Release Document</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>



                <div class='modal-body'>
                    
                        <div class='mb-3'>
                            <label for='remarks' class='form-label'>Enter Remarks</label>
                            <textarea class='form-control' id='remarks' name='remarks' rows='3'></textarea>
                        </div>

                        <input type='hidden' name='transactionID' value='$id'>
                        <input type='hidden' name='state' value='3'>
                        <input type='hidden' name='type' value='".$data['apptype']."'>

                    </form>
                </div>

                <div class='modal-footer mt-3'>

                    <button type='button' class='btn btn-sm btn-danger' data-bs-dismiss='modal'><i class='fa-solid fa-x'></i> Cancel</button>
                    <button type='submit' class='btn btn-sm  btn-success m-1' data-toggle='tooltip' data-placement='top' title='Set as Released'><i class='fa-solid fa-check'></i> Release Document</button>
                </div>
            
            </div>
        </div>
        </form>
    </div>";

?>
