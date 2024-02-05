<?php
require_once 'config.php';

class items extends config
{
    public $transactionid,$studentNumber,$quantity,$itemname;


    function __construct($transactionid = null, $studentNumber = null, $quantity=null, $itemname=null)
    {
        $this->transactionid= $transactionid;
        $this->studentNumber= $studentNumber;
        $this->quantity= $quantity;
        $this->itemname= $itemname;


    }
    public function insertItem()
    {
        $currentDateTime = date("Y-m-d H:i:s");
        $config = new config;
        $con = $config->con();
        $sql = "INSERT INTO tbl_items(`itemrequest`,`quantity`,`transnumber`) VALUES('$this->itemname','$this->quantity','$this->transactionid')";
        $data = $con->prepare($sql);
        $data->execute();
    }

}