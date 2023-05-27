<?php
session_start();

require_once './../../class/secretary.php';
 
require_once './../../pdoconn/secretaryconfig.php';

$pdo = new PDO(conStringsecretary, dbUsersecretary, dbPasssecretary); 
$date_time  = date('Y-m-d H:i:s');
$now = date("Y-m-d");
$user_id = $_SESSION['userid'];
$created_by =  $_SESSION['email'];
$activity = "Member Registration";
$summary = "Member Registration Activity Recorded From Device And IP"; 
//$login = filter_input(INPUT_POST, 'submitCreateUser', FILTER_SANITIZE_STRING);

 if(!isset($user_id)){
        header('Location:' . 'r?inv17ml44=logout'); 
 }else
{


 

$firstname = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$lastname = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$place_of_birth = filter_input(INPUT_POST, 'place_of_birth', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$region_of_birth = filter_input(INPUT_POST, 'region_of_birth', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$country_of_birth = filter_input(INPUT_POST, 'country_of_birth', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);

$profession = filter_input(INPUT_POST, 'profession', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$email_id = filter_input(INPUT_POST, 'email_id', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);

$phone_number = filter_input(INPUT_POST, 'phone_number', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$street_name_house_address = filter_input(INPUT_POST, 'street_name_house_address', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$city_house_address = filter_input(INPUT_POST, 'city_house_address', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$region_of_house_address = filter_input(INPUT_POST, 'region_of_house_address', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);

$long_lived_house = filter_input(INPUT_POST, 'long_lived_house', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$house_less_than_3 = filter_input(INPUT_POST, 'house_less_than_3', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$postal_address = filter_input(INPUT_POST, 'postal_address', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$city_postal_address = filter_input(INPUT_POST, 'city_postal_address', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$region_postal_address = filter_input(INPUT_POST, 'region_postal_address', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$married = filter_input(INPUT_POST, 'married', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$married_type = filter_input(INPUT_POST, 'married_type', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$fathers_address = filter_input(INPUT_POST, 'fathers_address', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);

$fathers_contact = filter_input(INPUT_POST, 'fathers_contact', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$fathers_city_address = filter_input(INPUT_POST, 'fathers_city_address', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$fathers_region = filter_input(INPUT_POST, 'fathers_region', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);

$welfare_pin = filter_input(INPUT_POST, 'welfare_pin', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$date_of_initiation = filter_input(INPUT_POST, 'date_of_initiation', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$court_initiation = filter_input(INPUT_POST, 'court_initiation', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$house = filter_input(INPUT_POST, 'house', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$rank = filter_input(INPUT_POST, 'rank', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$lde_status = filter_input(INPUT_POST, 'lde_status', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$prospers_names = filter_input(INPUT_POST, 'prospers_names', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$name_of_parish = filter_input(INPUT_POST, 'name_of_parish', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$place_of_baptism = filter_input(INPUT_POST, 'place_of_baptism', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$fathers_name = filter_input(INPUT_POST, 'fathers_name', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$mothers_address = filter_input(INPUT_POST, 'mothers_address', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$mothers_name = filter_input(INPUT_POST, 'mothers_name', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);

$mothers_contact = filter_input(INPUT_POST, 'mothers_contact', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$mothers_city_address = filter_input(INPUT_POST, 'mothers_city_address', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$mothers_region = filter_input(INPUT_POST, 'mothers_region', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);



$other_name =strtoupper(filter_input(INPUT_POST, 'other_name', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS));
$name_of_spouse = filter_input(INPUT_POST, 'name_of_spouse', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$spouse_number = filter_input(INPUT_POST, 'spouse_number', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$spouse_address = filter_input(INPUT_POST, 'spouse_address', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$spouse_city_address = filter_input(INPUT_POST, 'spouse_city_address', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$spouse_region = filter_input(INPUT_POST, 'spouse_region', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);


$number_of_children = filter_input(INPUT_POST, 'number_of_children', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$names_of_children = filter_input(INPUT_POST, 'names_of_children', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
$tittles = filter_input(INPUT_POST, 'tittles', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);

$secondary_number = filter_input(INPUT_POST, 'secondary_number', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);

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

$stmt = $pdo ->prepare('INSERT INTO members(u_id,last_name,first_name,other_name,tittles,dob,birth_day,place_of_birth,region_of_birth,country_of_birth,profession,email_id,phone_number,secondary_number,sms_format_1
,street_name_house_address,city_house_address,region_of_house_address,long_lived_house,house_less_than_3,postal_address,city_postal_address,region_postal_address,married,married_type,welfare_pin,date_of_initiation,court_initiation,house_name,ranks,lde_status,prospers_names,name_of_parish
,place_of_baptism,fathers_name,fathers_contact,fathers_address,fathers_city_address,fathers_region,mothers_name,mothers_address,mothers_contact,mothers_city_address,mothers_region,name_of_spouse,spouse_number,spouse_address,spouse_city_address,spouse_region,number_of_children,names_of_children,date_of_registration,created_by) VALUES 
(:u_id,:last_name,:first_name,:other_name,:tittles,:dob,:birth_day,:place_of_birth,:region_of_birth,:country_of_birth,:profession,:email_id,:phone_number,:secondary_number,
:sms_format_1,:street_name_house_address,:city_house_address,:region_of_house_address,:long_lived_house,:house_less_than_3,:postal_address,:city_postal_address,:region_postal_address,:married,:married_type,:welfare_pin,:date_of_initiation,:court_initiation,:house,:ranks,:lde_status,:prospers_names,
:name_of_parish,:place_of_baptism,:fathers_name,:fathers_contact,:fathers_address,:fathers_city_address,:fathers_region,:mothers_name,:mothers_address,:mothers_contact,:mothers_city_address,:mothers_region,:name_of_spouse,:spouse_number,:spouse_address,:spouse_city_address,:spouse_region,:number_of_children,:names_of_children,:date_of_registration,:created_by)');

 

$stmt ->bindParam(':u_id', $user_id);
$stmt ->bindParam(':last_name', $lastname);
 $stmt ->bindParam(':first_name', $firstname);
 $stmt ->bindParam(':other_name', $other_name);
 $stmt ->bindParam(':tittles', $tittles);
 $stmt ->bindParam(':dob', $dob);
 $stmt ->bindParam(':birth_day', $birth_day);
 $stmt ->bindParam(':place_of_birth', $place_of_birth);
 $stmt ->bindParam(':region_of_birth', $region_of_birth);
   $stmt ->bindParam(':country_of_birth', $country_of_birth);
   $stmt ->bindParam(':profession', $profession);
 $stmt ->bindParam(':email_id', $email_id);
$stmt ->bindParam(':phone_number', $phone_number);
$stmt ->bindParam(':secondary_number', $secondary_number);
$stmt ->bindParam(':sms_format_1', $sms_format_1);


$stmt ->bindParam(':street_name_house_address', $street_name_house_address);
$stmt ->bindParam(':city_house_address', $city_house_address);
$stmt ->bindParam(':region_of_house_address', $region_of_house_address);
$stmt ->bindParam(':long_lived_house', $long_lived_house);

$stmt ->bindParam(':house_less_than_3', $house_less_than_3);
$stmt ->bindParam(':postal_address', $postal_address);
$stmt ->bindParam(':city_postal_address', $city_postal_address);
$stmt ->bindParam(':region_postal_address', $region_postal_address);
$stmt ->bindParam(':married', $married);
$stmt ->bindParam(':married_type', $married_type);
$stmt ->bindParam(':welfare_pin', $welfare_pin);

$stmt ->bindParam(':date_of_initiation', $date_of_initiation);
$stmt ->bindParam(':court_initiation', $court_initiation);
$stmt ->bindParam(':house', $house);
$stmt ->bindParam(':ranks', $rank);

$stmt ->bindParam(':lde_status', $lde_status);
$stmt ->bindParam(':prospers_names', $prospers_names);
$stmt ->bindParam(':name_of_parish', $name_of_parish);
$stmt ->bindParam(':place_of_baptism', $place_of_baptism);

$stmt ->bindParam(':fathers_name', $fathers_name);
$stmt ->bindParam(':fathers_contact', $fathers_contact);


$stmt ->bindParam(':fathers_address', $fathers_address);

$stmt ->bindParam(':fathers_city_address', $fathers_city_address);
$stmt ->bindParam(':fathers_region', $fathers_region);

$stmt ->bindParam(':mothers_name', $mothers_name);
$stmt ->bindParam(':mothers_address', $mothers_address);
$stmt ->bindParam(':mothers_contact', $mothers_contact);
$stmt ->bindParam(':mothers_city_address', $mothers_city_address);
$stmt ->bindParam(':mothers_region', $mothers_region);
$stmt ->bindParam(':name_of_spouse', $name_of_spouse);
$stmt ->bindParam(':spouse_number', $spouse_number);
$stmt ->bindParam(':spouse_address', $spouse_address);
$stmt ->bindParam(':spouse_city_address', $spouse_city_address);
$stmt ->bindParam(':spouse_region', $spouse_region);
$stmt ->bindParam(':number_of_children', $number_of_children);

$stmt ->bindParam(':names_of_children', $names_of_children);
 $stmt ->bindParam(':date_of_registration', $now);
  $stmt ->bindParam(':created_by', $created_by);


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


 