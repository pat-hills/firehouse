<?php
session_start();

require_once './../../class/secretary.php';
 
require_once './../../pdoconn/secretaryconfig.php';

$pdo = new PDO(conStringsecretary, dbUsersecretary, dbPasssecretary); 
$date_time  = date('Y-m-d H:i:s');
$now = date("Y-m-d");
$user_id = $_SESSION['userid'];
$created_by =  $_SESSION['email'];
$activity = "Guest Edit";
$summary = "Guest Edit Activity Recorded From Device And IP"; 
//$login = filter_input(INPUT_POST, 'submitCreateUser', FILTER_SANITIZE_STRING);

 if(!isset($user_id)){
        header('Location:' . 'r?inv17ml44=logout'); 
 }else
{
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS); 

 
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$id_number = filter_input(INPUT_POST, 'id_number', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$identity_card = filter_input(INPUT_POST, 'identity_card', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$contact = filter_input(INPUT_POST, 'contact', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);

$sms_format_1 = substr($contact, 1);
$sms_format_1 = "233".$sms_format_1;


  
 
  $stmtp = $pdo->prepare("UPDATE customers SET 
  fullname = :fullname,
  contact =:contact,
  email = :email,
  address =:address,
  identity_card = :identity_card,
   id_number =:id_number,
   sms_format = :sms_format 
  
   WHERE id = :member_id ");
  
  $stmtp ->bindParam(':fullname', $fullname,PDO::PARAM_STR);
  $stmtp ->bindParam(':contact', $contact,PDO::PARAM_STR);
  $stmtp ->bindParam(':address', $address,PDO::PARAM_STR);
  $stmtp ->bindParam(':id_number', $id_number,PDO::PARAM_STR);
  $stmtp ->bindParam(':identity_card', $identity_card,PDO::PARAM_STR);
  $stmtp ->bindParam(':sms_format', $sms_format_1,PDO::PARAM_STR);
  $stmtp ->bindParam(':email', $email,PDO::PARAM_STR); 
 $stmtp ->bindParam(':member_id', $id,PDO::PARAM_STR);

  

 $stmtb = $pdo ->prepare('INSERT INTO task_timeliness(u_id,task,summary,date_of_task,datetime_of_task,created_by)VALUES
 (:u_id,:task,:summary,:date_of_task,:datetime_of_task,:created_by)');
$stmtb ->bindParam(':u_id', $_SESSION['userid']);
$stmtb ->bindParam(':task', $activity);
$stmtb ->bindParam(':summary', $summary);
$stmtb ->bindParam(':date_of_task', $now);
$stmtb ->bindParam(':datetime_of_task', $date_time);
$stmtb ->bindParam(':created_by', $_SESSION['email']);
$stmtb->execute();

if($stmtp->execute()){
       // $url = explode('?', $_SERVER['HTTP_REFERER']);
       //  header('Location:' . $url[0] . '?m=5');  
      // href="./pages/r?inv17ml44=add_houses"  
    //  if($secretary->saveMessageac()){
        header('Location:' . 'r?inv17ml44=add_members');    
    //  }
        
  
} else {
     $url = explode('?', $_SERVER['HTTP_REFERER']);
         header('Location:' . $url[0] . '?m=6');    
}}


 