<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ord/resource/php/class/core/init.php';

class update extends config{

    public $transactionID, $type;

    function __construct( $transactionID = null, $type = null ){
        $this->tID = $transactionID;
        $this->type = $type;
    }

    public function kcej_setStateFS(){
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

    public function kcej_setStateFR(){
        $config = new config();
        $con = $this->con();
        $sql = "UPDATE `tbl_transaction` SET `remarks` = 'FOR RELEASE' WHERE `transactionid` = '$this->tID'";
        $data= $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function kcej_setStateRL(){
        $config = new config();
        $con = $this->con();
        if($this->type == 'reg'){
            $sql = "UPDATE `tbl_transaction` SET `remarks` = 'RELEASED' WHERE `transactionid` = '$this->tID'";
        }elseif($this->type == 'sp'){
            $sql = "UPDATE `tbl_spctransaction` SET `remarks` = 'RELEASED' WHERE `transactionid` = '$this->tID'";
        }else{
            header("HTTP/1.1 403 Forbidden");
        }
        $data= $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function kcej_setStateDL(){
        $config = new config();
        $con = $this->con();
        if($this->type == 'reg'){
            $sql = "DELETE FROM `tbl_transaction` WHERE `transactionid` = '$this->tID'";
        }elseif($this->type == 'sp'){
            $sql = "DELETE FROM `tbl_spctransaction` WHERE `transactionid` = '$this->tID'";
        }else{
            header("HTTP/1.1 403 Forbidden");
        }
        $data= $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>