<?php
session_start();

require_once './../../class/secretary.php';
 
require_once './../../pdoconn/secretaryconfig.php';

$pdo = new PDO(conStringsecretary, dbUsersecretary, dbPasssecretary); 
$date_time  = date('Y-m-d H:i:s');
$now = date("Y-m-d");
$user_id = $_SESSION['userid'];
$created_by =  $_SESSION['email'];
$activity = "Customer Registration";

//$login = filter_input(INPUT_POST, 'submitCreateUser', FILTER_SANITIZE_STRING);

 if(!isset($user_id)){
        header('Location:' . 'r?inv17ml44=logout'); 
 }else
{


 

$fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$primarycontact = filter_input(INPUT_POST, 'primarycontact', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$idcardno = filter_input(INPUT_POST, 'idcardno', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$cardtype = filter_input(INPUT_POST, 'cardtype', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$residence = filter_input(INPUT_POST, 'residence', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);

$summary = "Customer Registration Activity Recorded Of Name " . " $fullname " ; 
 
 

 
$sms_format_1 = substr($primarycontact, 1);
$sms_format_1 = "233".$sms_format_1;

$stmt = $pdo ->prepare('INSERT INTO customers(u_id,fullname,contact,email,sms_format,address,identity_card,id_number,date_created,created_by) VALUES 
(:u_id,:fullname,:contact,:email,:sms_format,:address,:identity_card,:id_number,:date_created,:created_by)');

 

$stmt ->bindParam(':u_id', $user_id);
$stmt ->bindParam(':fullname', $fullname);
$stmt ->bindParam(':contact', $primarycontact);
$stmt ->bindParam(':email', $email);
$stmt ->bindParam(':sms_format', $sms_format_1);
$stmt ->bindParam(':address', $residence);
$stmt ->bindParam(':identity_card', $cardtype);
$stmt ->bindParam(':id_number', $idcardno); 

$stmt ->bindParam(':date_created', $now);
$stmt ->bindParam(':created_by', $user_id);


 $stmtb = $pdo ->prepare('INSERT INTO task_timeliness(u_id,task,summary,date_of_task,datetime_of_task,created_by)VALUES
 (:u_id,:task,:summary,:date_of_task,:datetime_of_task,:created_by)');
$stmtb ->bindParam(':u_id', $_SESSION['userid']);
$stmtb ->bindParam(':task', $activity);
$stmtb ->bindParam(':summary', $summary);
  $stmtb ->bindParam(':date_of_task', $now);
$stmtb ->bindParam(':datetime_of_task', $date_time);
$stmtb ->bindParam(':created_by', $_SESSION['email'] );
$stmtb->execute();

if($stmt->execute()){
        $url = explode('?', $_SERVER['HTTP_REFERER']);
         header('Location:' . $url[0] . '?m=5');    
  
} else {
     $url = explode('?', $_SERVER['HTTP_REFERER']);
         header('Location:' . $url[0] . '?m=6');    
}}


 