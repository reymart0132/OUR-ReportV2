<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ord/resource/php/class/core/init.php';
$configndocs = new config;
$conndocs = $configndocs->con();

?>

 <div class="col-md-5">
    <h1>Overall Office Transaction Report (Normal Transaction)</h1>
    <h5 class="my-3"><i class='fa fa-clock'></i> Average Office Transaction Cycle Time for this Month: <a href="#"><?php echo findCycleTime();?> Days </a></h5>
    <h5 class="mb-3"><i class='fa fa-file-alt'></i> Total Office Pending Transaction: <a href="#"><?php echo findPending()?> transaction/s</a><br />&nbsp;&nbsp;&nbsp;&nbsp;(includes previous month pending transaction)</h5>
    <h5 class="mb-3"><i class='fa fa-share'></i> Total Transaction Received for this Month: <a href="#"><?php echo findReceivedTransaction()?> transaction/s</a></h5>
    <h5 class="mb-3"><i class='fa fa-check-circle'></i> Total Transaction Completed and Ready for Release this Month: <a href="#"><?php echo findCompletedTransaction()?> </a><br />&nbsp;&nbsp;&nbsp;&nbsp;(includes previous month transaction that were completed this month)</h5></h5>
    <h5 class="mb-3"><i class='fa fa-shoe-prints'></i> Total Transaction Released this Month: <a href="#"><?php echo findReleasedTransaction()?> </a></h5>
</div>

<div class="col-md-5">
    <h1>Overall Office Transaction Report (Special Transaction)</h1>
    <h5 class="my-3"><i class='fa fa-clock'></i> Average Office Transaction Cycle Time for this Month: <a href="#"><?php echo findCycleTime();?> Days </a></h5>
    <h5 class="mb-3"><i class='fa fa-file-alt'></i> Total Office Pending Transaction: <a href="#"><?php echo findPending()?> transaction/s</a><br />&nbsp;&nbsp;&nbsp;&nbsp;(includes previous month pending transaction)</h5>
    <h5 class="mb-3"><i class='fa fa-share'></i> Total Transaction Received for this Month: <a href="#"><?php echo findReceivedTransaction()?> transaction/s</a></h5>
    <h5 class="mb-3"><i class='fa fa-check-circle'></i> Total Transaction Completed and Ready for Release this Month: <a href="#"><?php echo findCompletedTransaction()?> </a><br />&nbsp;&nbsp;&nbsp;&nbsp;(includes previous month transaction that were completed this month)</h5></h5>
    <h5 class="mb-3"><i class='fa fa-shoe-prints'></i> Total Transaction Released this Month: <a href="#"><?php echo findReleasedTransaction()?> </a></h5>
</div>