<?php
session_start();

require_once './../../../../class/secretary.php';
 
require_once './../../../../pdoconn/secretaryconfig.php';

require_once './../../../../class/user.php';

require_once './../../../../pdoconn/config.php';

$pdo = new PDO(conStringsecretary, dbUsersecretary, dbPasssecretary); 
$date_time  = date('Y-m-d H:i:s');
$now = date("Y-m-d");
$user_id = $_SESSION['userid'];
$membership_id = $_SESSION['membership_id'];
//$created_by =  $_SESSION['email'];
$activity = "Member Registration";
$summary = "Member Registration Activity Recorded From Device And IP"; 
//$login = filter_input(INPUT_POST, 'submitCreateUser', FILTER_SANITIZE_STRING);

 if(!isset($user_id)){
        header('Location:' . 'r?inv17ml44=logout'); 
 }else
{


 

$firstname = strtoupper( filter_input(INPUT_POST, 'first_name', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS));
$other_name = strtoupper ( filter_input(INPUT_POST, 'other_name', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS));
$tittles = filter_input(INPUT_POST, 'tittles', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);
$dob = filter_input(INPUT_POST, 'dob', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);
$place_of_birth = filter_input(INPUT_POST, 'place_of_birth', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);
$region_of_birth = filter_input(INPUT_POST, 'region_of_birth', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);
$country_of_birth = filter_input(INPUT_POST, 'country_of_birth', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);

$profession = filter_input(INPUT_POST, 'profession', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);
$email_id = filter_input(INPUT_POST, 'email_id', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);

$phone_number = filter_input(INPUT_POST, 'phone_number', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);
$secondary_number = filter_input(INPUT_POST, 'secondary_number', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);

$residential_address = filter_input(INPUT_POST, 'residential_address', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);
$married = filter_input(INPUT_POST, 'married', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);
$titheno = filter_input(INPUT_POST, 'titheno', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);

$WelfareID = filter_input(INPUT_POST, 'WelfareID', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);
$emailLogin = filter_input(INPUT_POST, 'emailLogin', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);

$PasswordLogin = filter_input(INPUT_POST, 'PasswordLogin', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);

$PasswordLoginConfirm = filter_input(INPUT_POST, 'PasswordLoginConfirm', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);



$userType = filter_input(INPUT_POST, 'userType', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);

 

//handling images

// $img_directory = "./member_pictures/";
             
// $fullname = $lastname."".$firstname;
                         
      
// $img_name = $_FILES['file_image']['name'];
// $img_tmp_name = $_FILES['file_image']['tmp_name'];
// $img_size = $_FILES['file_image']['size'];
// $img_type = $_FILES['file_image']['type'];

// $img_name = "$fullname.jpg";

// $blog_img = "groupmis";

// $img_path = $img_directory.$blog_img."_".$img_name;
  
// $img_results = move_uploaded_file($img_tmp_name, $img_path);

// if(!$img_results){
//     echo "Error Uploading";
// }
// if(!get_magic_quotes_gpc()){
//     $img_name = addslashes($img_name);
//     $img_path = addslashes($img_path);
// }



$birth_day = date('d',strtotime($dob));
$sms_format_1 = substr($phone_number, 1);
$sms_format_1 = $country_of_birth.$sms_format_1;

//$hash_pass = $user->password_encrypt($PasswordLogin);

$new_user_id = generate_staff_id();

$client_code = "CLC".md5($new_user_id);

$stmt = $pdo ->prepare('INSERT INTO members(u_id,last_name,first_name,other_name,tittles,dob,birth_day,residence,place_of_birth,region_of_birth,country_of_birth,profession,email_id,phone_number,secondary_number,sms_format_1
,membership_id,tithe_id,welfare_id,date_of_registration,created_by) VALUES 
(:u_id,:last_name,:first_name,:other_name,:tittles,:dob,:birth_day,:residence,:place_of_birth,:region_of_birth,:country_of_birth,:profession,:email_id,:phone_number,:secondary_number,
:sms_format_1,:membership_id,:tithe_id,:welfare_id,:date_of_registration,:created_by)');

 

$stmt ->bindParam(':u_id', $client_code);
//$stmt ->bindParam(':userid', $new_user_id);
$stmt ->bindParam(':last_name', $lastname);
 $stmt ->bindParam(':first_name', $firstname);
 $stmt ->bindParam(':other_name', $other_name);
 $stmt ->bindParam(':tittles', $tittles);
 $stmt ->bindParam(':dob', $dob);
 $stmt ->bindParam(':birth_day', $birth_day);
 $stmt ->bindParam(':residence', $residential_address);
 $stmt ->bindParam(':place_of_birth', $place_of_birth);
 $stmt ->bindParam(':region_of_birth', $region_of_birth);
   $stmt ->bindParam(':country_of_birth', $country_of_birth);
   $stmt ->bindParam(':profession', $profession);
 $stmt ->bindParam(':email_id', $email_id);
$stmt ->bindParam(':phone_number', $phone_number);
$stmt ->bindParam(':secondary_number', $secondary_number);
$stmt ->bindParam(':sms_format_1', $sms_format_1);

$stmt ->bindParam(':membership_id', $membership_id);
$stmt ->bindParam(':tithe_id', $titheno);
$stmt ->bindParam(':welfare_id', $WelfareID); 
 
 $stmt ->bindParam(':date_of_registration', $now);
  $stmt ->bindParam(':created_by', $user_id);



  if($stmt->execute()){

 

 


 $stmtb = $pdo ->prepare('INSERT INTO task_timeliness(u_id,task,summary,date_of_task,datetime_of_task,created_by)VALUES
 (:u_id,:task,:summary,:date_of_task,:datetime_of_task,:created_by)');
$stmtb ->bindParam(':u_id', $_SESSION['userid']);
$stmtb ->bindParam(':task', $activity);
$stmtb ->bindParam(':summary', $summary);
  $stmtb ->bindParam(':date_of_task', $now);
$stmtb ->bindParam(':datetime_of_task', $date_time);
$stmtb ->bindParam(':created_by', $user_id );
$stmtb->execute();

// if($stmt->execute()){
         $url = explode('?', $_SERVER['HTTP_REFERER']);
         header('Location:' . $url[0] . '?m=5');    
  
// } else {
//      $url = explode('?', $_SERVER['HTTP_REFERER']);
//          header('Location:' . $url[0] . '?m=6');    
// }


}

}


function generate_staff_id() {

  //$string = "THstaff";
  //$sql = "SELECT COUNT(userid) FROM tbl_login";
  //$result = mysql_query($sql);
  //$count = mysql_result($result, 0);
  //return $staff_id =  $string . $count;   

  $string = 'MMM';
  //$year = date('y');
  $length = 7;

  $rand = random_code($length);

  //return $rand;
  return $string . $rand;
}


function random_code($length) {
  $rand = 0;
  /* Only select from letters and numbers that are readable - no 0 or O etc.. */
  $characters = "23456789ABCDEFHJKLMNPRTVWXYZ";

  for ($p = 0; $p < $length; $p++) {
      $rand .= $characters[mt_rand(0, strlen($characters) - 1)];
  }

  return $rand;
}


 