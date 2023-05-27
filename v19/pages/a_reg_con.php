<?php
//session_start();

require_once './../../class/user.php';
 
require_once './../../pdoconn/config.php';

 $pdo = new PDO(conString, dbUser, dbPass);
 $login = filter_input(INPUT_POST, 'submit', FILTER_UNSAFE_RAW);
 if(!isset($login)){
        header('Location:' . './../../index'); 
 }else
{

   /////////////////////////////////

   $date_time_recorded = date('Y-m-d H:i:s');
 

///////////////////////////////////////////////
   $user_type = "Administrator";  
   $now = date("Y-m-d");
   $name_of_church= strtoupper( filter_input(INPUT_POST, 'name_of_church', FILTER_UNSAFE_RAW));
   $location_of_church = filter_input(INPUT_POST, 'location_of_church', FILTER_UNSAFE_RAW);
   $primary_contact_of_church = filter_input(INPUT_POST, 'primary_contact_of_church', FILTER_UNSAFE_RAW);
   $admin_firstname = strtoupper( filter_input(INPUT_POST, 'admin_firstname', FILTER_UNSAFE_RAW));
   $admin_surname = strtoupper( filter_input(INPUT_POST, 'admin_surname', FILTER_UNSAFE_RAW));
   $admin_email = strtolower( filter_input(INPUT_POST, 'admin_email', FILTER_UNSAFE_RAW)); 
   $admin_contact = filter_input(INPUT_POST, 'admin_contact', FILTER_UNSAFE_RAW); 

   $password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
   $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_UNSAFE_RAW);
 //  $contact = filter_input(INPUT_POST, 'contact', FILTER_SANITIZE_STRING);
   $country = filter_input(INPUT_POST, 'country', FILTER_UNSAFE_RAW);

   if($password != $confirm_password){
      $url = explode('?', $_SERVER['HTTP_REFERER']);
      header('Location:' . $url[0] . '?m=5');    
   }elseif(strlen($primary_contact_of_church) != 10){
      $url = explode('?', $_SERVER['HTTP_REFERER']);
      header('Location:' . $url[0] . '?m=6');    
   }
   
   else {

      //tbl_membership
      //tbl_login
      //tbl_staff
      //tbl_institutional_details

$hash_pass = $user->password_encrypt($password);

$user_id = generate_staff_id();

$client_code = "CLC".md5($user_id);
 

$country_of_birth = "233";
$sms_format_1 = substr($admin_contact, 1);
$sms_format_1 = $country_of_birth.$sms_format_1;
 
$stmt = $pdo ->prepare('INSERT INTO tbl_membership(client_code,date_time_created,created_by) VALUES '
            . '(:client_code,:date_time_created,:created_by)');
$stmt ->bindParam(':client_code', $client_code);
$stmt ->bindParam(':date_time_created', $date_time_recorded);
 $stmt ->bindParam(':created_by', $user_id); 


 if($stmt->execute()){

$stmt = $pdo->query("SELECT LAST_INSERT_ID()");
$membership_id = $stmt->fetchColumn();

$stmt_login_details = $pdo ->prepare('INSERT INTO tbl_login(userid,email,pass,user_type,membership_id) VALUES '
. '(:userid,:email,:pass,:user_type,:membership_id)');
$stmt_login_details ->bindParam(':userid', $user_id);
$stmt_login_details ->bindParam(':email', $admin_email);
$stmt_login_details ->bindParam(':pass', $hash_pass);
$stmt_login_details ->bindParam(':user_type', $user_type);
$stmt_login_details ->bindParam(':membership_id', $membership_id);
$stmt_login_details->execute();


//insert into institution details

$stmt_institution_details = $pdo ->prepare('INSERT INTO institution_details(church_name, telephone_1,postal_address,membership_id) VALUES '
. '(:church_name,:telephone_1,:postal_address,:membership_id)');
$stmt_institution_details ->bindParam(':church_name', $name_of_church);
$stmt_institution_details ->bindParam(':telephone_1', $primary_contact_of_church);
$stmt_institution_details ->bindParam(':postal_address', $location_of_church); 
$stmt_institution_details ->bindParam(':membership_id', $membership_id);
$stmt_institution_details->execute();


//insert into tbl_staff

$stmt_tbl_staff = $pdo ->prepare('INSERT INTO tbl_staff(staff_id, firstName,otherNames,email,membership_id) VALUES '
. '(:staff_id,:firstName,:otherNames,:email,:membership_id)');
$stmt_tbl_staff ->bindParam(':staff_id', $user_id);
$stmt_tbl_staff ->bindParam(':firstName', $admin_firstname);
$stmt_tbl_staff ->bindParam(':otherNames', $admin_surname); 
$stmt_tbl_staff ->bindParam(':email', $admin_email); 
$stmt_tbl_staff ->bindParam(':membership_id', $membership_id);
$stmt_tbl_staff->execute();



//insert into members table because they are also members


$stmt_tbl_members = $pdo ->prepare('INSERT INTO members(u_id,userid, first_name,other_name,email_id,phone_number,sms_format_1,membership_id,date_of_registration) VALUES '
. '(:u_id,:userid,:first_name,:other_names,:email_id,:phone_number,:sms_format_1,:membership_id,:date_of_registration)');
$stmt_tbl_members ->bindParam(':u_id', $client_code);
$stmt_tbl_members ->bindParam(':userid', $user_id);
$stmt_tbl_members ->bindParam(':first_name', $admin_firstname);
$stmt_tbl_members ->bindParam(':other_names', $admin_surname); 
$stmt_tbl_members ->bindParam(':email_id', $admin_email);
$stmt_tbl_members ->bindParam(':phone_number', $admin_contact); 
$stmt_tbl_members ->bindParam(':sms_format_1', $sms_format_1);  
$stmt_tbl_members ->bindParam(':membership_id', $membership_id);
$stmt_tbl_members ->bindParam(':date_of_registration', $now);
$stmt_tbl_members->execute();


 



/////

header('Location:' . './../../login');         
   }
   // else{
   //    header('Location:' . 'index');  
   // }


   }


 } 


 function generate_staff_id() {

   //$string = "THstaff";
   //$sql = "SELECT COUNT(userid) FROM tbl_login";
   //$result = mysql_query($sql);
   //$count = mysql_result($result, 0);
   //return $staff_id =  $string . $count;   

   $string = 'THS';
   //$year = date('y');
   $length = 4;

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

 

?>