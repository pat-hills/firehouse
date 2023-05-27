<?php
session_start();

require_once './../../class/accountant.php';
 
require_once './../../pdoconn/accountantconfig.php';



$pdo = new PDO(conStringaccountant, dbUseraccountant, dbPassaccountant); 
$date_time  = date('Y-m-d H:i:s');
$now = date("Y-m-d");
$user_id = $_SESSION['userid'];
$created_by =  $_SESSION['email'];
$activity = "Guest Booking";
//$login = filter_input(INPUT_POST, 'submitCreateUser', FILTER_SANITIZE_STRING);


$member_id =  $_SESSION['member_id'];
 
 





 if(!isset($user_id)){
        header('Location:' . 'r?inv17ml44=logout'); 
 }else
{

  //nights    
  $room_id_array  = $_POST['room'];;
  $nights = filter_input(INPUT_POST, 'nights', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
  $reason = filter_input(INPUT_POST, 'appraisal', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
  $booktype = filter_input(INPUT_POST, 'booktype', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
  $booktype = filter_input(INPUT_POST, 'booktype', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
  $pmt = filter_input(INPUT_POST, 'pmt', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
  $noofhourbook = filter_input(INPUT_POST, 'noofhourbook', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
  $noofhoursmoneycash = filter_input(INPUT_POST, 'noofhoursmoneycash', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
  //var_dump($room_id_array);
  
  //var_dump($room_id_array);
  //exit();

  $c = uniqid (rand (),true);
  $transaction_code = md5($c);

  $receipt_number = mt_rand(100000,999999).date("Y").date("m");

foreach($room_id_array as $room_id) {



  $room_details = $accountant->get_room_detail_by_id_($room_id);




  $summary = "Booking Guest Activity Details"." Guest: "." $member_id"."  Room: " ."$room_id";
  
  if($booktype == "LONG"){

    
  $amount_charge = $nights * $room_details['amount'];

  $nights_or_hours = $nights;

  }else{

    $no_of_hours_charge = $noofhourbook / 3;

    $nights_or_hours = $noofhourbook;
    
  $amount_charge = $noofhoursmoneycash;
  }

 
             //$url = md5($code);
             $stmt = $pdo ->prepare('INSERT INTO tbl_bookings(guest_id,room_id,number_of_days,amount_charged,mop,booking_type,book_date,reasons,u_id,transaction_code,receipt_number) VALUES '
           . ' (:guest_id,:room_id,:number_of_days,:amount_charged,:mop,:booking_type,:book_date,:reasons,:u_id,:transaction_code,:receipt_number)');
     
      $stmt ->bindParam(':guest_id', $member_id);
      $stmt ->bindParam(':room_id', $room_id);
      $stmt ->bindParam(':number_of_days', $nights_or_hours);
      $stmt ->bindParam(':amount_charged', $amount_charge);
      $stmt ->bindParam(':mop', $pmt);
      $stmt ->bindParam(':booking_type', $booktype);
      $stmt ->bindParam(':book_date', $date_time);
      $stmt ->bindParam(':reasons', $reason);
      $stmt ->bindParam(':u_id', $user_id);
      $stmt ->bindParam(':transaction_code', $transaction_code);
      $stmt ->bindParam(':receipt_number', $receipt_number);
      $stmt->execute();
      
   
       

 $stmtb = $pdo ->prepare('INSERT INTO task_timeliness(u_id,task,summary,date_of_task,datetime_of_task,created_by)VALUES
 (:u_id,:task,:summary,:date_of_task,:datetime_of_task,:created_by)');
$stmtb ->bindParam(':u_id', $_SESSION['userid']);
$stmtb ->bindParam(':task', $activity);
$stmtb ->bindParam(':summary', $summary);
  $stmtb ->bindParam(':date_of_task', $now);
$stmtb ->bindParam(':datetime_of_task', $date_time);
$stmtb ->bindParam(':created_by', $_SESSION['email'] );
$stmtb->execute();


$stmtupdateroom = $pdo->prepare("UPDATE tbl_rooms SET status = :roomstatus,last_time_book = :last_time_book  WHERE id = :id ");

$roomstatus = "UNAVAILABLE";
 
  $stmtupdateroom ->bindParam(':roomstatus', $roomstatus,PDO::PARAM_STR);
  $stmtupdateroom ->bindParam(':last_time_book', $date_time,PDO::PARAM_STR);

//$stmtupdateroom ->bindParam(':u_id', $user_id,PDO::PARAM_STR);
$stmtupdateroom ->bindParam(':id', $room_id,PDO::PARAM_STR);
$stmtupdateroom -> execute();


$allsaved = true;



}



if($allsaved){

  // var_dump($room_id_array);
   $url = explode('?', $_SERVER['HTTP_REFERER']);
   header('Location:' . $url[0] . '?m=5');    
 
   //  $accountant->saveMessageac();
   //     echo "<script>window.location='r?inv17ml4=members_payment_list'</script>";
        return true;
   
 } else {
      $url = explode('?', $_SERVER['HTTP_REFERER']);
          header('Location:' . $url[0] . '?m=6');    
 }


 




}
