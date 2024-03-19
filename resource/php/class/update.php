<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ord/resource/php/class/core/init.php';

class update extends config{

    public $tID, $type, $info,$assignee;

    function __construct( $transactionID = null, $type = null, $info=null,$assignee=null ){
        $this->tID = $transactionID;
        $this->type = $type;
        $this->info = $info;
        $this->assignee = $assignee;
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
            $sql = "UPDATE `tbl_spctransaction` SET `remarks` = 'RELEASED', `info`='$this->info' ,`releasedate` = now() WHERE `transactionid` = '$this->tID'";
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
    public function set_forAssign()
    {

        $timestamp = time(); // Get the current timestamp
        $dateconfirmed = date('Y-m-d H:i:s', $timestamp); // Format the timestamp as a string in the desired format
        $config = new config();
        $con = $this->con();
        if ($this->type == 'reg') {
            $sql = "UPDATE `tbl_transaction` SET `remarks`='FOR ASSIGNMENT',`dateconfirmed`='$dateconfirmed', `info`='$this->info' WHERE `transactionid` = '$this->tID'";
        } elseif ($this->type == 'sp') {
            $sql = "UPDATE `tbl_spctransaction` SET `remarks`='FOR ASSIGNMENT',`dateconfirmed`='$dateconfirmed', `info`='$this->info' WHERE `transactionid` = '$this->tID'";
        } else {
            header("HTTP/1.1 403 Forbidden");
        }
        $data = $con->prepare($sql);
        if ($data->execute()) {
            $this->kcej_deleteItems();
        } else {
            return false;
        }
    }
    public function assignTo()
    {

        $timestamp = time(); // Get the current timestamp
        $dateconfirmed = date('Y-m-d H:i:s', $timestamp); // Format the timestamp as a string in the desired format
        $config = new config();
        $con = $this->con();
        if ($this->type == 'reg') {
            $sql = "UPDATE `tbl_transaction` SET `remarks`='ASSIGNED',`assignee`='$this->assignee',`paymentdate`='$dateconfirmed' WHERE `transactionid` = '$this->tID'";
        } elseif ($this->type == 'sp') {
            $sql = "UPDATE `tbl_spctransaction` SET `remarks`='ASSIGNED',`assignee`='$this->assignee' WHERE `transactionid` = '$this->tID'";
        } else {
            header("HTTP/1.1 403 Forbidden");
        }
        $data = $con->prepare($sql);
        if ($data->execute()) {
            $this->kcej_deleteItems();
        } else {
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
    public function setForPayment(){
        $config = new config();
        $con = $this->con();
        $sql = "UPDATE `tbl_spctransaction` SET `remarks` = 'FOR PAYMENT' WHERE `transactionid` = '$this->tID'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function setForSignature(){
        $timestamp = time(); // Get the current timestamp
        $dateconfirmed = date('Y-m-d H:i:s', $timestamp); // Format the timestamp as a string in the desired format
        $config = new config();
        $con = $this->con();
        $sql = "UPDATE `tbl_spctransaction` SET `remarks` = 'FOR SIGNATURE',`paymentdate`='$dateconfirmed' WHERE `transactionid` = '$this->tID'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function setForRelease(){
        $timestamp = time(); // Get the current timestamp
        $dateconfirmed = date('Y-m-d H:i:s', $timestamp); // Format the timestamp as a string in the desired format
        $config = new config();
        $con = $this->con();
        $sql = "UPDATE `tbl_spctransaction` SET `remarks` = 'FOR RELEASE',`signeddate`='$dateconfirmed' WHERE `transactionid` = '$this->tID'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>