<?php
session_start();

require_once './../../class/accountant.php';
 
require_once './../../pdoconn/accountantconfig.php';



$pdo = new PDO(conStringaccountant, dbUseraccountant, dbPassaccountant); 
$date_time  = date('Y-m-d H:i:s');
$now = date("Y-m-d");
$user_id = $_SESSION['userid'];
$created_by =  $_SESSION['email'];
$activity = "Guest CheckOut";
//$login = filter_input(INPUT_POST, 'submitCreateUser', FILTER_SANITIZE_STRING);

$now = date("Y-m-d");
$member_id =  $_SESSION['member_id'];
 
 





 if(!isset($user_id)){
        header('Location:' . 'r?inv17ml44=logout'); 
 }else
{

  //nights    
  $room_id = filter_input(INPUT_POST, 'room_id', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
  $booking_id = filter_input(INPUT_POST, 'booking_id', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS); 



  //$room_details = $accountant->get_room_detail_by_id_($room_id);




  $summary = " Guest CheckOut Activity Details"." Guest: "." $member_id"."  Room: " ."$room_id"; 
 
             
   
       

 $stmtb = $pdo ->prepare('INSERT INTO task_timeliness(u_id,task,summary,date_of_task,datetime_of_task,created_by)VALUES
 (:u_id,:task,:summary,:date_of_task,:datetime_of_task,:created_by)');
$stmtb ->bindParam(':u_id', $_SESSION['userid']);
$stmtb ->bindParam(':task', $activity);
$stmtb ->bindParam(':summary', $summary);
  $stmtb ->bindParam(':date_of_task', $now);
$stmtb ->bindParam(':datetime_of_task', $date_time);
$stmtb ->bindParam(':created_by', $_SESSION['email'] );
$stmtb->execute();


$stmtupdateroom = $pdo->prepare("UPDATE tbl_rooms SET status = :roomstatus,last_time_checkout = :last_time_checkout  WHERE id = :id ");

$roomstatus = "AVAILABLE";
//$date_ = null;
 
  $stmtupdateroom ->bindParam(':roomstatus', $roomstatus,PDO::PARAM_STR);
  $stmtupdateroom ->bindParam(':last_time_checkout', $date_time,PDO::PARAM_STR);
 // $stmtupdateroom ->bindParam(':last_time_book', $date_,PDO::PARAM_STR);

//$stmtupdateroom ->bindParam(':u_id', $user_id,PDO::PARAM_STR);
$stmtupdateroom ->bindParam(':id', $room_id,PDO::PARAM_STR);
$stmtupdateroom -> execute();


//UPDATING THE BOOKING TABLE

$stmtupdateBookingCheckout = $pdo->prepare("UPDATE tbl_bookings SET checkout_date = :checkout_date,checkout_status = :checkout_status  WHERE id = :booking_id ");

$checkout_status = "YES";

//$stmtupdateroom ->bindParam(':u_id', $user_id,PDO::PARAM_STR);
$stmtupdateBookingCheckout ->bindParam(':checkout_date', $date_time,PDO::PARAM_STR);
$stmtupdateBookingCheckout ->bindParam(':checkout_status', $checkout_status,PDO::PARAM_STR);
$stmtupdateBookingCheckout ->bindParam(':booking_id', $booking_id,PDO::PARAM_STR);
$stmtupdateBookingCheckout -> execute();



$true = true;



//

if($stmtupdateBookingCheckout -> execute()){
  $url = explode('?', $_SERVER['HTTP_REFERER']);
  header('Location:' . $url[0] . '?m=5');    

  //  $accountant->saveMessageac();
      // echo "<script>window.location='r?inv17ml44=add_members'</script>";
  //     return true;
  
} else {
     $url = explode('?', $_SERVER['HTTP_REFERER']);
         header('Location:' . $url[0] . '?m=6');    
}}


 