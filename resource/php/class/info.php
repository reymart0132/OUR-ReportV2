<?php

class info extends config{

    public $tID, $type;

    function __construct($tID = null, $type = null){
        $this->tID = $tID;
        $this->type = $type;

        if($this->type == 'reg'){
            $this->viewInfoREG();
        }elseif($this->type == 'sp'){
            $this->viewInfoSP();
        }else{
            header("HTTP/1.1 403 Forbidden");
        }
    }

    public function viewInfoREG(){
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_transaction` WHERE `transactionid` = '$this->tID'";
        $data = $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
            $id = $result[0]['id'];
            $transID = $result[0]['transactionid'];
            $studentID = $result[0]['stdn'];
            $yeargrad = $result[0]['yeargrad'];
            $type = $result[0]['status'];
            $fullname = $result[0]['fullname'];
            $course = $result[0]['course'];
            $reason = $result[0]['reason'];
            $contact = $result[0]['contactnumber'];
            $email = $result[0]['emailaddress'];
            $dateapp = $result[0]['dateapp'];
            $remarks = $result[0]['remarks'];
            $dateconfirmed = $result[0]['dateconfirmed'];
            $points = $result[0]['points'];
            $price = $result[0]['price'];
            $inst = $result[0]['specialinstruction'];     
            $summary = $result[0]['summary'];

            if(!empty($result[0]['paymentdate'])){
                $paid = $result[0]['paymentdate'];
            }else{
                $paid = "N/A";
            }

            if(!empty($result[0]['signeddate'])){
                $signed = $result[0]['signeddate'];
            }else{
                $signed = "N/A";
            }

            if(!empty($result[0]['releasedate'])){
                $released = $result[0]['releasedate'];
            }else{
                $released = "N/A";
            }

            if(!empty($result[0]['facebook'])){
                $fb = $result[0]['facebook'];
            }else{
                $fb = "N/A";
            }

            if(!empty($result[0]['assignee'])){
                $assign = getAssignee($result[0]['assignee']);
            }else{
                $assign = "Unassigned";
            }

        $sql0 = "SELECT * FROM `tbl_items` WHERE `transnumber` = '$transID'";
        $data0 = $con->prepare($sql0);
        $data0->execute();
        $result0 = $data0->fetchAll(PDO::FETCH_ASSOC);

        echo "<div class='col-md-10'>
                <table class='table shadow m-3'>
                    <tr>
                        <td class='pt-5 px-5' width='60%'>
                            Name: <h4><i class='fa-solid fa-user icon-info'></i> <b>$fullname</b></h4>
                            Student Number: <h5><i class='fa-solid fa-id-card icon-info'></i> <b>$studentID</b></h5>
                            Current Request Status: <h5><i class='fa-solid fa-spinner icon-info'></i> <b>$remarks</b></h5>
                        </td>    
                        <td class='pt-5 px-5' width='40%'>
                            Transaction Number: <h4><i class='fa-solid fa-key icon-info'></i> <b>$transID</b></h4>
                            Request Date: <h5><i class='fa-solid fa-calendar-days icon-info'></i> <b>$dateapp</b></h5>
                            Assigned to: <h5><i class='fa-solid fa-keyboard icon-info'></i> <b>$assign</b></h5>
                        </td>    
                    </tr>
                    <tr>
                        <td class='py-4 px-5' width='60%'>
                            Course: <h5><i class='fa-solid fa-book-open icon-info'></i> <b>$course ($type)</b></h5>
                            Year Graduate: <h5><i class='fa-solid fa-graduation-cap icon-info'></i> <b>$yeargrad</b></h5>
                        </td>
                        <td class='py-4 px-5' width='40%'>
                            Email Address: <h5><i class='fa-solid fa-envelope icon-info'></i> <b>$email</b></h5>
                            Contact Number: <h5><i class='fa-solid fa-phone icon-info'></i> <b>$contact</b></h5>
                            Facebook: <h5><i class='fa-brands fa-facebook icon-info'></i> <b>$fb</b></h5>
                        </td>
                    </tr>
                        <td class='py-4 px-5' width='60%'>
                            Requested Documents:
                            <ul>";
                            foreach ($result0 as $data0) {
                                echo "<li><h5><b>$data0[quantity] - $data0[itemrequest]</b></h5></li>";
                            }
                        echo "</ul>
                            <hr>
                            Special Instructions:<h5><b>$inst</b></h5>
                        </td>
                        <td class='py-4 px-5' width='40%'>
                            Request Purpose: <h5><b>$reason</b></h5>
                            Date Paid: <h5><b>$paid</b></h5>
                            Date Signed: <h5><b>$signed</b></h5>
                            Date Released: <h5><b>$released</b></h5>
                        </td>
                    </tr>
                </table>
            </div>";
    }

    public function viewInfoSP(){
        echo "Special";
    }
}
?>
