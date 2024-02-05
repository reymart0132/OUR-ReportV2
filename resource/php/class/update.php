<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ord/resource/php/class/core/init.php';

class update extends config{

    public $transactionID;

    function __construct( $transactionID = null ){
        $this->tID =$transactionID;
    }

    public function kcej_setStateFS() {
        $config = new config();
        $con = $this->con();
        $sql = "UPDATE `tbl_transaction` SET `remarks` = 'FOR SIGNATURE' WHERE `transactionid` = '$this->tID'";
        $data= $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>