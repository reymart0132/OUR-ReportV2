<?php
require_once 'config.php';

class spctransaction extends config
{
    public $transactionid,$studentNumber,$yearGraduated,$status,$fullName,$course,$reason,$contactNumber,$emailAddress,$facebook,$doc1,$doc2,$doc1tmp,$doc2tmp,$filename1,$filename2,$type;


    function __construct($transactionid = null, $studentNumber = null, $yearGraduated = null, $status = null, $fullName = null, $course = null, $reason = null, $contactNumber = null, $emailAddress = null, $facebook = null,$doc1 =null,$doc2 = null,$doc1tmp =null,$doc2tmp=null,$type =null)
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
        $this->facebook = $facebook;
        $this->doc1= $doc1;
        $this->doc2= $doc2;
        $this->doc1tmp= $doc1tmp;
        $this->doc2tmp= $doc2tmp;
        $this->type= $type;
        $this->filename1="";
        $this->filename2="";

        // var_dump($this->doc1);
        // var_dump($this->doc2);
        // die();
        //Get Filename Extensions
        $vdoc1 = strtolower(pathinfo($this->doc1['name'], PATHINFO_EXTENSION));
        $vdoc2 = strtolower(pathinfo($this->doc2['name'], PATHINFO_EXTENSION));

        $this->doc1tmp = $doc1tmp;
        $this->doc2tmp = $doc2tmp;
        $curdate = date("mdyHis");
        //Error counter
        $error = 0;

        if(!isset($doc1)){

            $this->filename1 = "doc1" . $this->transactionid;

            if ($vdoc1 !== "pdf") {
                echo "<div class='alert alert-danger' role='alert'>
                        <i class='fa-solid fa-triangle-exclamation'></i> Error: Valid ID: File must be PDF.
                    </div>";
                $error = $error + 1;
            }
    
            if ($vdoc1 !== "pdf" ) {
                echo "<div class='alert alert-danger' role='alert'>
                        <i class='fa-solid fa-triangle-exclamation'></i> Error: Letter of Intent: File must be PDF.
                    </div>";
                $error = $error + 1;
            }
        }
        
        if(!isset($doc2)){

            $this->filename2 = "doc2" . $this->transactionid;
            if ($vdoc2 !== "pdf") {
                echo "<div class='alert alert-danger' role='alert'>
                        <i class='fa-solid fa-triangle-exclamation'></i> Error: Valid ID: File must be PDF.
                    </div>";
                $error = $error + 1;
            }
    
            if ($vdoc2 !== "pdf" ) {
                echo "<div class='alert alert-danger' role='alert'>
                        <i class='fa-solid fa-triangle-exclamation'></i> Error: Letter of Intent: File must be PDF.
                    </div>";
                $error = $error + 1;
            }

            
        }

        if ($error == 0) {
            $this->uploadFiles();
        }

    }
    public function insertTransaction()
    {
        $currentDateTime = date("Y-m-d H:i:s");
        $config = new config;
        $con = $config->con();

        if($this->doc1['error'] == '4'){
            $this->filename1 = "";
        }else{
            $this->filename1 = "doc1" . $this->transactionid;

        }

        if($this->doc2['error'] == '4'){
            $this->filename2 = "";
        }else{
            $this->filename2 = "doc2" . $this->transactionid;

        }
        
        $sql = "INSERT INTO tbl_spctransaction( `transactionid`,`stdn`,`yeargrad`,`status`,`fullname`,`course`,`reason`,`contactnumber`,`emailaddress`,`facebook`,`dateapp`,`doc1`,`doc2`,`type`) VALUES('$this->transactionid','$this->studentNumber','$this->yearGraduated','$this->status','$this->fullName','$this->course','$this->reason','$this->contactNumber','$this->emailAddress','$this->facebook','$currentDateTime','$this->filename1','$this->filename2','$this->type')";
        $data = $con->prepare($sql);
        $data->execute();
    }
    public function uploadFiles()
    {
        $this->doc1['name'] = "doc1" . $this->transactionid;
        $storage2 = "doc1/";
        $this->doc1File = $storage2 . $this->doc1['name'];
        move_uploaded_file($this->doc1tmp, $this->doc1File);

        $this->doc2['name'] = "doc2" . $this->transactionid;
        $storage = "doc2/";
        $this->doc2File = $storage . $this->doc2['name'];
        move_uploaded_file($this->doc2tmp, $this->doc2File);
    }

}