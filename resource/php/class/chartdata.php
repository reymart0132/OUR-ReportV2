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
        // $sql = "SELECT `itemrequest`, COUNT(`itemrequest`) as `count` FROM (SELECT `itemrequest` from `tbl_spcitems` UNION ALL SELECT `itemrequest` from `tbl_items` )AS `ORIGIN` GROUP BY `itemrequest` ORDER BY `count` DESC LIMIT 5";
        $sql = "SELECT * FROM ( SELECT `itemrequest`, sum(`quantity`) AS `total` from tbl_items group by `itemrequest` UNION ALL SELECT `itemrequest`, sum(`quantity`) AS `total` from tbl_spcitems group by `itemrequest` ) AS `merged` ORDER BY `total` DESC LIMIT 5";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            // $item[] = $row['itemrequest'];
            echo "<li>".$row['itemrequest']."</li>";
        }
        // return $item;
    }

    public function pg_tdReqDocNameREG(){
        $con = $this->con();
        $sql = "SELECT `itemrequest`, SUM(`quantity`) AS `total` FROM  (SELECT `itemrequest`, `quantity` FROM `tbl_items` WHERE DATE(`recdate`) = CURDATE()) AS `itemlist` GROUP BY `itemrequest` ASC";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)){
            $item[] = "Insufficient Data";
        }else{
            foreach($result as $row){
                $item[] = $row['itemrequest']." (".$row['total'].")";
            }
        }
        return $item;
    }

    public function pg_tdReqDocCountREG(){
        $con = $this->con();
        $sql = "SELECT `itemrequest`, SUM(`quantity`) AS `total` FROM  (SELECT `itemrequest`, `quantity` FROM `tbl_items` WHERE DATE(`recdate`) =  CURDATE()) AS `itemlist` GROUP BY `itemrequest` ASC";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)){
            $count[] = 1;
        }else{
            foreach($result as $row){
                $count[] = $row['total'];
            }
        }
        return $count;
    }

    public function pg_tdReqDocNameSP(){
        $con = $this->con();
        $sql = "SELECT `itemrequest`, SUM(`quantity`) AS `total` FROM  (SELECT `itemrequest`, `quantity` FROM `tbl_spcitems` WHERE DATE(`recdate`) = CURDATE()) AS `itemlist` GROUP BY `itemrequest` ASC";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)){
            $item[] = "Insufficient Data";
        }else{
            foreach($result as $row){
                $item[] = $row['itemrequest']." (".$row['total'].")";
            }
        }
        return $item;
    }

    public function pg_tdReqDocCountSP(){
        $con = $this->con();
        $sql = "SELECT `itemrequest`, SUM(`quantity`) AS `total` FROM  (SELECT `itemrequest`, `quantity` FROM `tbl_spcitems` WHERE DATE(`recdate`) = CURDATE()) AS `itemlist` GROUP BY `itemrequest` ASC";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)){
            $count[] = 1;
        }else{
            foreach($result as $row){
                $count[] = $row['total'];
            }
        }
        return $count;
    }

    public function pg_mtReqDocNameREG(){
        $con = $this->con();
        $sql = "SELECT `itemrequest`, SUM(`quantity`) AS `total` FROM  (SELECT `itemrequest`, `quantity` FROM `tbl_items` WHERE MONTH(`recdate`) = MONTH(NOW()) ) AS `itemlist` GROUP BY `itemrequest` ASC";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)){
            $item[] = "Insufficient Data";
        }else{
            foreach($result as $row){
                $item[] = $row['itemrequest']." (".$row['total'].")";
            }
        }
        return $item;
    }

    public function pg_mtReqDocCountREG(){
        $con = $this->con();
        $sql = "SELECT `itemrequest`, SUM(`quantity`) AS `total` FROM  (SELECT `itemrequest`, `quantity` FROM `tbl_items` WHERE MONTH(`recdate`) = MONTH(NOW()) ) AS `itemlist` GROUP BY `itemrequest` ASC";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)){
            $count[] = 1;
        }else{
            foreach($result as $row){
                $count[] = $row['total'];
            }
        }
        return $count;
    }

    public function pg_mtReqDocNameSP(){
        $con = $this->con();
        $sql = "SELECT `itemrequest`, SUM(`quantity`) AS `total` FROM  (SELECT `itemrequest`, `quantity` FROM `tbl_spcitems` WHERE MONTH(`recdate`) = MONTH(NOW()) ) AS `itemlist` GROUP BY `itemrequest` ASC";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)){
            $item[] = "Insufficient Data";
        }else{
            foreach($result as $row){
                $item[] = $row['itemrequest']." (".$row['total'].")";
            }
        }
        return $item;
    }

    public function pg_mtReqDocCountSP(){
        $con = $this->con();
        $sql = "SELECT `itemrequest`, SUM(`quantity`) AS `total` FROM  (SELECT `itemrequest`, `quantity` FROM `tbl_spcitems` WHERE MONTH(`recdate`) = MONTH(NOW()) ) AS `itemlist` GROUP BY `itemrequest` ASC";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)){
            $count[] = 1;
        }else{
            foreach($result as $row){
                $count[] = $row['total'];
            }
        }
        return $count;
    }

    public function pg_wkmrdocNameREG(){
        $con = $this->con();
        $sql = "SELECT `itemrequest`, SUM(`quantity`) AS `total` FROM  (SELECT `itemrequest`, `quantity` FROM `tbl_items` WHERE WEEK(`recdate`) = WEEK(NOW()) ) AS `itemlist` GROUP BY `itemrequest` ASC";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)){
            $item[] = "Insufficient Data";
        }else{
            foreach($result as $row){
                $item[] = $row['itemrequest']." (".$row['total'].")";
            }
        }
        return $item;
    }

    public function pg_wkmrDocCountREG(){
        $con = $this->con();
        $sql = "SELECT `itemrequest`, SUM(`quantity`) AS `total` FROM  (SELECT `itemrequest`, `quantity` FROM `tbl_items` WHERE WEEK(`recdate`) = WEEK(NOW()) ) AS `itemlist` GROUP BY `itemrequest` ASC";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)){
            $count[] = 1;
        }else{
            foreach($result as $row){
                $count[] = $row['total'];
            }
        }
        return $count;
    }

    public function pg_wkmrDocNameSP(){
        $con = $this->con();
        $sql = "SELECT `itemrequest`, SUM(`quantity`) AS `total` FROM  (SELECT `itemrequest`, `quantity` FROM `tbl_spcitems` WHERE WEEK(`recdate`) = WEEK(NOW()) ) AS `itemlist` GROUP BY `itemrequest` ASC";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)){
            $item[] = "Insufficient Data";
        }else{
            foreach($result as $row){
                $item[] = $row['itemrequest']." (".$row['total'].")";
            }
        }
        return $item;
    }

    public function pg_wkmrDocCountSP(){
        $con = $this->con();
        $sql = "SELECT `itemrequest`, SUM(`quantity`) AS `total` FROM  (SELECT `itemrequest`, `quantity` FROM `tbl_spcitems` WHERE WEEK(`recdate`) = WEEK(NOW()) ) AS `itemlist` GROUP BY `itemrequest` ASC";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)){
            $count[] = 1;
        }else{
            foreach($result as $row){
                $count[] = $row['total'];
            }
        }
        return $count;
    }

    public function encoderNamesREG(){
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_accounts` WHERE `groups` = '1' ORDER BY `id` ASC";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            $name[] = $row['name'];
        }
        return $name;
    }

    public function encoderNamesSP(){
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_accounts` WHERE `groups` = '4' ORDER BY `id` ASC";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            $name[] = $row['name'];
        }
        return $name;
    }

    public function encoderIdREG(){
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_accounts` WHERE `groups` = '1' OR `groups` = '4' ORDER BY `id` ASC";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            $name[] = $row['id'];
        }
        return $name;
    }

    public function encoderIdSP(){
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_accounts` WHERE `groups` = '4' OR `groups` = '1' ORDER BY `id` ASC";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            $name[] = $row['id'];
        }
        return $name;
    }

    public function countDailyTaskDoneSP(){
        $each_count = array();
        foreach($this->encoderIdSP() as $id){
            $getcount = $this->getCountDailyTaskDoneSP($id);
            foreach($getcount as $count){
                $each_count[] = $count;
            }
        }
        return $each_count;
    }

    public function getCountDailyTaskDoneSP($id){
            $current_date = date("Y-m-d");
            $con = $this->con();
            $sql = "SELECT COUNT(`transactionid`) AS `count` FROM `tbl_spctransaction` WHERE `signeddate` LIKE '$current_date%' AND `assignee` = '$id'";
            $data= $con->prepare($sql);
            $data->execute();
            $result = $data->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $row){
                $count[] = $row['count'];
            }
            return $count;
    }

    public function countDailyTaskDoneREG(){
        $each_count = array();
        foreach($this->encoderIdREG() as $id){
            $getcount = $this->getCountDailyTaskDoneREG($id);
            foreach($getcount as $count){
                $each_count[] = $count;
            }
        }
        return $each_count;
    }

    public function getCountDailyTaskDoneREG($id){
        $current_date = date("Y-m-d");
        $con = $this->con();
        $sql = "SELECT COUNT(`transactionid`) AS `count` FROM `tbl_transaction` WHERE `signeddate` LIKE '$current_date%' AND `assignee` = '$id'";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            $count[] = $row['count'];
        }
        return $count;
    }

    public function getLastSevenDays(){
        $days = array();
        for($i=7; $i>0; $i--){
            $date =  date("Y-m-d", strtotime("-$i days"));
            $day = strval(date('w', strtotime($date)));

                if(strval($day) == "0"){
                    continue;
                }
                $days[] = $date;
            }
        return $days;
    }

    public function getCountAppSevenDaysREG(){
        $app_count = array();
        foreach($this->getLastSevenDays() as $date){
            $getcount = $this->getCountDailyAppREG($date);
            foreach($getcount as $count){
                $app_count[] = $count;
            }
        }
        return $app_count;
    }

    public function getCountAppTodayREG(){
        $current_date = date("Y-m-d");
        $con = $this->con();
        $sql = "SELECT COUNT(`transactionid`) AS `count` FROM `tbl_transaction` WHERE `dateapp` LIKE '$current_date%'";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            $count = $row['count'];
        }
        return $count;
    }

    public function getCountDailyAppREG($date){
        $con = $this->con();
        $sql = "SELECT COUNT(`transactionid`) AS `count` FROM `tbl_transaction` WHERE `dateapp` LIKE '$date%'";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            $count[] = $row['count'];
        }
        return $count;
    }

    public function getCountAppSevenDaysSP(){
        $app_count = array();
        foreach($this->getLastSevenDays() as $date){
            $getcount = $this->getCountDailyAppSP($date);
            foreach($getcount as $count){
                $app_count[] = $count;
            }
        }
        return $app_count;
    }

    public function getCountAppTodaySP(){
        $current_date = date("Y-m-d");
        $con = $this->con();
        $sql = "SELECT COUNT(`transactionid`) AS `count` FROM `tbl_spctransaction` WHERE `dateapp` LIKE '$current_date%'";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            $count = $row['count'];
        }
        return $count;
    }

    public function getCountDailyAppSP($date){
        $con = $this->con();
        $sql = "SELECT COUNT(`transactionid`) AS `count` FROM `tbl_spctransaction` WHERE `dateapp` LIKE '$date%'";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            $count[] = $row['count'];
        }
        return $count;
    }


}
//SELECT COUNT(`itemrequest`) as `count`, `itemrequest` from `tbl_spcitems` GROUP BY `itemrequest`
 //           UNION ALL SELECT COUNT(`itemrequest`) as `count`, `itemrequest` from `tbl_items` GROUP BY `itemrequest` ORDER BY `count` DESC, `itemrequest` ASC


//SELECT `itemrequest`, COUNT(`itemrequest`) as `count` FROM (SELECT `itemrequest` from `tbl_spcitems` GROUP BY `itemrequest` UNION ALL SELECT `itemrequest` from `tbl_items` GROUP BY `itemrequest`) AS `ORIGIN`

//SELECT `itemrequest`, COUNT(`itemrequest`) as `count` FROM (SELECT `itemrequest` from `tbl_spcitems` GROUP BY `itemrequest` UNION ALL SELECT `itemrequest` from `tbl_items` GROUP BY `itemrequest`) AS `ORIGIN` GROUP BY `itemrequest`
?>