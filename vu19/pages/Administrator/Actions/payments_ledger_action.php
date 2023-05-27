<?php
session_start();

require_once './../../../../class/accountant.php';
require_once './../../../../class/secretary.php';
require_once './../../../../class/SMS.php';
 
require_once './../../../../pdoconn/accountantconfig.php';
require_once './../../../../pdoconn/secretaryconfig.php';
require_once './../../../../pdoconn/constantVariable.php';
require_once './../../../../class/ToWords.php';

$pdo = new PDO(conStringaccountant, dbUseraccountant, dbPassaccountant); 
$date_time  = date('Y-m-d H:i:s');
$now = date("Y-m-d");
$user_id = $_SESSION['userid'];
$membership_id = $_SESSION['membership_id'];
$member_id = $_SESSION['member_id'];
$created_by =  $_SESSION['email'];
$activity = "Member Payment Registration";
$summary = "Member Payment Registration Activity Recorded From Device And IP"; 
//$login = filter_input(INPUT_POST, 'submitCreateUser', FILTER_SANITIZE_STRING);

$now = date("Y-m-d");
$d = date("Y");
$m= date("m");
//$member_id =  $_SESSION['member_id'];
$lastId2stmtbsms_status = "";
$lastId2stmtbsms_statusnot ="";
 
//change_password_finance 


 if(!isset($user_id)){
        header('Location:' . 'r?inv17ml44=logout'); 
 }else
{

  
  $staffNameRecords = $secretary->get_staff_name_by_id_($user_id);

  $fullnamesStaffs = $staffNameRecords['firstName']." ".$staffNameRecords['otherNames'];

  $sum = 0;
         
//  $fullname = filter_input(INPUT_POST, 'amountpadi', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
  $mop = filter_input(INPUT_POST, 'mop', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);
   $AmountReceived = filter_input(INPUT_POST, 'AmountReceived', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);
  $paymenttype = filter_input(INPUT_POST, 'paymenttype', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);
  $sms_format_1 = trim(filter_input(INPUT_POST, 'sms_format_1', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS));
  $email_id = trim(filter_input(INPUT_POST, 'email_id', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS));
  //var_dump($email_id);
  //exit();
  $fullname = trim(filter_input(INPUT_POST, 'fullname', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS));
  $paidby = trim(filter_input(INPUT_POST, 'paidby', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS));
 // $bill_item = $_POST["bill_item"];
 // $amount = $_POST["amount"];
 // $total = count($bill_item);
  $code = $m."00".$d.$accountant->gen_verification_code().$member_id.$m;

 // for ($i = 0; $i < count($_POST["bill_item"]); $i++) {

   // $sum += $amount[$i];
  
    $stmtt = $pdo ->prepare("INSERT INTO fee_payments(member_id,membership_id,amount,bill_item,receipt_no,mode_of_payment,payment_date,time_,paid_by,received_by,user_id)
   VALUES ('$member_id','$membership_id','$AmountReceived','$paymenttype','$code','$mop',NOW(),NOW(),'$paidby','$fullnamesStaffs','$user_id')");
  $payments = $stmtt ->execute();

 // $stmtt = $pdo->query("SELECT LAST_INSERT_ID()");
 // $lastId = $stmtt->fetchColumn();
 
    $stmtb = $pdo ->prepare('INSERT INTO task_timeliness(u_id,task,summary,date_of_task,datetime_of_task,created_by)VALUES
    (:u_id,:task,:summary,:date_of_task,:datetime_of_task,:created_by)');
   $stmtb ->bindParam(':u_id', $_SESSION['userid']);
   $stmtb ->bindParam(':task', $activity);
   $stmtb ->bindParam(':summary', $summary);
     $stmtb ->bindParam(':date_of_task', $now);
   $stmtb ->bindParam(':datetime_of_task', $date_time);
   $stmtb ->bindParam(':created_by', $_SESSION['email'] );
  $task = $stmtb->execute();

  // $stmtbb = $pdo->query("SELECT LAST_INSERT_ID()");
  // $lastId2 = $stmtbb->fetchColumn();

   
//}

// else{
//   $url = explode('?', $_SERVER['HTTP_REFERER']);
//   header('Location:' . $url[0] . '?m=6');    
// }

//}

if($payments && $task){
//  $member_bal =  $accountant -> member_balance();
//  $toWords = new ToWord($sum);
 $sum =  number_format($AmountReceived, 2, '.', ',');
 // $message = trim("Dear ". strtoupper($fullname). ", \n Kindly find acknowledgement of payment of " . $sum ." GHS ". " being part or full payment of " . $paymenttype. " \n Thank you.");
  $message = trim("Dear ". strtoupper($fullname). ", \n\n 
  Your " . $paymenttype. " amount of " . $sum ." GHS ". " is received and appreciated. \n\n 
  Bring ye all the tithes into the storehouse, that there may be meat in mine house, and prove me now herewith, 
  saith the LORD of hosts, if I will not open you the windows of heaven, and pour you out a blessing, 
  that there shall not be room enough to receive it. Mal 3:10. \n\n
  Enjoy God's blessing and favor this month!
   \n\n God bless you!!!.");
 
  //$messageSMS = trim("Dear ". strtoupper($fullname). ", Kindly find acknowledgement of payment of " . $sum ." GHS ". " being part or full payment of " . $paymenttype. ".Thank you.");
 
  // $to_email = 'name @ company . com';
$subject = 'Part or full payment of '.$paymenttype." ";
$headers = 'From:VBCI DUNAMIS SANCTUARY<noreply@vbcidunamis.com>';  
//check if the email address is invalid $secure_check
// $secure_check = sanitize_my_email($email_id)
// if ($secure_check == false) {
//   $url = explode('?', $_SERVER['HTTP_REFERER']);
//    header('Location:' . $url[0] . '?m=6');   
// } else {

  if(IS_ON_PRODUCTION==TRUE){


if(!empty($email_id)){
  $mail =  mail($email_id, $subject, $message, $headers);
}
  
  
  //send email 


 $strUserName = "pat8-dunamis";
 $strPassword = "Rout321@";
 $strMessageType = "0";
 $strDlr = "1";
 $strMobile = $sms_format_1;
 $Sender = "VBCIDUNAMIS";
 
  $url = "http://rslr.connectbind.com" . "/bulksms/bulksms?username=" . $strUserName . "&password=" . $strPassword . "&type=" . $strMessageType . "&dlr=" 
  . $strDlr . "&destination=" . $strMobile . "&source=" . $Sender . "&message=" . $message . "";
  
  
$url = preg_replace("/ /", "%20", $url);
$output = file_get_contents($url);
  
  
     
  
  print_r($output);



    if($mail && $output){
      
     // mail($email_id, $subject, $message, $headers);//x.O&cuR0Ts[.
      $url = explode('?', $_SERVER['HTTP_REFERER']);
      header('Location:' . $url[0] . '?m=5');  
    }
  }else {
    # code...

     $url = explode('?', $_SERVER['HTTP_REFERER']);
  header('Location:' . $url[0] . '?m=5');
  }
   
//}
 
 
}

   

}



function sanitize_my_email($field) {
    $field = filter_var($field, FILTER_SANITIZE_EMAIL);
    if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}




 