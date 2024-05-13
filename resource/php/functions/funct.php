<?php
function CheckSuccess($status){
    if($status =='Success'){
        echo '<div class="alert alert-success alert-dismissible fade show col-12" role="alert">
                <b>Congratulations!</b> You have successfully submitted your request!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
    }
}

function Success(){
    echo '<div class="alert alert-success alert-dismissible fade show col-12" role="alert">
            <b>Congratulations!</b> You have successfully registered a new Student Records Assistant!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    }
function loginError(){
        echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
                <b>Error!</b> Invalid username/Password
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
function curpassError(){
        echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
                <b>Error!</b> Invalid Current Password
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }

function pError($error){
    echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
            <b>Error!</b> '.$error.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    }

function vald(){
     if(input::exists()){
      if(Token::check(Input::get('Token'))){
         if(!empty($_POST['College'])){
             $_POST['College'] = implode(',',input::get('College'));
         }else{
            $_POST['College'] ="";
         }
        $validate = new Validate;
        $validate = $validate->check($_POST,array(
            'username'=>array(
                'required'=>'true',
                'min'=>4,
                'max'=>20,
                'unique'=>'tbl_accounts'
            ),
            'password'=>array(
                'required'=>'true',
                'min'=>6,
            ),
            'ConfirmPassword'=>array(
                'required'=>'true',
                'matches'=>'password'
            ),
            'fullName'=>array(
                'required'=>'true',
                'min'=>2,
                'max'=>50,
            ),
            'email'=>array(
                'required'=>'true'
            ),
            'College'=>array(
                'required'=>'true'
            )));

            if($validate->passed()){
                $user = new user();
                $salt = Hash::salt(32);
                try {
                    $user->create(array(
                        'username'=>input::get('username'),
                        'password'=>Hash::make(input::get('password'),$salt),
                        'salt'=>$salt,
                        'name'=> input::get('fullName'),
                        'joined'=>date('Y-m-d H:i:s'),
                        'groups'=>1,
                        'colleges'=> input::get('College'),
                        'email'=> input::get('email'),
                    ));

                    $user->createC(array(
                        'checker'=> input::get('fullName'),

                    ));
                    $user->createV(array(
                        'verifier'=> input::get('fullName'),
                    ));

                    $user->createR(array(
                        'releasedby'=> input::get('fullName'),

                    ));
                } catch (Exception $e) {
                    die($e->getMessage());
                }

                Success();
            }else{
                foreach ($validate->errors()as $error) {
                pError($error);
                }
            }
        }
            }else{
                return false;
            }
        }

        function logd(){
            if(Input::exists()){
                if(Token::check(Input::get('token'))){
                    $validate = new Validate();
                    $validation = $validate->check($_POST,array(
                        'username' => array('required'=>true),
                        'password'=> array('required'=>true)
                    ));
                    if($validation->passed()){
                        $user = new user();
                        $remember = (Input::get('remember') ==='on') ? true :false;
                        $login = $user->login(Input::get('username'),Input::get('password'),$remember);
                        if($login){
                            if($user->data()->groups == 1){
                                 Redirect::to('ureports.php');
                                echo $user->data()->groups;
                            }else if($user->data()->groups == 2){
                                 Redirect::to('adashboard.php');
                                echo $user->data()->groups;
                            } else if ($user->data()->groups == 3) {
                                Redirect::to('rdashboard.php');
                                echo $user->data()->groups;
                            } else if ($user->data()->groups == 4) {
                                Redirect::to('sreports.php');
                                echo $user->data()->groups;
                            }else{
                                loginError();
                            }
                        }else{
                            loginError();
                        }
                    }else{
                        foreach($validation->errors() as $error){
                            echo $error.'<br />';
                        }
                    }
                }
            }
        }

        function isLogin(){
            $user = new user();
            if(!$user->isLoggedIn()){
                Redirect::to('login.php');
            }
        }

function profilePic(){
    $view = new view();
    if($view->getdpSRA()!=="" || $view->getdpSRA()!==NULL){
        echo "<img class='rounded-circle profpic img-thumbnail ml-3' alt='100x100' src='data:".$view->getMmSRA().";base64,".base64_encode($view->getdpSRA())."'/>";
    }else{
        echo "<img class='rounded-circle profpic img-thumbnail' alt='100x100' src='resource/img/user.jpg'/>";
    }
}

function updateProfile(){
    if(input::exists()){
        if(!empty($_POST['College'])){
            $_POST['College'] = implode(',',input::get('College'));
        }else{
           $_POST['College'] ="";
        }

        $validate = new Validate;
        $validate = $validate->check($_POST,array(
            'username'=>array(
                'required'=>'true',
                'min'=>4,
                'max'=>20,
                'unique'=>'tbl_accounts'
            ),
            'fullName'=>array(
                'required'=>'true',
                'min'=>2,
                'max'=>50,
            ),
            'email'=>array(
                'required'=>'true',
                'min'=>5,
                'max'=>50,
            ),
            'College'=>array(
                'required'=>'true'
            )));

            if($validate->passed()){
                $user = new user();

                try {
                    $user->update(array(
                        'username'=>input::get('username'),
                        'name'=> input::get('fullName'),
                        'colleges'=> input::get('College'),
                        'email'=> input::get('email')
                    ));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
                Redirect::to('template.php');
            }else{
                foreach ($validate->errors()as $error) {
                pError($error);
                }
        }

    }
}

function changeP(){
    if(input::exists()){
        $validate = new Validate;
        $validate = $validate->check($_POST,array(
            'password_current'=>array(
                'required'=>'true',
            ),
            'password'=>array(
                'required'=>'true',
                'min'=>6,
            ),
            'ConfirmPassword'=>array(
                'required'=>'true',
                'matches'=>'password'
            )));

            if($validate->passed()){
                $user = new user();
                if(Hash::make(input::get('password_current'),$user->data()->salt) !== $user->data()->password){
                    curpassError();
                }else{
                    $user = new user();
                    $salt = Hash::salt(32);
                    try {
                        $user->update(array(
                            'password'=>Hash::make(input::get('password'),$salt),
                            'salt'=>$salt
                        ));
                    } catch (Exception $e) {
                        die($e->getMessage());
                    }
                    Redirect::to('template.php');
                }
            }else{
                foreach ($validate->errors()as $error) {
                pError($error);
                }
        }
    }
}

function datevalidation($email)
{
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `tbl_transaction` WHERE `emailaddress`='$email' AND DATE(`dateapp`) = CURRENT_DATE()";
    $data = $con->prepare($sql);
    $data->execute();
    $rows = $data->fetchAll(PDO::FETCH_OBJ);

    if (count($rows) == 0) {
        return true;
    } else {
        return false;
    }
}
function getEmail($transactionID)
{
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `tbl_transaction` WHERE `transactionid` = '$transactionID'";
    $data = $con->prepare($sql);
    $data->execute();
    $rows = $data->fetchAll(PDO::FETCH_ASSOC);
    return $rows[0]['emailaddress'];
    
}
function getEmail2($transactionID)
{
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `tbl_spctransaction` WHERE `transactionid` = '$transactionID'";
    $data = $con->prepare($sql);
    $data->execute();
    $rows = $data->fetchAll(PDO::FETCH_ASSOC);
    return $rows[0]['emailaddress'];
    
}

function kcej_getAssignee($assignee)
{
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `tbl_accounts` WHERE `id` = '$assignee'";
    $data = $con->prepare($sql);
    $data->execute();
    $rows = $data->fetchAll(PDO::FETCH_ASSOC);
    // return $rows[0]['name'];
    if($rows){
        return $rows[0]['name'];
    }else{
        return "";
    }
}

function kcej_getAssigneeEmail($assignee)
{
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `tbl_accounts` WHERE `name` = '$assignee'";
    $data = $con->prepare($sql);
    $data->execute();
    $rows = $data->fetchAll(PDO::FETCH_ASSOC);
    // return $rows[0]['email'];
    if ($rows) {
        return $rows[0]['email'];
    } else {
        return "";
    }
}

function kcej_getTransactionAssignName($transactionID, $type)
{
    $config = new config;
    $con = $config->con();
    if($type == "reg"){
        $sql = "SELECT * FROM `tbl_transaction` WHERE `transactionid` = '$transactionID'";
    }else{
        $sql = "SELECT * FROM `tbl_spctransaction` WHERE `transactionid` = '$transactionID'";
    }
    $data = $con->prepare($sql);
    $data->execute();
    $rows = $data->fetchAll(PDO::FETCH_ASSOC);
    $assignee = $rows[0]['assignee'];
    $assigneeName = kcej_getAssignee($assignee);
    return $assigneeName;
}

function kcej_getTransactionClientName($transactionID, $type)
{
    $config = new config;
    $con = $config->con();
    if($type == "reg"){
        $sql = "SELECT * FROM `tbl_transaction` WHERE `transactionid` = '$transactionID'";
    }else{
        $sql = "SELECT * FROM `tbl_spctransaction` WHERE `transactionid` = '$transactionID'";
    }
    $data = $con->prepare($sql);
    $data->execute();
    $rows = $data->fetchAll(PDO::FETCH_ASSOC);
    
    if ($rows) {
        $clientName = $rows[0]['fullname'];
        return $clientName;
    } else {
        return "";
    }
}

function findAssignee($id)
{
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `tbl_accounts` where `id` = '$id'";
    $data = $con->prepare($sql);
    $data->execute();
    $rows = $data->fetchAll(PDO::FETCH_OBJ);
    if (!empty($rows)) {
        return $rows[0]->name;
    } else {
        return "N/A";
    }
}





function getAssigneeChart()
{
    $config = new config;
    $con = $config->con();
    $sql = "SELECT a.id, COALESCE(SUM(t.points), 0) AS total_points FROM tbl_accounts a LEFT JOIN tbl_transaction t ON a.id = t.assignee AND t.remarks NOT IN ('RELEASED', 'PENDING', 'FOR ASSIGNMENT', 'FOR RELEASE') WHERE (a.groups = 4 OR a.groups = 1) AND a.id NOT IN ('37','33') GROUP BY a.id ORDER BY total_points ASC";
    $data = $con->prepare($sql);
    $data->execute();
    $rows = $data->fetchAll(PDO::FETCH_ASSOC);
    $dataset ="[";
    // Example: const data = [{ assignee: 'John', total_points: 50 }, { assignee: 'Alice', total_points: 30 }];
    foreach($rows as $data){
    $dataset .= "{ assignee: '".findAssignee($data['id'])."', total_points: ".$data['total_points']."},";
    }
    $dataset = rtrim($dataset, ",");
    $dataset.="]";
    return $dataset;
}
function getAssigneeChart2()
{
    $config = new config;
    $con = $config->con();
    $sql = "SELECT A.id, COALESCE(ST.transaction_count, 0) AS transaction_count FROM tbl_accounts A LEFT JOIN ( SELECT assignee, COUNT(*) AS transaction_count FROM tbl_spctransaction WHERE remarks NOT IN ('RELEASED', 'PENDING', 'FOR ASSIGNMENT','FOR RELEASE') GROUP BY assignee ) ST ON A.id = ST.assignee WHERE (A.groups = 4 OR A.groups = 1) AND A.id NOT IN ('37',33) ORDER BY transaction_count ASC";
    $data = $con->prepare($sql);
    $data->execute();
    $rows = $data->fetchAll(PDO::FETCH_ASSOC);
    $dataset ="[";
    // Example: const data = [{ assignee: 'John', total_points: 50 }, { assignee: 'Alice', total_points: 30 }];
    foreach($rows as $data){
    $dataset .= "{ assignee: '".findAssignee($data['id'])."', transaction_count: ".$data['transaction_count']."},";
    }
    $dataset = rtrim($dataset, ",");
    $dataset.="]";
    return $dataset;
}
function getnextAssigneeChartQ()
{
    $config = new config;
    $con = $config->con();
    // $sql = "SELECT a.id, COALESCE(SUM(t.points), 0) AS total_points FROM tbl_accounts a LEFT JOIN tbl_transaction t ON a.id = t.assignee AND t.remarks NOT IN ('RELEASED', 'PENDING', 'FOR ASSIGNMENT', 'FOR RELEASE') WHERE a.groups = 1 GROUP BY a.id ORDER BY total_points ASC";

    $sql = "SELECT a.id, COALESCE(SUM(t.points), 0) AS total_points FROM tbl_accounts a LEFT JOIN tbl_transaction t ON a.id = t.assignee AND t.remarks NOT IN ('RELEASED', 'PENDING', 'FOR ASSIGNMENT', 'FOR RELEASE') WHERE (a.groups = 4 OR a.groups = 1) AND a.id NOT IN ('37','33') GROUP BY a.id ORDER BY total_points ASC";
    //mel and cha are exempted

    $data = $con->prepare($sql);
    $data->execute();
    $rows = $data->fetchAll(PDO::FETCH_ASSOC);
    $assignee = $rows[0]['id'];
    return $assignee;
}
function getnextAssigneeChart2Q()
{
    $config = new config;
    $con = $config->con();
    $sql = "SELECT A.id, COALESCE(ST.transaction_count, 0) AS transaction_count FROM tbl_accounts A LEFT JOIN ( SELECT assignee, COUNT(*) AS transaction_count FROM tbl_spctransaction WHERE remarks NOT IN ('RELEASED', 'PENDING', 'FOR ASSIGNMENT','FOR RELEASE') GROUP BY assignee ) ST ON A.id = ST.assignee WHERE (A.groups = 4 OR A.groups = 1) AND A.id NOT IN ('37','33') ORDER BY transaction_count ASC";
    $data = $con->prepare($sql);
    $data->execute();
    $rows = $data->fetchAll(PDO::FETCH_ASSOC);
    $assignee = $rows[0]['id'];
    return $assignee;
}
function getnextAssigneeChart()
{
    $config = new config;
    $con = $config->con();
    $sql = "SELECT a.id, COALESCE(SUM(t.points), 0) AS total_points FROM tbl_accounts a LEFT JOIN tbl_transaction t ON a.id = t.assignee AND t.remarks NOT IN ('RELEASED', 'PENDING', 'FOR ASSIGNMENT', 'FOR RELEASE') WHERE (a.groups = 4 OR a.groups = 1) AND a.id NOT IN ('37','33') GROUP BY a.id ORDER BY total_points ASC";
    $data = $con->prepare($sql);
    $data->execute();
    $rows = $data->fetchAll(PDO::FETCH_ASSOC);
    $assignee = findAssignee($rows[0]['id']);
    return $assignee;
}
function getnextAssigneeChart2()
{
    $config = new config;
    $con = $config->con();
    $sql = "SELECT A.id, COALESCE(ST.transaction_count, 0) AS transaction_count FROM tbl_accounts A LEFT JOIN ( SELECT assignee, COUNT(*) AS transaction_count FROM tbl_spctransaction WHERE remarks NOT IN ('RELEASED', 'PENDING', 'FOR ASSIGNMENT','FOR RELEASE') GROUP BY assignee ) ST ON A.id = ST.assignee WHERE (A.groups = 4 OR A.groups = 1) AND A.id NOT IN ('37','33') ORDER BY transaction_count ASC";
    $data = $con->prepare($sql);
    $data->execute();
    $rows = $data->fetchAll(PDO::FETCH_ASSOC);
    $assignee = findAssignee($rows[0]['id']);
    return $assignee;
}



function datevalidation2($email)
{
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `tbl_spctransaction` WHERE `emailaddress`='$email' AND DATE(`dateapp`) = CURRENT_DATE()";
    $data = $con->prepare($sql);
    $data->execute();
    $rows = $data->fetchAll(PDO::FETCH_OBJ);

    if (count($rows) == 0) {
        return true;
    } else {
        return false;
    }
}

function CheckError($error)
{
    if ($error == 'MultipleTrans') {
        echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
              <b>Error!</b> Multiple transactions detected. You can only create <b>1 transaction per day only.</b>
              
              
              </button>
          </div>';
    } elseif ($error == 'captchaError') {
        echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
                <b>Error!</b> Incorrect CAPTCHA entry Detected. Please enter the correct captcha numbers below.</b>
                
                
                </button>
            </div>';
    } elseif ($error == 'tamper') {
        echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
                <b>Error!</b> Hi! we are having trouble validating your email address. Please use a different one and make sure to complete all the fields required. Thank you and stay safe!</b>
                
                
                </button>
            </div>';
    } elseif ($error == 'tamper2') {
        echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
                <b>Error!</b> Form tampering detected please make sure to complete all the fields required. Thank you and stay safe!</b>
                
                
                </button>
            </div>';
    }
}

function replaceNWithTilde($inputString)
{
    // Define search and replace arrays
    $search = array('ñ', 'Ñ');
    $replace = array('n', 'N');

    // Replace using arrays
    $outputString = str_replace($search, $replace, $inputString);

    return $outputString;
}

function getRandomPastelColor() {
    // Generate random pastel color
    $hue = rand(0, 360);
    $saturation = rand(70, 100); // 70-100 for pastel
    $lightness = rand(60, 90); // 60-90 for pastel

    return "hsl($hue, $saturation%, $lightness%)";
}

function isRAdmin($user){
    if($user !== '2'){
        header("HTTP/1.1 403 Forbidden");
        exit();
    }else{

    }
}




function isUser($user)
{
    if ($user === '4') {
        header("Location: sdashboard.php");
        exit(); // Stop script execution after sending the header
    } elseif ($user !== '1') {
        header("HTTP/1.1 403 Forbidden");
        exit();
    } else {
        // Additional code for the 'else' condition, if needed
    }

}
function isSPC($user)
{
    if ($user === '1') {
        header("Location: udashboard.php");
        exit(); // Stop script execution after sending the header
    } elseif ($user !== '4') {
        header("HTTP/1.1 403 Forbidden");
        exit();
    } else {
        // Additional code for the 'else' condition, if needed
    }

}

// function isSPC($user){
//     if($user !== '4'){
//         header("HTTP/1.1 403 Forbidden");
//         exit();
//     }else{

//     }
// }

function kcej_isReleasing($user){
    if($user !== '3' && $user !== '2'){
        header("HTTP/1.1 403 Forbidden");
        exit();
    }else{

    }
}

function kcej_vfnotes(){
    $type = $_POST['type'];
    $notes = $_POST['vfnotes'];
    $transID = $_POST['transID'];
    $config = new config;
    $con = $config->con();
    if($type == "reg"){
        $sql = "UPDATE tbl_transaction SET `vfnotes` = '$notes' WHERE `transactionID` = '$transID'";
    }else{
        $sql = "";
    }
    //echo $type."<br>".$notes."<br>".$transID."<br>".$sql;
    $data = $con->prepare($sql);
    if($data->execute()){
        echo"<div class='alert alert-primary' role='alert'>
                Changes Saved.
            </div>";
    }else{
        return false;
    }
}

function kcej_clean($string){
   return nl2br(preg_replace('/[^A-Za-z0-9\-!@:., \'\n\r\/]/', '', $string));
}

function get_current_date(){
    $currentYear = date('Y');
    $currentMonth = date('m');

    // Format the current year and month as "YYYY-MM"
    $formattedDate = $currentYear . '-' . $currentMonth;

    return $formattedDate; // Output: "YYYY-MM"
}
function get_current_date2(){
    $currentYear = date('Y');
    $currentMonth = date('m');

    // Format the current year and month as "YYYY-MM"
    $formattedDate = $currentMonth . '/' . $currentYear;

    return $formattedDate; // Output: "YYYY-MM"
}

 function findCycleTime($sqlCon){ //regular month
      $config = new config;
      $con = $config->con();
      $sql = $sqlCon;
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      $cycletime = $rows[0]->cycletime;

      return $cycletime;
  }

// 1 - ENCODER, 2 - VERIFIER, 3 - RELEASING, 4 - SPECIAL
 ?>
