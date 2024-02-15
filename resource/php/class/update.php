<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ord/resource/php/class/core/init.php';

class update extends config{

    public $tID, $type, $info;

    function __construct( $transactionID = null, $type = null, $info=null ){
        $this->tID = $transactionID;
        $this->type = $type;
        $this->info = $info;
    }

    public function kcej_setStateFS(){
        $config = new config();
        $con = $this->con();
        $sql = "UPDATE `tbl_transaction` SET `remarks` = 'FOR SIGNATURE' WHERE `transactionid` = '$this->tID'";
        $data= $con->prepare($sql);
        if($data->execute()){
            $this->kcej_setPrinted();
        }else{
            return false;
        }
    }

    public function kcej_setStateFR(){
        $config = new config();
        $con = $this->con();
        $sql = "UPDATE `tbl_transaction` SET `remarks` = 'FOR RELEASE', `signeddate` = now() WHERE `transactionid` = '$this->tID'";
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
            $sql = "UPDATE `tbl_transaction` SET `remarks` = 'RELEASED', `info`='$this->info', `releasedate` = now() WHERE `transactionid` = '$this->tID'";
        }elseif($this->type == 'sp'){
            $sql = "UPDATE `tbl_spctransaction` SET `remarks` = 'RELEASED', `info`='$this->info' `releasedate` = now() WHERE `transactionid` = '$this->tID'";
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
        if ($this->type == 'reg') {
            $sql = "UPDATE `tbl_transaction` SET `remarks`='REMOVED', `info`='$this->info' WHERE `transactionid` = '$this->tID'";
        } elseif ($this->type == 'sp') {
            $sql = "UPDATE `tbl_spctransaction` SET `remarks`='REMOVED', `info`='$this->info' WHERE `transactionid` = '$this->tID'";
        } else {
            header("HTTP/1.1 403 Forbidden");
        }
        $data= $con->prepare($sql);
        if($data->execute()){
            $this->kcej_deleteItems();
        }else{
            return false;
        }
    }

    public function kcej_deleteItems(){
        $config = new config();
        $con = $this->con();
        $sql = "DELETE FROM tbl_items WHERE `transnumber` = '$this->tID'";
        $data = $con->prepare($sql);

        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function kcej_setPrinted(){
        $config = new config();
        $con = $this->con();
        $sql = "UPDATE `tbl_items` SET `printeddate` = now() WHERE `transnumber` = '$this->tID'";
        $data = $con->prepare($sql);

        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>