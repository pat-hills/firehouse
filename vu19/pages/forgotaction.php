<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

require_once './../../class/user.php';
 
require_once './../../pdoconn/config.php';

 $pdo = new PDO(conString, dbUser, dbPass);
 $login = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_STRING);
  $date_time  = date('Y-m-d H:i:s');
   $successs = "YES";
    $date_  = date('Y-m-d');
 if(!isset($login)){
       header("Location:"."../../index");
 }else
{
   $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST, 'pass', FILTER_DEFAULT);
    
     $the_no_string = "NO";
     $activity = "Logged In";
     $summary = "Login Activity Recorded From Device And IP"; 
           // $pdo = $this->pdo;
            $stmt = $pdo->prepare('SELECT * FROM tbl_login WHERE email = :email AND deleted = :n_o');
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':n_o', $the_no_string);
            $stmt->execute();
            $user_data = $stmt->fetch();
           // if($user->password_check($pass,$user_data['pass'])){
            if($user->password_check($pass,$user_data['pass'])){
              $pos = $user_data['user_type'];
             
              $stmtb = $pdo ->prepare('INSERT INTO task_timeliness(u_id,task,summary,date_of_task,datetime_of_task,created_by)VALUES
              (:u_id,:task,:summary,:date_of_task,:datetime_of_task,:created_by)');
           $stmtb ->bindParam(':u_id', $_SESSION['userid']);
            $stmtb ->bindParam(':task', $activity);
         $stmtb ->bindParam(':summary', $summary);
               $stmtb ->bindParam(':date_of_task', $date_);
       $stmtb ->bindParam(':datetime_of_task', $date_time);
             $stmtb ->bindParam(':created_by', $_SESSION['email'] );

                if($pos=="Administrator"){
         $_SESSION['userid'] = $user_data['userid'];
       $_SESSION['user_type'] = $user_data['user_type'];
         $_SESSION['email'] = $user_data['email']; 
         $membership_id = $user_data['membership_id']; 
         $_SESSION['membership_id'] = $membership_id;
         $stmtb->execute();
          header('Location:' . 'r?inv17ml44=admin_dashboard'); 
                }    elseif($pos=="Financial Officer"){
        $_SESSION['userid'] = $user_data['userid'];
       $_SESSION['user_type'] = $user_data['user_type'];
         $_SESSION['email'] = $user_data['email']; 
         $membership_id = $user_data['membership_id']; 
         $_SESSION['membership_id'] = $membership_id;
                  $stmtb->execute();
          header('Location:' . 'r?inv17ml44=finance_dashboard'); 
                } elseif($pos=="Protocol Officer"){
//resident_pastor_dashboard
                  $_SESSION['userid'] = $user_data['userid'];
                  $_SESSION['user_type'] = $user_data['user_type'];
                    $_SESSION['email'] = $user_data['email']; 
                    $membership_id = $user_data['membership_id']; 
                    $_SESSION['membership_id'] = $membership_id;
                  $stmtb->execute();
                     header('Location:' . 'r?inv17ml44=protocol_dashboard'); 
                  
                }elseif($pos=="Resident Pastor"){
                  //resident_pastor_dashboard
                                    $_SESSION['userid'] = $user_data['userid'];
                                    $_SESSION['user_type'] = $user_data['user_type'];
                                      $_SESSION['email'] = $user_data['email']; 
                                      $membership_id = $user_data['membership_id']; 
                                      $_SESSION['membership_id'] = $membership_id;
                                    $stmtb->execute();
                                       header('Location:' . 'r?inv17ml44=resident_pastor_dashboard'); 
                                    
                                  }
                
                else {
                 $url = explode('?', $_SERVER['HTTP_REFERER']);
        header('Location:' . $url[0] . '?a=4');   
                }  
     }else{
        $url = explode('?', $_SERVER['HTTP_REFERER']);
        header('Location:' . $url[0] . '?m=5');
        }
    } 

 