<?php
require_once 'config.php';
ini_set("xdebug.var_display_max_children", '-1');
ini_set("xdebug.var_display_max_data", '-1');
ini_set("xdebug.var_display_max_depth", '-1');
class transaction extends config
{
    public $transactionid,$studentNumber,$yearGraduated,$status,$fullName,$course,$reason,$contactNumber,$emailAddress,$facebook,$points,$price,$specialinstruction,$summary;


    function __construct($transactionid = null, $studentNumber = null, $yearGraduated = null, $status = null, $fullName = null, $course = null, $reason = null, $contactNumber = null, $emailAddress = null, $facebook = null, $points=null,$price=null, $specialinstruction=null,$summary=null)
    {
        $this->transactionid= $transactionid;
        $this->studentNumber= $studentNumber;
        $this->yearGraduated= $yearGraduated;
        $this->status= $status;
        $this->fullName= $fullName;
        $this->course= $course;
        $this->reason= $reason;
        $this->contactNumber= $contactNumber;
        $this->emailAddress= $emailAddress;
        $this->facebook= $facebook;
        $this->points = $points;
        $this->price = $price;
        $this->specialinstruction = $specialinstruction;
        $this->summary = str_replace('<br />', '%0D%0A',nl2br(filter_var($summary, FILTER_SANITIZE_STRING)));

    }
    public function insertTransaction()
    {
        $currentDateTime = date("Y-m-d H:i:s");
        $config = new config;
        $con = $config->con();
        $sql = "INSERT INTO tbl_transaction( `transactionid`,`stdn`,`yeargrad`,`status`,`fullname`,`course`,`reason`,`contactnumber`,`emailaddress`,`facebook`,`dateapp`,`points`,`price`,`specialinstruction`,`summary`) VALUES('$this->transactionid','$this->studentNumber','$this->yearGraduated','$this->status','$this->fullName','$this->course','$this->reason','$this->contactNumber','$this->emailAddress','$this->facebook','$currentDateTime',$this->points,$this->price,'$this->specialinstruction','$this->summary')";
        $data = $con->prepare($sql);
        // var_dump($data);
        // die();
        $data->execute();
    }
    public function editTransaction()
    {
        $currentDateTime = date("Y-m-d H:i:s");
        $config = new config;
        $con = $config->con();
        $sql = "UPDATE `tbl_spctransaction` SET `price`= '$this->price', `summary`='$this->summary' where `transactionid` = '$this->transactionid'";
        $data = $con->prepare($sql);
        // var_dump($data);
        // die();
        $data->execute();
    }

}