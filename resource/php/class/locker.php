<?php

class locker extends config{

    public function lockForm() {
        $config = new config();
        $con = $config->con();
        if ($this->checkLock() == "CLOSED"){
            $sql = "UPDATE `tbl_config` SET `value` = 'OPEN'"; // close
        }
        else{
             $sql = "UPDATE `tbl_config` SET `value` = 'CLOSED'"; // open
        }
        $data = $con->prepare($sql);
        $data ->execute();
    }

    public function checkLock(){
        $config = new config();
        $con = $config->con();
        $sql = "SELECT `value` FROM `tbl_config`";
        $data = $con->prepare($sql);
        $data ->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]['value'];
    }

    public function lockerButton(){
        if ($this->checkLock() == "CLOSED"){
            echo "<b>OPEN FORM</b>";
        }
        else{
            echo "<b>CLOSE FORM</b>";
        }
    }

    public function lockerButtonClr(){
        if ($this->checkLock() == "CLOSED"){
            echo "btn-success";
        }
        else{
            echo "btn-danger";
        }
    }

    public function lockerStatusDisp(){
        $config = new config();
        $con = $config->con();
        $sql = "SELECT `value` FROM `tbl_config`";
        $data = $con->prepare($sql);
        $data ->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        if($result[0]['value'] == "OPEN"){
            echo "<h6 class='m-1'>Application Form is currently</h6> <h5><b class='text-success'> OPEN  </b></h5>";
        }else{
            echo "<h6 class='m-1'>Application Form is currently</h6> <h5><b class='text-danger'> CLOSED  </b></h5>";
        }
    }

    public function formLockerCheck(){
        $config = new config();
        $con = $config->con();
        $sql = "SELECT `value` FROM `tbl_config`";
        $data = $con->prepare($sql);
        $data ->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        if($result[0]['value'] == "OPEN"){
            // do nothing
        }else{
            header('Location:locked.php');
            exit();
        }
    }
}
?>