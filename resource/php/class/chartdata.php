<?php
//require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/resource/php/class/core/init.php';

class chartdata extends config{

    public function transReceivedREG(){
        $current_date = date("Y-m-d");
        $con = $this->con();
        $sql = "SELECT COUNT(*) as `count` from `tbl_transaction` WHERE `dateapp` LIKE '$current_date%'";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]['count'];
    }

    public function transReceivedSP(){
        $current_date = date("Y-m-d");
        $con = $this->con();
        $sql = "SELECT COUNT(*) as `count` from `tbl_spctransaction` WHERE `dateapp` LIKE '$current_date%'";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]['count'];
    }

    public function transReceivedTotal(){
        $countREG = $this->transReceivedREG();
        $countSP = $this->transReceivedSP();
        $totalCount = $countREG+$countSP;
        return $totalCount;
    }

    public function transDoneREG(){
        $current_date = date("Y-m-d");
        $con = $this->con();
        $sql = "SELECT COUNT(*) as `count` from `tbl_transaction` WHERE `signeddate` LIKE '$current_date%'";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]['count'];
    }

    public function transDoneSP(){
        $current_date = date("Y-m-d");
        $con = $this->con();
        $sql = "SELECT COUNT(*) as `count` from `tbl_spctransaction` WHERE `signeddate` LIKE '$current_date%'";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]['count'];
    }

    public function transDoneTotal(){
        $countREG = $this->transDoneREG();
        $countSP = $this->transDoneSP();
        $totalCount = $countREG+$countSP;
        return $totalCount;
    }

    public function mostReqDocName(){
        $con = $this->con();
        $sql = "SELECT `itemrequest`, COUNT(`itemrequest`) as `count` FROM (SELECT `itemrequest` from `tbl_spcitems` UNION ALL SELECT `itemrequest` from `tbl_items` )AS `ORIGIN` GROUP BY `itemrequest` ORDER BY `count` DESC LIMIT 5";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            // $item[] = $row['itemrequest'];
            echo "<li>".$row['itemrequest']."</li>";
        }
    }

    public function encoderNamesREG(){
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_accounts` WHERE `groups` = '1' ORDER BY `id` ASC";
        $data= $con->prepare($sql);
        $data->execute();
        foreach($result as $row){
            $name[] = $row['name'];
        }
        unset($name[0]);
        return $name;
    }

    public function encoderNamesSP(){
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_accounts` WHERE `groups` = '4' ORDER BY `id` ASC";
        $data= $con->prepare($sql);
        $data->execute();
        foreach($result as $row){
            $name[] = $row['name'];
        }
        unset($name[0]);
        return $name;
    }

    public function encoderDailyTaskTallyREG(){
        $current_date = date("Y-m-d");
        $con = $this->con();
        $sql = "SELECT `transactionid`, `assignee` FROM `tbl_transaction` WHERE `signeddate` LIKE '$current_date'";
        $data= $con->prepare($sql);
        $data->execute();
        foreach($result as $row){
            $name[] = $row['name'];
        }
        unset($name[0]);
        return $name;
    }









    // public function mostReqDocQty(){
    //     $con = $this->con();
    //     $sql = "SELECT COUNT(`itemrequest`) as `count`, `itemrequest` from `tbl_spcitems` GROUP BY `itemrequest`
    //             UNION ALL SELECT COUNT(`itemrequest`) as `count`, `itemrequest` from `tbl_items` GROUP BY `itemrequest` ORDER BY `count` DESC, `itemrequest` ASC";
    //     $data= $con->prepare($sql);
    //     $data->execute();
    //     $result = $data->fetchAll(PDO::FETCH_ASSOC);
    //     foreach($result as $row){
    //         $count[] = $row['count'];
    //     }
    //     unset($count[0]);
    //     return $count;
    // }


    //SELECT COUNT(`itemrequest`) as `count`, `itemrequest` from `tbl_spcitems` GROUP BY `itemrequest`
     //           UNION ALL SELECT COUNT(`itemrequest`) as `count`, `itemrequest` from `tbl_items` GROUP BY `itemrequest` ORDER BY `count` DESC, `itemrequest` ASC


    //SELECT `itemrequest`, COUNT(`itemrequest`) as `count` FROM (SELECT `itemrequest` from `tbl_spcitems` GROUP BY `itemrequest` UNION ALL SELECT `itemrequest` from `tbl_items` GROUP BY `itemrequest`) AS `ORIGIN`

    //SELECT `itemrequest`, COUNT(`itemrequest`) as `count` FROM (SELECT `itemrequest` from `tbl_spcitems` GROUP BY `itemrequest` UNION ALL SELECT `itemrequest` from `tbl_items` GROUP BY `itemrequest`) AS `ORIGIN` GROUP BY `itemrequest`
}
?>