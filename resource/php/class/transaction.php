<?php
require_once 'config.php';

class transaction extends config
{
    public $transactionid,$studentNumber,$yearGraduated,$status,$fullName,$course,$reason,$contactNumber,$emailAddress,$facebook,$points,$price,$specialinstruction;


    function __construct($transactionid = null, $studentNumber = null, $yearGraduated = null, $status = null, $fullName = null, $course = null, $reason = null, $contactNumber = null, $emailAddress = null, $facebook = null, $points=null,$price=null, $specialinstruction=null)
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

    }
    public function insertTransaction()
    {
        $currentDateTime = date("Y-m-d H:i:s");
        $config = new config;
        $con = $config->con();
        $sql = "INSERT INTO tbl_transaction( `transactionid`,`stdn`,`yeargrad`,`status`,`fullname`,`course`,`reason`,`contactnumber`,`emailaddress`,`facebook`,`dateapp`,`points`,`price`,`specialinstruction`) VALUES('$this->transactionid','$this->studentNumber','$this->yearGraduated','$this->status','$this->fullName','$this->course','$this->reason','$this->contactNumber','$this->emailAddress','$this->facebook','$currentDateTime',$this->points,$this->price,'$this->specialinstruction')";
        $data = $con->prepare($sql);
        $data->execute();
    }

}