<?php
session_start();

require_once './../../class/user.php';
 
require_once './../../pdoconn/config.php';

$pdo = new PDO(conString, dbUser, dbPass); 
$date_time  = date('Y-m-d H:i:s');
$now = date("Y-m-d");
$user_id = $_SESSION['userid'];
$created_by =  $_SESSION['email'];
$login = filter_input(INPUT_POST, 'submitCreateUser', FILTER_SANITIZE_STRING);

 if(!isset($login) && !isset($user_id)){
        header('Location:' . 'r?inv17ml44=logout'); 
 }else
{
$roomnumber = filter_input(INPUT_POST, 'roomnumber', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$roomname = filter_input(INPUT_POST, 'roomname', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS); 

 

$stmt = $pdo ->prepare('INSERT INTO tbl_rooms(u_id,room_no,inter_com_no,created_by,date_created) VALUES (:u_id,:room_no,:inter_com_no,:created_by,:date_created)');

$stmt ->bindParam(':u_id', $user_id);
$stmt ->bindParam(':room_no', strtoupper($roomnumber));
$stmt ->bindParam(':inter_com_no', strtoupper($roomname)); 
$stmt ->bindParam(':created_by', $created_by);
$stmt ->bindParam(':date_created', $now);
$save = $stmt->execute();

if($save){
 
  $url = explode('?', $_SERVER['HTTP_REFERER']);
              header('Location:' . $url[0] . '?m=1');        
} else {
     $url = explode('?', $_SERVER['HTTP_REFERER']);
         header('Location:' . $url[0] . '?m=7');    
}}


 