<?php
//require_once 'secretary.php';
//require_once '../pdoconn/secretaryconfig.php';


class accountant {
    
     /** @var object $pdo Copy of PDO connection */
    private $pdo;
    /** @var object of the logged in user */
    private $user;
    /** @var string error msg */
    private $msg;
    /** @var int number of permitted wrong login attemps */
    private $permitedAttemps = 5;
    
    
    
    
  
    public function dbConnect($conString, $user, $pass){
        if(session_status() === PHP_SESSION_ACTIVE){
            try {
                $pdo = new PDO($conString, $user, $pass);
                $this->pdo = $pdo;
                return true;
            }catch(PDOException $e) { 
                $this->msg = 'Connection did not work out!';
                return false;
            }
        }else{
            $this->msg = 'Session did not start.';
            return false;
        }
    }

    public function getUser(){
        return $this->user;
    }


    public function get_root_url(){

     // $root_url = "https://linutekgh.com/associationmis/class/uploads/";
  $root_url = "http://localhost:81/gst/class/uploads/";
    // $root_url = "https://app.knustmarshallan.org/class/uploads/";
      return $root_url;
  }

  //////FIREHOUSE

  public function get_staff_fullname_detail_by_id_($userid){
         
    try {
  
     if(is_null($this->pdo)){
         $this->msg = 'Connection did not work out!';
         return [];
     }else{
         $membership_id = $_SESSION['membership_id'];
        
         $stirngdel = "NO";
         $pdo = $this->pdo;
         $dummy = "(NULL)";
         $stmt = $pdo->prepare('SELECT * FROM tbl_staff WHERE membership_id =:membership_id AND staff_id = :staff_id');
        // $stmt ->bindParam(':u_id', $user_id);
        //  $stmt ->bindParam(':del', $stirngdel);
          $stmt ->bindParam(':staff_id', $userid);
          $stmt ->bindParam(':membership_id', $membership_id);
       //   $stmt ->bindParam(':dummy', $dummy);
         $stmt->execute();
         $result = $stmt->fetch(); 
         return $result; 
     }
     
    } catch (\Throwable $th) {
     echo $th->getTraceAsString();
    }
 
 }

 public function all_payments_offering(){
  try {
    $user_id = $_SESSION['userid'];
       $string_deleted = "NO";
       $member_id =   $_SESSION['member_id'];
       $membership_id =   $_SESSION['membership_id'];
       $user_type =   $_SESSION['user_type'];
     $pdo = $this->pdo;

     if($user_type == "Administrator"|| $user_type=="Resident Pastor"){

      $stmt = $pdo->prepare('SELECT id,bill_item,amount,payment_date,received_by FROM offering_payments WHERE deleted = :N_O_O AND membership_id = :membership_id');

      $stmt ->bindParam(':N_O_O', $string_deleted);
      $stmt ->bindParam(':membership_id', $membership_id);
     // $stmt ->bindParam(':user_id', $user_id);
      $stmt->execute();
     }else{

      $stmt = $pdo->prepare('SELECT id,bill_item,amount,payment_date,received_by FROM offering_payments WHERE deleted = :N_O_O AND membership_id = :membership_id AND user_id = :user_id');

      $stmt ->bindParam(':N_O_O', $string_deleted);
      $stmt ->bindParam(':membership_id', $membership_id);
      $stmt ->bindParam(':user_id', $user_id);
      $stmt->execute();

     }

$data_ = $stmt ->fetchAll();  

foreach ($data_ as $row) { 

  $human_readable = date("F jS, Y", strtotime($row['payment_date']));

echo '<tr>' .
'<td>' .
$human_readable.
'</td>' .
'<td>'.
$row['bill_item'].
'</td>' .
'<td>' . "GH&#x20B5; ".
$row['amount'].
'</td>' .

'<td>' ."".
$row['received_by'].
'</td>' .

//'<td>' . 
//'<a  target=_blank href="pages/print_receipt?id=' . $row['id'] . '">'
//. '<i class="fas fa-print"></i></a>'.'  '.  
//'<a  href="pages/r?id=' . $row['id'] . '&inv17ml44=payments_ledger_edit">'
//      . '<i class=" fas fa-edit"></i></a>'.'  '.
  //      '<a href="pages/r?id=' . $row['id'] . '&inv17ml44=payments_ledger_delete" >'
    //  . '<i class="fas fa-trash"></i></a>'.
//'</td>' .
'</tr>';         
 
}
} catch (Exception $exc) {
      echo $exc->getTraceAsString();
  }}

  public function all_payments_of_member_list(){
    try {
      $user_id = $_SESSION['userid'];
         $string_deleted = "NO";
         $member_id =   $_SESSION['member_id'];
         $membership_id =   $_SESSION['membership_id'];
       $pdo = $this->pdo;
$stmt = $pdo->prepare('SELECT id,member_id,bill_item,amount,payment_date,mode_of_payment,received_by FROM fee_payments WHERE deleted = :N_O_O AND membership_id = :membership_id AND member_id = :member_id');

$stmt ->bindParam(':N_O_O', $string_deleted);
$stmt ->bindParam(':membership_id', $membership_id);
$stmt ->bindParam(':member_id', $member_id);
$stmt->execute();
$data_ = $stmt ->fetchAll();  

foreach ($data_ as $row) {
   $member_id = $row['member_id'];
   $id_detail = $this->get_member_detail_by_id();

   
  // $fullname = $id_detail['first_name'].' '.$id_detail['last_name'];

   $fulname = $id_detail['first_name'].' '.$id_detail['other_name'].' ';
 


  echo '<tr>' .
'<td>' .
$row['payment_date'].
'</td>' .
'<td>'.
$row['bill_item'].
 '</td>' .
 '<td>'.
$row['mode_of_payment'].
 '</td>' .
'<td>' . "GH&#x20B5;".
$row['amount'].
'</td>' .

'<td>' ."".
$row['received_by'].
'</td>' .
 
//'<td>' . 
//'<a  target=_blank href="pages/print_receipt?id=' . $row['id'] . '">'
//. '<i class="fas fa-print"></i></a>'.'  '.  
//'<a  href="pages/r?id=' . $row['id'] . '&inv17ml44=payments_ledger_edit">'
  //      . '<i class=" fas fa-edit"></i></a>'.'  '.
    //      '<a href="pages/r?id=' . $row['id'] . '&inv17ml44=payments_ledger_delete" >'
      //  . '<i class="fas fa-trash"></i></a>'.
//'</td>' .
'</tr>';         
   
}
} catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }}
    

    public function get_member_detail_by_id(){
         
      try {
    
       if(is_null($this->pdo)){
           $this->msg = 'Connection did not work out!';
           return [];
       }else{
           $membership_id = $_SESSION['membership_id'];
           $member_id =   $_SESSION['member_id'];
           $stirngdel = "NO";
           $pdo = $this->pdo;
           $stmt = $pdo->prepare('SELECT *  FROM members WHERE deleted = :del AND member_id =:member_id AND membership_id = :membership_id');
           $stmt ->bindParam(':membership_id', $membership_id);
           $stmt ->bindParam(':del', $stirngdel);
           $stmt ->bindParam(':member_id', $member_id);
           $stmt->execute();
           $result = $stmt->fetch(); 
           return $result; 
       }
       
      } catch (\Throwable $th) {
       echo $th->getTraceAsString();
      }
   
   }

   public function all_payments_today(){
    try {
      $user_id = $_SESSION['userid'];
         $string_deleted = "NO";
       
         $membership_id =   $_SESSION['membership_id'];
         $user_type =   $_SESSION['user_type'];
       $pdo = $this->pdo;
       $booking_today = date("Y-m-d");

if($user_type == "Administrator"|| $user_type=="Resident Pastor"){
  $stmt = $pdo->prepare('SELECT id,member_id,bill_item,amount,payment_date,mode_of_payment,received_by FROM fee_payments WHERE deleted = :N_O_O AND membership_id = :membership_id AND DATE(payment_date) = :payment_date');

  $stmt ->bindParam(':N_O_O', $string_deleted);
  $stmt ->bindParam(':membership_id', $membership_id);
  $stmt ->bindParam(':payment_date', $booking_today);
 // $stmt ->bindParam(':member_id', $member_id);
  $stmt->execute();
}else{
  $stmt = $pdo->prepare('SELECT id,member_id,bill_item,amount,payment_date,mode_of_payment,received_by FROM fee_payments WHERE deleted = :N_O_O AND membership_id = :membership_id AND user_id = :user_id AND DATE(payment_date) = :payment_date');
  $stmt ->bindParam(':N_O_O', $string_deleted);
  $stmt ->bindParam(':membership_id', $membership_id);
  $stmt ->bindParam(':user_id', $user_id);
  $stmt ->bindParam(':payment_date', $booking_today);
  $stmt->execute();
}       


$data_ = $stmt ->fetchAll();  

foreach ($data_ as $row) {
  
  $human_readable = date("F jS, Y", strtotime($row['payment_date']));

  $member_id = $row['member_id'];

  $_SESSION['member_id'] = $member_id;
  $id_detail = $this->get_member_detail_by_id();

   

  $fulname = $id_detail['first_name'].' '.$id_detail['other_name'].' ';


  echo '<tr>' .
'<td>' .$human_readable
.
'</td>' . 
'<td>'.
$fulname.
 '</td>' .
 '<td>'.
$row['bill_item'].
 '</td>' .
 '<td>'.
$row['mode_of_payment'].
 '</td>' .
'<td>' . "GH&#x20B5;".
$row['amount'].
'</td>' .

'<td>' ."".
$row['received_by'].
'</td>' .
'</tr>';         
   
}
} catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }}


    public function metric_sum_payments_today(){
      try {
        $user_id = $_SESSION['userid'];
           $string_deleted = "NO";
         
           $membership_id =   $_SESSION['membership_id'];
           $user_type =   $_SESSION['user_type'];
         $pdo = $this->pdo;
         $now = date("Y-m-d");
  
  if($user_type == "Administrator"|| $user_type=="Resident Pastor"){
  //  $stmt = $pdo->prepare('SELECT SUM(amount_charged) FROM tbl_bookings WHERE DATE(book_date) = :booking_today AND deleted = :NO_');
    $stmt = $pdo->prepare('SELECT SUM(amount) FROM fee_payments WHERE deleted = :N_O_O AND membership_id = :membership_id AND DATE(payment_date) = :payment_date');
  
    $stmt ->bindParam(':N_O_O', $string_deleted);
    $stmt ->bindParam(':membership_id', $membership_id);
    $stmt ->bindParam(':payment_date', $now);
   // $stmt ->bindParam(':member_id', $member_id);
    $stmt->execute(); 
    $result = $stmt->fetch(); 
    return $result['SUM(amount)']; 
  }else{
    $stmt = $pdo->prepare('SELECT SUM(amount) FROM fee_payments WHERE deleted = :N_O_O AND membership_id = :membership_id AND user_id = :user_id AND DATE(payment_date) = :payment_date');
    $stmt ->bindParam(':N_O_O', $string_deleted);
    $stmt ->bindParam(':membership_id', $membership_id);
    $stmt ->bindParam(':user_id', $user_id);
    $stmt ->bindParam(':payment_date', $now);
    $stmt->execute();
    $result = $stmt->fetch(); 
    return $result['SUM(amount)']; 
  }       
  } catch (Exception $exc) {
          echo $exc->getTraceAsString();
      }}


      public function metric_sum_payments_weekly(){
        try {
          $user_id = $_SESSION['userid'];
             $string_deleted = "NO";
           
             $membership_id =   $_SESSION['membership_id'];
             $user_type =   $_SESSION['user_type'];
           $pdo = $this->pdo;
           $now = date("Y-m-d");
    
    if($user_type == "Administrator"|| $user_type=="Resident Pastor"){
    //  $stmt = $pdo->prepare('SELECT SUM(amount_charged) FROM tbl_bookings WHERE DATE(book_date) = :booking_today AND deleted = :NO_');
      $stmt = $pdo->prepare('SELECT SUM(amount) FROM fee_payments WHERE deleted = :N_O_O AND membership_id = :membership_id AND DATE(payment_date) BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE()');
    
      $stmt ->bindParam(':N_O_O', $string_deleted);
      $stmt ->bindParam(':membership_id', $membership_id);
    //  $stmt ->bindParam(':payment_date', $now);
     // $stmt ->bindParam(':member_id', $member_id);
      $stmt->execute(); 
      $result = $stmt->fetch(); 
      return $result['SUM(amount)']; 
    }else{
      $stmt = $pdo->prepare('SELECT SUM(amount) FROM fee_payments WHERE deleted = :N_O_O AND membership_id = :membership_id AND user_id = :user_id AND DATE(payment_date) BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE()');
      $stmt ->bindParam(':N_O_O', $string_deleted);
      $stmt ->bindParam(':membership_id', $membership_id);
      $stmt ->bindParam(':user_id', $user_id);
    //  $stmt ->bindParam(':payment_date', $now);
      $stmt->execute();
      $result = $stmt->fetch(); 
      return $result['SUM(amount)']; 
    }       
    } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }}


        public function metric_sum_payments_monthly(){
          try {
            $user_id = $_SESSION['userid'];
               $string_deleted = "NO";
             
               $membership_id =   $_SESSION['membership_id'];
               $user_type =   $_SESSION['user_type'];
             $pdo = $this->pdo;
             $now = date("Y-m-d");
      
      if($user_type == "Administrator"|| $user_type=="Resident Pastor"){
      //  $stmt = $pdo->prepare('SELECT SUM(amount_charged) FROM tbl_bookings WHERE DATE(book_date) = :booking_today AND deleted = :NO_');
        $stmt = $pdo->prepare('SELECT SUM(amount) FROM fee_payments WHERE deleted = :N_O_O AND membership_id = :membership_id AND MONTH(payment_date) = MONTH(CURDATE()) AND YEAR(payment_date) = YEAR(CURDATE())');
      
        $stmt ->bindParam(':N_O_O', $string_deleted);
        $stmt ->bindParam(':membership_id', $membership_id);
      //  $stmt ->bindParam(':payment_date', $now);
       // $stmt ->bindParam(':member_id', $member_id);
        $stmt->execute(); 
        $result = $stmt->fetch(); 
        return $result['SUM(amount)']; 
      }else{
        $stmt = $pdo->prepare('SELECT SUM(amount) FROM fee_payments WHERE deleted = :N_O_O AND membership_id = :membership_id AND user_id = :user_id AND MONTH(payment_date) = MONTH(CURDATE()) AND YEAR(payment_date) = YEAR(CURDATE())');
        $stmt ->bindParam(':N_O_O', $string_deleted);
        $stmt ->bindParam(':membership_id', $membership_id);
        $stmt ->bindParam(':user_id', $user_id);
      //  $stmt ->bindParam(':payment_date', $now);
        $stmt->execute();
        $result = $stmt->fetch(); 
        return $result['SUM(amount)']; 
      }       
      } catch (Exception $exc) {
              echo $exc->getTraceAsString();
          }}



          public function metric_sum_payments_yearly(){
            try {
              $user_id = $_SESSION['userid'];
                 $string_deleted = "NO";
               
                 $membership_id =   $_SESSION['membership_id'];
                 $user_type =   $_SESSION['user_type'];
               $pdo = $this->pdo;
               $now = date("Y-m-d");
        
        if($user_type == "Administrator"|| $user_type=="Resident Pastor"){
        //  $stmt = $pdo->prepare('SELECT SUM(amount_charged) FROM tbl_bookings WHERE DATE(book_date) = :booking_today AND deleted = :NO_');
          $stmt = $pdo->prepare('SELECT SUM(amount) FROM fee_payments WHERE deleted = :N_O_O AND membership_id = :membership_id AND YEAR(payment_date) = YEAR(CURDATE())');
        
          $stmt ->bindParam(':N_O_O', $string_deleted);
          $stmt ->bindParam(':membership_id', $membership_id);
        //  $stmt ->bindParam(':payment_date', $now);
         // $stmt ->bindParam(':member_id', $member_id);
          $stmt->execute(); 
          $result = $stmt->fetch(); 
          return $result['SUM(amount)']; 
        }else{
          $stmt = $pdo->prepare('SELECT SUM(amount) FROM fee_payments WHERE deleted = :N_O_O AND membership_id = :membership_id AND user_id = :user_id  AND YEAR(payment_date) = YEAR(CURDATE())');
          $stmt ->bindParam(':N_O_O', $string_deleted);
          $stmt ->bindParam(':membership_id', $membership_id);
          $stmt ->bindParam(':user_id', $user_id);
        //  $stmt ->bindParam(':payment_date', $now);
          $stmt->execute();
          $result = $stmt->fetch(); 
          return $result['SUM(amount)']; 
        }       
        } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }}



    public function all_payments_weekly(){
      try {
        $user_id = $_SESSION['userid'];
           $string_deleted = "NO";
         //  $member_id =   $_SESSION['member_id'];
           $membership_id =   $_SESSION['membership_id'];
           $user_type =   $_SESSION['user_type'];
         $pdo = $this->pdo;
         $booking_today = date("Y-m-d");
  
  if($user_type == "Administrator"|| $user_type=="Resident Pastor"){
    $stmt = $pdo->prepare('SELECT id,member_id,bill_item,amount,payment_date,mode_of_payment,received_by FROM fee_payments WHERE deleted = :N_O_O AND membership_id = :membership_id AND DATE(payment_date) BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE()');
  
    $stmt ->bindParam(':N_O_O', $string_deleted);
    $stmt ->bindParam(':membership_id', $membership_id);
  //  $stmt ->bindParam(':payment_date', $booking_today);
   // $stmt ->bindParam(':member_id', $member_id);
    $stmt->execute();
  }else{
    $stmt = $pdo->prepare('SELECT id,member_id,bill_item,amount,payment_date,mode_of_payment,received_by FROM fee_payments WHERE deleted = :N_O_O AND membership_id = :membership_id AND user_id = :user_id AND DATE(payment_date) BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE()');
    $stmt ->bindParam(':N_O_O', $string_deleted);
    $stmt ->bindParam(':membership_id', $membership_id);
    $stmt ->bindParam(':user_id', $user_id);
  //  $stmt ->bindParam(':payment_date', $booking_today);
    $stmt->execute();
  }       
  
  
  $data_ = $stmt ->fetchAll();  
  
  foreach ($data_ as $row) {
    
    $human_readable = date("F jS, Y", strtotime($row['payment_date']));
  
    $member_id = $row['member_id'];

    $_SESSION['member_id'] = $member_id;
    $id_detail = $this->get_member_detail_by_id();
  
     
  
    $fulname = $id_detail['first_name'].' '.$id_detail['other_name'].' ';
  
    echo '<tr>' .
  '<td>' .$human_readable.
  '</td>' .
  '<td>'.
$fulname.
 '</td>' .
  '<td>'.
  $row['bill_item'].
   '</td>' .
   '<td>'.
  $row['mode_of_payment'].
   '</td>' .
  '<td>' . "GH&#x20B5;".
  $row['amount'].
  '</td>' .
  
  '<td>' ."".
  $row['received_by'].
  '</td>' .
  '</tr>';         
     
  }
  } catch (Exception $exc) {
          echo $exc->getTraceAsString();
      }}




  
      public function all_payments_monthly(){
        try {
          $user_id = $_SESSION['userid'];
             $string_deleted = "NO";
           //  $member_id =   $_SESSION['member_id'];
             $membership_id =   $_SESSION['membership_id'];
             $user_type =   $_SESSION['user_type'];
           $pdo = $this->pdo;
           $booking_today = date("Y-m-d");
    
    if($user_type == "Administrator"|| $user_type=="Resident Pastor"){

     // MONTH(date_time) = MONTH(CURDATE()) AND YEAR(date_time) = YEAR(CURDATE())
      $stmt = $pdo->prepare('SELECT id,member_id,bill_item,amount,payment_date,mode_of_payment,received_by FROM fee_payments WHERE deleted = :N_O_O AND membership_id = :membership_id AND MONTH(payment_date) = MONTH(CURDATE()) AND YEAR(payment_date) = YEAR(CURDATE())');
    
      $stmt ->bindParam(':N_O_O', $string_deleted);
      $stmt ->bindParam(':membership_id', $membership_id);
    //  $stmt ->bindParam(':payment_date', $booking_today);
     // $stmt ->bindParam(':member_id', $member_id);
      $stmt->execute();
    }else{
      $stmt = $pdo->prepare('SELECT id,member_id,bill_item,amount,payment_date,mode_of_payment,received_by FROM fee_payments WHERE deleted = :N_O_O AND membership_id = :membership_id AND user_id = :user_id AND MONTH(payment_date) = MONTH(CURDATE()) AND YEAR(payment_date) = YEAR(CURDATE())');
      $stmt ->bindParam(':N_O_O', $string_deleted);
      $stmt ->bindParam(':membership_id', $membership_id);
      $stmt ->bindParam(':user_id', $user_id);
    //  $stmt ->bindParam(':payment_date', $booking_today);
      $stmt->execute();
    }       
    
    
    $data_ = $stmt ->fetchAll();  
    
    foreach ($data_ as $row) {
      
      $human_readable = date("F jS, Y", strtotime($row['payment_date']));
    
      $member_id = $row['member_id'];
  
      $_SESSION['member_id'] = $member_id;
      $id_detail = $this->get_member_detail_by_id();
    
       
    
      $fulname = $id_detail['first_name'].' '.$id_detail['other_name'].' ';
    
      echo '<tr>' .
    '<td>' .$human_readable.
    '</td>' .
    '<td>'.
  $fulname.
   '</td>' .
    '<td>'.
    $row['bill_item'].
     '</td>' .
     '<td>'.
    $row['mode_of_payment'].
     '</td>' .
    '<td>' . "GH&#x20B5;".
    $row['amount'].
    '</td>' .
    
    '<td>' ."".
    $row['received_by'].
    '</td>' .
    '</tr>';         
       
    }
    } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }} 
        
        

        public function all_payments_yearly(){
          try {
            $user_id = $_SESSION['userid'];
               $string_deleted = "NO";
             //  $member_id =   $_SESSION['member_id'];
               $membership_id =   $_SESSION['membership_id'];
               $user_type =   $_SESSION['user_type'];
             $pdo = $this->pdo;
             $booking_today = date("Y-m-d");
      
      if($user_type == "Administrator"|| $user_type=="Resident Pastor"){
  
       // MONTH(date_time) = MONTH(CURDATE()) AND YEAR(date_time) = YEAR(CURDATE())
        $stmt = $pdo->prepare('SELECT id,member_id,bill_item,amount,payment_date,mode_of_payment,received_by FROM fee_payments WHERE deleted = :N_O_O AND membership_id = :membership_id AND YEAR(payment_date) = YEAR(CURDATE())');
      
        $stmt ->bindParam(':N_O_O', $string_deleted);
        $stmt ->bindParam(':membership_id', $membership_id);
      //  $stmt ->bindParam(':payment_date', $booking_today);
       // $stmt ->bindParam(':member_id', $member_id);
        $stmt->execute();
      }else{
        $stmt = $pdo->prepare('SELECT id,member_id,bill_item,amount,payment_date,mode_of_payment,received_by FROM fee_payments WHERE deleted = :N_O_O AND membership_id = :membership_id AND user_id = :user_id AND YEAR(payment_date) = YEAR(CURDATE())');
        $stmt ->bindParam(':N_O_O', $string_deleted);
        $stmt ->bindParam(':membership_id', $membership_id);
        $stmt ->bindParam(':user_id', $user_id);
      //  $stmt ->bindParam(':payment_date', $booking_today);
        $stmt->execute();
      }       
      
      
      $data_ = $stmt ->fetchAll();  
      
      foreach ($data_ as $row) {
        
        $human_readable = date("F jS, Y", strtotime($row['payment_date']));
      
        $member_id = $row['member_id'];
    
        $_SESSION['member_id'] = $member_id;
        $id_detail = $this->get_member_detail_by_id();
      
         
      
        $fulname = $id_detail['first_name'].' '.$id_detail['other_name'].' ';
      
        echo '<tr>' .
      '<td>' .$human_readable.
      '</td>' .
      '<td>'.
    $fulname.
     '</td>' .
      '<td>'.
      $row['bill_item'].
       '</td>' .
       '<td>'.
      $row['mode_of_payment'].
       '</td>' .
      '<td>' . "GH&#x20B5;".
      $row['amount'].
      '</td>' .
      
      '<td>' ."".
      $row['received_by'].
      '</td>' .
      '</tr>';         
         
      }
      } catch (Exception $exc) {
              echo $exc->getTraceAsString();
          }}    



          public function addOffering(){
            try {
                $pdo = $this->pdo;
              //  $secretary = new Secretary();
                $now = date("Y-m-d");
                $d = date("Y");
                $m= date("m");
               // $member_id =  $_SESSION['member_id'];
                $user_id = $_SESSION['userid'];
                $membership_id = $_SESSION['membership_id'];
               // $receivedby = $_SESSION['email'] ;

               // $ProgrammeService = "";
                 
                $amountOffering = filter_input(INPUT_POST, 'amountOffering', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);
               $typeOfOffering = filter_input(INPUT_POST, 'typeOfOffering', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);
               $comments = trim(filter_input(INPUT_POST, 'comments', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS));
               $dateOfRecording = trim(filter_input(INPUT_POST, 'dateOfRecording', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS));
               //var_dump($email_id);
               //exit();
               
   

     $fullnameRecords = $this->get_staff_fullname_detail_by_id_($user_id);

     //var_dump($fullnameRecords);
      //exit();

     $taken_by = $fullnameRecords['firstName']." ".$fullnameRecords['otherNames'];
     
     $stmtt = $pdo ->prepare("INSERT INTO offering_payments(membership_id,amount,bill_item,payment_date,received_by,user_id)
     VALUES ('$membership_id','$amountOffering','$typeOfOffering','$dateOfRecording','$taken_by','$user_id')");
     //$stmtt ->execute();
      
      
              if($stmtt->execute()){
 
                $this->saveMessageac();
               
                return true;
          
            }else{
                $this->msg = 'Recording Failed.';
                return false;
            }   
                 
                 
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            } 
        }

  /////FIREHOUSE

    



  // BOOKINGS


  public function total_guest_weekly_booking(){
         
    try {
  
     if(is_null($this->pdo)){
         $this->msg = 'Connection did not work out!';
         return [];
     }else{
       //  $user_id = $_SESSION['userid'];
         $stirngdel = "NO";
         $pdo = $this->pdo;
         $stmt = $pdo->prepare('SELECT COUNT(id) FROM tbl_bookings WHERE deleted = :del  AND DATE(book_date) BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE()');

      //   $stmt = $pdo->prepare('SELECT id,room_id,number_of_days,amount_charged,book_date,checkout_date,checkout_status FROM tbl_bookings WHERE deleted = :N_O_O
       //  AND u_id = :u_id  AND DATE(book_date) BETWEEN DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND CURDATE()  ORDER BY id DESC');
       
       //  $stmt ->bindParam(':u_id', $user_id);
         $stmt ->bindParam(':del', $stirngdel);
         $stmt->execute();
         $result = $stmt->fetch(); 
         return $result['COUNT(id)']; 
     }
     
    } catch (\Throwable $th) {
     echo $th->getTraceAsString();
    }
 
 }


 public function total_booking_amount_today(){
  try {
      $user_id = $_SESSION['userid'];
      $string_deleted = "NO";
      $booking_today = date("Y-m-d");
  $pdo = $this->pdo;
  $stmt = $pdo->prepare('SELECT SUM(amount_charged) FROM tbl_bookings WHERE DATE(book_date) = :booking_today AND deleted = :NO_');
 // $stmt ->bindParam(':u_id', $user_id);
  $stmt ->bindParam(':NO_', $string_deleted);
  $stmt ->bindParam(':booking_today', $booking_today);
  $stmt->execute();
  $result = $stmt->fetch(); 
  return $result['SUM(amount_charged)']; 
 
  
  } catch (PDOException $exc) {
      echo "ERROR". $exc->getMessage();
  }
  }


  
  public function get_room_detail_by_id($id){
         
    try {
  
     if(is_null($this->pdo)){
         $this->msg = 'Connection did not work out!';
         return [];
     }else{
       //  $user_id = $_SESSION['userid'];
        // $customer_id =  $_SESSION['member_id'];
        // $id =   $this -> get_member_info_by_payment_id();
       
         $stirngdel = "NO";
         $pdo = $this->pdo;
         $stmt = $pdo->prepare('SELECT *  FROM tbl_rooms WHERE id = :id AND deleted = :del ');
         $stmt ->bindParam(':id', $id);
          $stmt ->bindParam(':del', $stirngdel); 
         $stmt->execute();
         $result = $stmt->fetch(); 
         return $result; 
     }
     
    } catch (\Throwable $th) {
     echo $th->getTraceAsString();
    }
  
  }


  

  public function all_registered_guest(){
    try {
    //  $user_id = $_SESSION['userid']; 
         $string_deleted = "NO"; 
       $pdo = $this->pdo; 
$stmt = $pdo->prepare('SELECT * FROM customers WHERE deleted = :N_O_O ORDER BY id DESC');

$stmt ->bindParam(':N_O_O', $string_deleted); 
//$stmt ->bindParam(':u_id', $user_id); 
$stmt->execute();
$data_ = $stmt ->fetchAll();  

foreach ($data_ as $row) {
   $fullname = $row['fullname']; 
   $contact = $row['contact'];

  $address = $row['address'];
 

  echo '<tr>' .
'<td>' .
$fullname.
'</td>' .
'<td>' . 
$contact.
'</td>' .

'<td>' . $address.
'</td>' .
 

'</tr>';         
   
}
} catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }}


  

  public function bookings_last_365_days(){
    try {
    //  $user_id = $_SESSION['userid']; 
         $string_deleted = "NO"; 
       $pdo = $this->pdo; 
$stmt = $pdo->prepare('SELECT id,room_id,number_of_days,amount_charged,booking_type,mop,book_date,checkout_date,checkout_status FROM tbl_bookings WHERE deleted = :N_O_O
   AND DATE(book_date) BETWEEN DATE_SUB(CURDATE(), INTERVAL 360 DAY) AND CURDATE()  ORDER BY book_date DESC');

$stmt ->bindParam(':N_O_O', $string_deleted); 
//$stmt ->bindParam(':u_id', $user_id); 
$stmt->execute();
$data_ = $stmt ->fetchAll();  

foreach ($data_ as $row) {
   $room_id = $row['room_id'];
   $room_detail = $this->get_room_detail_by_id($room_id);
   $room_name = $room_detail['room_no'];

  $amount_charge = $row['amount_charged'];

   $amount_charge =  number_format($amount_charge, 2, '.', ',');

   $booking_type = $row['booking_type'];

   $mop = $row['mop'];


  echo '<tr>' .
'<td>' .
$room_name.
'</td>' .
'<td>' . 
$row['number_of_days'].
'</td>' .

'<td>' . 
date('jS F, Y', strtotime($row['book_date'])) .
'</td>' .

'<td>' . 
$row['checkout_date'] .
 '</td>' .

 '<td>' . 
 $row['checkout_status'] .
  '</td>' .
  '<td>' . 
  $booking_type .
   '</td>' .
   '<td>' . 
   $mop .
    '</td>' .

 '<td>' . 
 $amount_charge.
  '</td>' .

'</tr>';         
   
}
} catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }}




  public function bookings_last_30_days(){
    try {
    //  $user_id = $_SESSION['userid']; 
         $string_deleted = "NO"; 
       $pdo = $this->pdo; 
$stmt = $pdo->prepare('SELECT id,room_id,number_of_days,amount_charged,book_date,checkout_date,checkout_status FROM tbl_bookings WHERE deleted = :N_O_O
   AND DATE(book_date) BETWEEN DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND CURDATE()  ORDER BY id DESC');

$stmt ->bindParam(':N_O_O', $string_deleted); 
//$stmt ->bindParam(':u_id', $user_id); 
$stmt->execute();
$data_ = $stmt ->fetchAll();  

foreach ($data_ as $row) {
   $room_id = $row['room_id'];
   $room_detail = $this->get_room_detail_by_id($room_id);
   $room_name = $room_detail['room_no'];

  $amount_charge = $row['amount_charged'];

   $amount_charge =  number_format($amount_charge, 2, '.', ',');


  echo '<tr>' .
'<td>' .
$room_name.
'</td>' .
'<td>' . 
$row['number_of_days'].
'</td>' .

'<td>' . 
date('jS F, Y', strtotime($row['book_date'])) .
'</td>' .

'<td>' . 
$row['checkout_date'] .
 '</td>' .

 '<td>' . 
 $row['checkout_status'] .
  '</td>' .

 '<td>' . 
 $amount_charge.
  '</td>' .

'</tr>';         
   
}
} catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }}



    public function all_rooms(){
      try {
           $string_deleted = "NO";
           $user_id = $_SESSION['userid'];
      
     $pdo = $this->pdo;
     $stmt = $pdo->prepare('SELECT * FROM tbl_rooms WHERE deleted = :N_O_O');
   //  $stmt ->bindParam(':u_id', $user_id);
     $stmt ->bindParam(':N_O_O', $string_deleted);
     
     $stmt->execute();
    $data_ = $stmt ->fetchAll();
    foreach ($data_ as $row) {
        
        $room_no = $row['room_no'];
        $inter_com_no = $row['inter_com_no'];
        $status = $row['status'];

        $amount_involved = $row['amount'];
        
       
      echo '<tr>' .
    '<td>' .
    $room_no.
    '</td>' .
     '<td>' .
     $inter_com_no .
     '</td>' .
     '<td>' .
     $status .
     '</td>' .
     '<td>' .
     $amount_involved .
     '</td>' . 
     '</tr>';         
        
    }
  
  }
  catch (Exception $exc) {
          echo $exc->getTraceAsString();
      }
  }


    
    
      public function count_bill_items(){
         
       try {
     
        if(is_null($this->pdo)){
            $this->msg = 'Connection did not work out!';
            return [];
        }else{
            $user_id = $_SESSION['userid'];
            $stirngdel = "NO";
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('SELECT COUNT(id) FROM bill_item WHERE u_id = :u_id AND deleted = :del');
            $stmt ->bindParam(':u_id', $user_id);
            $stmt ->bindParam(':del', $stirngdel);
            $stmt->execute();
            $result = $stmt->fetch(); 
            return $result['COUNT(id)']; 
        }
        
       } catch (\Throwable $th) {
        echo $th->getTraceAsString();
       }
    
    }

    public function total_income_expense(){
         
        try {
      
         if(is_null($this->pdo)){
             $this->msg = 'Connection did not work out!';
             return [];
         }else{
             $user_id = $_SESSION['userid'];
             $stirngdel = "NO";
             $pdo = $this->pdo;
           //  $stmt = $pdo->prepare('SELECT SUM(acc_amt) FROM income_exp WHERE u_id =:u_id AND deleted = :del AND YEAR(date_reg) = YEAR(CURDATE())');
             $stmt = $pdo->prepare('SELECT SUM(acc_amt) FROM income_exp WHERE u_id =:u_id AND deleted = :del');
           
             $stmt ->bindParam(':u_id', $user_id);
             $stmt ->bindParam(':del', $stirngdel);
             $stmt->execute();
             $result = $stmt->fetch(); 
             return $result['SUM(acc_amt)']; 
         }
         
        } catch (\Throwable $th) {
         echo $th->getTraceAsString();
        }
     
     }

     public function total_expense(){
         
      try {
    
       if(is_null($this->pdo)){
           $this->msg = 'Connection did not work out!';
           return [];
       }else{
           $user_id = $_SESSION['userid'];
           $stirngdel = "NO";
           $type = "Expense";
           $pdo = $this->pdo;
         //  $stmt = $pdo->prepare('SELECT SUM(acc_amt) FROM income_exp WHERE u_id =:u_id AND YEAR(date_reg) = YEAR(CURDATE()) AND deleted = :del AND acc_type =:acc_type');
           $stmt = $pdo->prepare('SELECT SUM(acc_amt) FROM income_exp WHERE u_id =:u_id AND deleted = :del AND acc_type =:acc_type');
          
           $stmt ->bindParam(':u_id', $user_id);
           $stmt ->bindParam(':del', $stirngdel);
           $stmt ->bindParam(':acc_type', $type);
           $stmt->execute();
           $result = $stmt->fetch(); 
           return $result['SUM(acc_amt)']; 
       }
       
      } catch (\Throwable $th) {
       echo $th->getTraceAsString();
      }
   
   }

   public function total_income(){
         
    try {
  
     if(is_null($this->pdo)){
         $this->msg = 'Connection did not work out!';
         return [];
     }else{
         $user_id = $_SESSION['userid'];
         $stirngdel = "NO";
         $type = "Income";
         $pdo = $this->pdo;
         $stmt = $pdo->prepare('SELECT SUM(acc_amt) FROM income_exp WHERE u_id =:u_id AND deleted = :del AND acc_type =:acc_type');
        // $stmt = $pdo->prepare('SELECT SUM(acc_amt) FROM income_exp WHERE u_id =:u_id AND YEAR(date_reg) = YEAR(CURDATE()) AND deleted = :del AND acc_type =:acc_type');
        
         $stmt ->bindParam(':u_id', $user_id);
         $stmt ->bindParam(':del', $stirngdel);
         $stmt ->bindParam(':acc_type', $type);
         $stmt->execute();
         $result = $stmt->fetch(); 
         return $result['SUM(acc_amt)']; 
     }
     
    } catch (\Throwable $th) {
     echo $th->getTraceAsString();
    }
 
 }

 public function total_payments(){
         
  try {

   if(is_null($this->pdo)){
       $this->msg = 'Connection did not work out!';
       return [];
   }else{
       $user_id = $_SESSION['userid'];
       $stirngdel = "NO";
       $pdo = $this->pdo;
     //  $stmt = $pdo->prepare('SELECT SUM(amount) FROM fee_payments WHERE u_id =:u_id AND YEAR(payment_date) = YEAR(CURDATE()) AND deleted = :del');
       $stmt = $pdo->prepare('SELECT SUM(amount) FROM fee_payments WHERE u_id =:u_id AND deleted = :del');
      
       $stmt ->bindParam(':u_id', $user_id);
       $stmt ->bindParam(':del', $stirngdel);
       $stmt->execute();
       $result = $stmt->fetch(); 
       return $result['SUM(amount)']; 
   }
   
  } catch (\Throwable $th) {
   echo $th->getTraceAsString();
  }

}



public function money_at_bank(){
         
  try {

    $get_balance_paid = ($this->total_withdrawals()) - ($this ->total_deposits());


      

 return $get_balance_paid;  
  } 
   catch (\Throwable $th) {
   echo $th->getTraceAsString();
  }

}

public function total_deposits(){
         
  try {

   if(is_null($this->pdo)){
       $this->msg = 'Connection did not work out!';
       return [];
   }else{
       $user_id = $_SESSION['userid'];
       $stirngdel = "NO";
       $pdo = $this->pdo;
     //  $stmt = $pdo->prepare('SELECT SUM(amount_deposited) FROM bank_deposits WHERE u_id =:u_id AND YEAR(date_time) = YEAR(CURDATE()) AND deleted = :del');
       $stmt = $pdo->prepare('SELECT SUM(amount_deposited) FROM bank_deposits WHERE u_id =:u_id AND deleted = :del');
     
       $stmt ->bindParam(':u_id', $user_id);
       $stmt ->bindParam(':del', $stirngdel);
       $stmt->execute();
       $result = $stmt->fetch(); 
       return $result['SUM(amount_deposited)']; 
   }
   
  } catch (\Throwable $th) {
   echo $th->getTraceAsString();
  }

}

public function total_withdrawals(){
         
  try {

   if(is_null($this->pdo)){
       $this->msg = 'Connection did not work out!';
       return [];
   }else{
       $user_id = $_SESSION['userid'];
       $stirngdel = "NO";
       $pdo = $this->pdo;
       $stmt = $pdo->prepare('SELECT SUM(amount_withdrawn) FROM bank_withdrawals WHERE u_id =:u_id AND deleted = :del');
      // $stmt = $pdo->prepare('SELECT SUM(amount_withdrawn) FROM bank_withdrawals WHERE u_id =:u_id AND YEAR(date_time) = YEAR(CURDATE()) AND deleted = :del');
      
       $stmt ->bindParam(':u_id', $user_id);
       $stmt ->bindParam(':del', $stirngdel);
       $stmt->execute();
       $result = $stmt->fetch(); 
       return $result['SUM(amount_withdrawn)']; 
   }
   
  } catch (\Throwable $th) {
   echo $th->getTraceAsString();
  }

}

public function withdrawals_freq(){
         
  try {

   if(is_null($this->pdo)){
       $this->msg = 'Connection did not work out!';
       return [];
   }else{
       $user_id = $_SESSION['userid'];
       $stirngdel = "NO";
       $pdo = $this->pdo;
      // $stmt = $pdo->prepare('SELECT COUNT(id) FROM bank_withdrawals WHERE u_id =:u_id AND YEAR(date_time) = YEAR(CURDATE()) AND deleted = :del');
       $stmt = $pdo->prepare('SELECT COUNT(id) FROM bank_withdrawals WHERE u_id =:u_id AND deleted = :del');
      
       $stmt ->bindParam(':u_id', $user_id);
       $stmt ->bindParam(':del', $stirngdel);
       $stmt->execute();
       $result = $stmt->fetch(); 
       return $result['COUNT(id)']; 
   }
   
  } catch (\Throwable $th) {
   echo $th->getTraceAsString();
  }

}

public function total_revenue(){
         
  try {

    $total_revenue = $this->total_payments() + $this ->total_income();
    return $total_revenue;
   
  } catch (\Throwable $th) {
   echo $th->getTraceAsString();
  }

}



public function cash_at_hand(){
         
  try {

    $get_balance_paid = (($this->total_revenue()) - ( $this ->total_expense()));
   
  
  return $get_balance_paid;
}
   catch (\Throwable $th) {
   echo $th->getTraceAsString();
  }

}

public function get_bill_detail_by_id(){
         
  try {

   if(is_null($this->pdo)){
       $this->msg = 'Connection did not work out!';
       return [];
   }else{
       $user_id = $_SESSION['userid'];
       $member_id =   $_SESSION['member_id'];
     
       $stirngdel = "NO";
       $pdo = $this->pdo;
       $stmt = $pdo->prepare('SELECT id,bill_name FROM bill_item WHERE u_id = :u_id AND deleted = :del AND id =:member_id');
       $stmt ->bindParam(':u_id', $user_id);
        $stmt ->bindParam(':del', $stirngdel);
        $stmt ->bindParam(':member_id', $member_id);
       $stmt->execute();
       $result = $stmt->fetch(); 
       return $result; 
   }
   
  } catch (\Throwable $th) {
   echo $th->getTraceAsString();
  }

}

public function get_member_bill_detail_by_id(){
         
  try {

   if(is_null($this->pdo)){
       $this->msg = 'Connection did not work out!';
       return [];
   }else{
       $user_id = $_SESSION['userid'];
       $member_id =   $_SESSION['member_id'];
     
       $stirngdel = "NO";
       $pdo = $this->pdo;
       $stmt = $pdo->prepare('SELECT id,bill_item,house_name,amount_involved FROM member_bill WHERE u_id = :u_id AND deleted = :del AND id =:member_id');
       $stmt ->bindParam(':u_id', $user_id);
        $stmt ->bindParam(':del', $stirngdel);
        $stmt ->bindParam(':member_id', $member_id);
       $stmt->execute();
       $result = $stmt->fetch(); 
       return $result; 
   }
   
  } catch (\Throwable $th) {
   echo $th->getTraceAsString();
  }

}

// $_SESSION['member_id'] =$member_id; 


public function get_room_detail_by_id_($id){
         
  try {

   if(is_null($this->pdo)){
       $this->msg = 'Connection did not work out!';
       return [];
   }else{
     //  $user_id = $_SESSION['userid'];
      // $customer_id =  $_SESSION['member_id'];
      // $id =   $this -> get_member_info_by_payment_id();
     
       $stirngdel = "NO";
       $pdo = $this->pdo;
       $stmt = $pdo->prepare('SELECT *  FROM tbl_rooms WHERE id = :id AND deleted = :del ');
       $stmt ->bindParam(':id', $id);
        $stmt ->bindParam(':del', $stirngdel); 
       $stmt->execute();
       $result = $stmt->fetch(); 
       return $result; 
   }
   
  } catch (\Throwable $th) {
   echo $th->getTraceAsString();
  }

}




public function get_member_detail_by_id_(){
         
  try {

   if(is_null($this->pdo)){
       $this->msg = 'Connection did not work out!';
       return [];
   }else{
       $user_id = $_SESSION['userid'];
       $customer_id =  $_SESSION['guest_id_checkout'];
      // $id =   $this -> get_member_info_by_payment_id();
     
       $stirngdel = "NO";
       $pdo = $this->pdo;
       $stmt = $pdo->prepare('SELECT *  FROM customers WHERE id = :id AND deleted = :del ');
       $stmt ->bindParam(':id', $customer_id);
        $stmt ->bindParam(':del', $stirngdel); 
       $stmt->execute();
       $result = $stmt->fetch(); 
       return $result; 
   }
   
  } catch (\Throwable $th) {
   echo $th->getTraceAsString();
  }

}


public function get_member_info_by_payment_id(){
         
  try {

   if(is_null($this->pdo)){
       $this->msg = 'Connection did not work out!';
       return [];
   }else{
       $user_id = $_SESSION['userid'];
       $member_id =   $_SESSION['member_id'];
     
       $stirngdel = "NO";
       $pdo = $this->pdo;
       $stmt = $pdo->prepare('SELECT member_id FROM fee_payments WHERE u_id = :u_id AND deleted = :del AND id =:member_id');
       $stmt ->bindParam(':u_id', $user_id);
        $stmt ->bindParam(':del', $stirngdel);
        $stmt ->bindParam(':member_id', $member_id);
       $stmt->execute();
       $result = $stmt->fetch(); 
       return $result['member_id']; 
   }
   
  } catch (\Throwable $th) {
   echo $th->getTraceAsString();
  }

}

public function get_details_of_payment_id(){
         
  try {

   if(is_null($this->pdo)){
       $this->msg = 'Connection did not work out!';
       return [];
   }else{
       $user_id = $_SESSION['userid'];
       $member_id =   $_SESSION['member_id'];
     
       $stirngdel = "NO";
       $pdo = $this->pdo;
       $stmt = $pdo->prepare('SELECT id,amount,mode_of_payment,paid_by,mode_of_payment_number FROM fee_payments WHERE u_id = :u_id AND deleted = :del AND id =:member_id');
       $stmt ->bindParam(':u_id', $user_id);
        $stmt ->bindParam(':del', $stirngdel);
        $stmt ->bindParam(':member_id', $member_id);
       $stmt->execute();
       $result = $stmt->fetch(); 
       return $result; 
   }
   
  } catch (\Throwable $th) {
   echo $th->getTraceAsString();
  }

}


    
   public function allbillitems(){
    try {
         $string_deleted = "NO";
         $user_id = $_SESSION['userid'];
    
   $pdo = $this->pdo;
   $stmt = $pdo->prepare('SELECT id,bill_name,date_registered FROM bill_item WHERE u_id = :u_id AND deleted = :N_O_O');
   $stmt ->bindParam(':u_id', $user_id);
   $stmt ->bindParam(':N_O_O', $string_deleted);
   
   $stmt->execute();
  $data_ = $stmt ->fetchAll();
  foreach ($data_ as $row) {
      
      $bill_name = $row['bill_name'];
      $date_registered = $row['date_registered'];
    
      
     
    echo '<tr>' .
  '<td>' .
  $bill_name.
  '</td>' .
   '<td>' .
   $date_registered .
   '</td>' .
   '<td>'.
   '<a  href="pages/r?id=' . $row['id'] . '&inv17ml44=add_bill_items_edit" >'
           . '<i class=" fas fa-edit"></i></a>'.'  '.
             '<a href="pages/r?id=' . $row['id'] . '&inv17ml44=add_bill_items_delete" >'
           . '<i class="fas fa-trash"></i></a>'.
   '</td>' .
   '</tr>';         
      
  }

}
catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}


public function allbillpreparations(){
    try {
         $string_deleted = "NO";
         $user_id = $_SESSION['userid'];
    
   $pdo = $this->pdo;
   $stmt = $pdo->prepare('SELECT id,bill_item,house_name,amount_involved FROM member_bill WHERE u_id = :u_id AND deleted = :N_O_O');
   $stmt ->bindParam(':u_id', $user_id);
   $stmt ->bindParam(':N_O_O', $string_deleted);
   
   $stmt->execute();
  $data_ = $stmt ->fetchAll();
  foreach ($data_ as $row) {
      
      $bill_name = $row['bill_item'];
      $house_name = $row['house_name'];
      $amount_involved = $row['amount_involved'];
      
     
    echo '<tr>' .
  '<td>' .
  $bill_name.
  '</td>' .
   '<td>' .
   $house_name .
   '</td>' .
   '<td>' .
   $amount_involved .
   '</td>' .
   '<td>'.
   '<a  href="pages/r?id=' . $row['id'] . '&inv17ml44=add_bill_prep_edit" >'
           . '<i class=" fas fa-edit"></i></a>'.'  '.
             '<a href="pages/r?id=' . $row['id'] . '&inv17ml44=add_bill_prep_delete" >'
           . '<i class="fas fa-trash"></i></a>'.
   '</td>' .
   '</tr>';         
      
  }

}
catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}



public function g_grp_amount($grp,$bill_item){
    try {
          $string_deleted = "NO";
          $user_id = $_SESSION['userid'];
     $pdo = $this->pdo;
   $stmt = $pdo->prepare('SELECT amount_involved,bill_item FROM member_bill WHERE house_name = :chr_grp AND bill_item = :bill_item  AND deleted = :N_O_O AND u_id =:u_id AND YEAR(date_recorded) = YEAR(CURDATE())'); 
    $stmt ->bindValue(':N_O_O', $string_deleted);
$stmt ->bindValue(':chr_grp', $grp);
$stmt ->bindValue(':bill_item', $bill_item);
$stmt ->bindValue(':u_id', $user_id);

$stmt ->execute();
$results = $stmt->fetch();

return $results;
 } catch (Exception $exc) {
        echo $exc->getTraceAsString();}
 }



 public function get_bill_items_in_ledger_general(){
  try {
        $string_deleted = "NO";
        $category = "GENERAL";
        $user_id = $_SESSION['userid'];
   $pdo = $this->pdo;
 $stmt = $pdo->prepare('SELECT DISTINCT(bill_item) FROM member_ledger WHERE category = :general AND deleted = :N_O_O AND u_id =:u_id AND YEAR(date_recorded) = YEAR(CURDATE())'); 
 $stmt ->bindValue(':general', $category);
 $stmt ->bindValue(':N_O_O', $string_deleted);
$stmt ->bindValue(':u_id', $user_id);
$stmt ->execute();
$results = $stmt->fetchAll();
return $results;

} catch (Exception $exc) {
      echo $exc->getTraceAsString();}
}



public function get_bill_items_in_ledger_individual(){
  try {
        $string_deleted = "NO";
        $user_id = $_SESSION['userid'];
        $member_id =  $_SESSION['member_id'];
        $category = "INDIVIDUAL";  
   $pdo = $this->pdo;
 $stmt = $pdo->prepare('SELECT DISTINCT(bill_item) FROM member_ledger WHERE member_id =:member_id AND category = :individual AND 
  deleted = :N_O_O AND u_id =:u_id AND YEAR(date_recorded) = YEAR(CURDATE())');

$stmt ->bindValue(':member_id', $member_id);
 $stmt ->bindValue(':individual', $category);
  $stmt ->bindValue(':N_O_O', $string_deleted);
$stmt ->bindValue(':u_id', $user_id);
$stmt ->execute();
$results = $stmt->fetchAll();
return $results;

} catch (Exception $exc) {
      echo $exc->getTraceAsString();}
}



        public function l_m_b_g(){
            try {


                 $string_deleted = "NO";
                 $user_id = $_SESSION['userid'];
            $billee = filter_input(INPUT_POST, 'house_name', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
            $data_explosion = explode("_",$billee);
            $group = $data_explosion[0];
          //  echo($group);
            $bill_item = $data_explosion[1];
          //  $_SESSION['grp'] = $billee;

          if($group=="ALL-MEMBERS"){
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('SELECT * FROM members WHERE deleted = :N_O_O AND u_id =:u_id');
           
            $stmt ->bindValue(':N_O_O', $string_deleted);
           // $stmt ->bindValue(':chr_grp', $billee);
            $stmt ->bindValue(':u_id', $user_id);
            $stmt->execute();
           $data_ = $stmt ->fetchAll();
          
           $ldg_amtdetails =  $this->g_grp_amount($group,$bill_item);
           $ldg_amt = $ldg_amtdetails['amount_involved'];
           $bill_item_ledger = $ldg_amtdetails['bill_item'];
           foreach ($data_ as $row) {
               
             //  $full = $row['first_name'];

             
    $fulname = $row['first_name'].' '.$row['other_name'].' '.$row['last_name'];
    $ranks = $row['ranks'];
    $tittles = $row['tittles'];
    if($tittles){
        $formatted = $ranks." "."(".$tittles.")"." ".$fulname;
    }else{
        $formatted = $ranks." ".$fulname;
    }

             //  $chr_grp = $row['house_name'];
          //   $chr_grp = $billee;
             echo '<tr>' .
            '<td>' .
            $row['member_id'].
                "<input type=hidden value=$row[member_id] name=member_id[] />".
                "<input type=hidden value=$ldg_amt name=amount[] />".
                "<input type=hidden value=$group name=ch[] />".
                "<input type=hidden value=$bill_item_ledger name=bill_item[] />".
            '</td>' .
            '<td>' .
            $formatted .
            '</td>' .
          
           '<td>' .
           $group .
            '</td>' .
            '<td>' .
           $ldg_amt.
            '</td>' .
            '<td>' .
            $bill_item_ledger.
             '</td>' .
            '</tr>';         
               
           }
          }else{
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('SELECT first_name,house_name,member_id FROM members WHERE house_name = :chr_grp AND deleted = :N_O_O AND u_id =:u_id');
           
            $stmt ->bindValue(':N_O_O', $string_deleted);
            $stmt ->bindValue(':chr_grp', $group);
            $stmt ->bindValue(':u_id', $user_id);
            $stmt->execute();
           $data_ = $stmt ->fetchAll();
           $ldg_amtdetails =  $this->g_grp_amount($group,$bill_item);
           $ldg_amt = $ldg_amtdetails['amount_involved'];
           $bill_item_ledger = $ldg_amtdetails['bill_item'];
           foreach ($data_ as $row) {
               
               $full = $row['first_name'];
               $chr_grp = $row['house_name'];
             echo '<tr>' .
            '<td>' .
            $row['member_id'].
                "<input type=hidden value=$row[member_id] name=member_id[] />".
                "<input type=hidden value=$ldg_amt name=amount[] />".
                "<input type=hidden value=$chr_grp name=ch[] />".
                "<input type=hidden value=$bill_item_ledger name=bill_item[] />".
            '</td>' .
            '<td>' .
            $full .
            '</td>' .
          
           '<td>' .
           $chr_grp .
            '</td>' .
            '<td>' .
           $ldg_amt.
            '</td>' .
            '<td>' .
            $bill_item_ledger.
             '</td>' .
            '</tr>';         
               
           }
          }

         
                
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
             }



public function in_srt_led(){
              
               $member_id = $_POST["member_id"];
                $ch = $_POST["ch"];
                $bill_item = $_POST["bill_item"];
                $user_id = $_SESSION['userid'];
        $ledger_amount = $_POST["amount"];
         $total = count($member_id);
         
         for ($i = 0; $i < $total; $i++) {
        $now_now = date("Y-m-d");
         $pdo = $this->pdo;
        $stmt = $pdo->prepare("DELETE FROM member_ledger WHERE member_id = '$member_id[$i]' AND house_name = '$ch[$i]' AND bill_item = '$bill_item[$i]' AND u_id = '$user_id' AND deleted = 'NO' AND YEAR(date_recorded) = YEAR(CURDATE()) LIMIT 1");
       $stmt->execute();
    $stmtt = $pdo ->prepare("INSERT INTO member_ledger(u_id,bill_item,member_id,date_recorded,date_of_billing,fee_amount,house_name) VALUES ('$user_id','$bill_item[$i]','$member_id[$i]',NOW(),NOW(),'$ledger_amount[$i]','$ch[$i]')");
      $stmtt ->execute();
        
        }
     $this->saveMessageac();
         
          }


          public function in_srt_led_individual(){
            $created_by =  $_SESSION['email'];    
           // $member_id = $_POST["member_id"];
           $member_id =  $_SESSION['member_id'];
             $accc = $_POST["accc"];

           //  print("$accc");

             $bill_item = $_POST["bill_item"];
             $user_id = $_SESSION['userid'];
     $ledger_amount = $_POST["amount"];
     $category ="INDIVIDUAL";
      $total = count($bill_item);
 if($accc=="Debit"){
        for ($i = 0; $i < $total; $i++) {
          $now_now = date("Y-m-d");
           $pdo = $this->pdo;
       //   $stmt = $pdo->prepare("DELETE FROM member_ledger WHERE member_id = '$member_id' AND bill_item = '$bill_item[$i]' AND u_id = '$user_id' AND deleted = 'NO' AND YEAR(date_recorded) = YEAR(CURDATE()) LIMIT 1");
       ///  $stmt->execute();
      $stmtt = $pdo ->prepare("INSERT INTO member_ledger(u_id,bill_item,member_id,date_recorded,date_of_billing,fee_amount,category) VALUES ('$user_id','$bill_item[$i]','$member_id',NOW(),NOW(),'$ledger_amount[$i]','$category')");
        $stmtt ->execute();
          
          }
      }elseif($accc=="Credit"){

  //       $created_by =  $_SESSION['email'];    
     
  //       $member_id =  $_SESSION['member_id'];
  //         $accc = $_POST["accc"];
  //         $bill_item = $_POST["bill_item"];
  //         $user_id = $_SESSION['userid'];
  // $ledger_amount = $_POST["amount"];
  // $category ="INDIVIDUAL";
  //  $total = count($bill_item);




        $id_detail = $this->get_member_detail_by_id($member_id);
        $fullname = $id_detail['first_name'].' '.$id_detail['last_name'];
     
        for ($i = 0; $i < $total; $i++) {
        $code = $this->gen_verification_code().$member_id."IND";
        $mop = "CASH";
        $pdo = $this->pdo;
        $stmttpp = $pdo ->prepare("INSERT INTO fee_payments(member_id,u_id,amount,bill_item,receipt_no,mode_of_payment,payment_date,time_,paid_by,received_by)
        VALUES ('$member_id','$user_id','$ledger_amount[$i]','$bill_item[$i]','$code','$mop',NOW(),NOW(),'$fullname','$created_by')");
       $stmttpp ->execute();

        }
    
      }
      
     
  $this->saveMessageac();
      
       }


          public function saveMessageac(){
            echo  '<div>';
         echo  '<div class="alert alert-info">';
         echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
          echo '<strong><i class="icon-user icon-large"></i>&nbsp;Action Completed Sucessfully</strong>';
            echo'</div>';
             echo'</div>';
      }


public function allaccountypes(){
    try {
         $string_deleted = "NO";
         $user_id = $_SESSION['userid'];
    
   $pdo = $this->pdo;
   $stmt = $pdo->prepare('SELECT id,account_type,acc_name FROM account_items WHERE u_id = :u_id AND deleted = :N_O_O');
   $stmt ->bindParam(':u_id', $user_id);
   $stmt ->bindParam(':N_O_O', $string_deleted);
   
   $stmt->execute();
  $data_ = $stmt ->fetchAll();
  foreach ($data_ as $row) {
      
      $account_name = $row['acc_name'];
      $account_type = $row['account_type'];
    
      
     
    echo '<tr>' .
  '<td>' .
  $account_name.
  '</td>' .
   '<td>' .
   $account_type .
   '</td>' .
   '<td>'.

   '<a  href="pages/r?id=' . $row['id'] . '&inv17ml44=add_incomeexpedit" >'
           . '<i class=" fas fa-edit"></i></a>'.'  '.
             '<a href="pages/r?id=' . $row['id'] . '&inv17ml44=add_incomeexpeditdel" >'
           . '<i class="fas fa-trash"></i></a>'.
   '</td>' .
   '</tr>';         
      
  }

}
catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}


public function all_ledger_of_member($member_id){
  try {
       $string_deleted = "NO";
       $user_id = $_SESSION['userid'];
        $pdo = $this->pdo;
      $stmt = $pdo->prepare('SELECT SUM(fee_amount) FROM member_ledger WHERE member_id = :chr_grp AND u_id = :u_id '
           . 'AND deleted = :N_O_O'); 
      //$stmt = $pdo->prepare('SELECT SUM(fee_amount) FROM member_ledger WHERE member_id = :chr_grp AND u_id = :u_id '
      //     . 'AND deleted = :N_O_O AND YEAR(date_recorded) = YEAR(CURDATE())'); 
       $stmt ->bindValue(':N_O_O', $string_deleted);
   $stmt ->bindValue(':chr_grp', $member_id);
   $stmt ->bindValue(':u_id', $user_id);
   
   
   $stmt ->execute();
   $results = $stmt->fetch();
   
   return $results['SUM(fee_amount)'];
    
       } catch (Exception $exc) {
           echo $exc->getTraceAsString();
       }
   }
   
   public function all_payments_of_member($member_id){
  try {
             $string_deleted = "NO";
             $user_id = $_SESSION['userid'];
        $pdo = $this->pdo;
      $stmt = $pdo->prepare('SELECT SUM(amount) FROM fee_payments WHERE member_id = :chr_grp AND u_id = :u_id '
           . 'AND deleted = :N_O_O'); 

     // $stmt = $pdo->prepare('SELECT SUM(amount) FROM fee_payments WHERE member_id = :chr_grp AND u_id = :u_id '
      //  . 'AND deleted = :N_O_O AND YEAR(payment_date) = YEAR(CURDATE())'); 
       $stmt ->bindValue(':N_O_O', $string_deleted);
   $stmt ->bindValue(':chr_grp', $member_id);
   $stmt ->bindValue(':u_id', $user_id);
   
   $stmt ->execute();
   $results = $stmt->fetch();
   
   return $results['SUM(amount)'];
    
       } catch (Exception $exc) {
           echo $exc->getTraceAsString();
       }
   }


   public function member_balance(){
    try {
      $user_id = $_SESSION['userid'];
      $member_id =   $_SESSION['member_id'];
         $string_deleted = "NO";
       $pdo = $this->pdo;
$stmt = $pdo->prepare('SELECT member_id,first_name,last_name FROM members WHERE deleted = :N_O_O AND u_id = :u_id AND member_id =:member_id');

$stmt ->bindParam(':N_O_O', $string_deleted);
$stmt ->bindParam(':u_id', $user_id);
$stmt ->bindParam(':member_id', $member_id);
$stmt->execute();
$data_ = $stmt ->fetch();  

 
   $member_id = $data_['member_id'];
   $cur_led = $this->all_ledger_of_member($member_id);
   $cur_pay = $this->all_payments_of_member($member_id);
 //  $sum =  number_format($sum, 2, '.', ',');
   $get_balance_paid = $cur_led - $cur_pay;
   $get_balance_paid =  number_format($get_balance_paid, 2, '.', ',');
if($get_balance_paid){
         if($get_balance_paid==0){
     $get_balance_paid =   $get_balance_paid." -"."";
       }elseif ($get_balance_paid<0) {
    $get_balance_paid = str_replace("-", "", $get_balance_paid) . " GHS CREDIT";
      }  else {

    $get_balance_paid = $get_balance_paid." GHS  DEBIT";

    return $get_balance_paid;

       }
     }       
   

} catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }}





   public function debtors_creditors(){
            try {
              $user_id = $_SESSION['userid'];
                 $string_deleted = "NO";
               $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT * FROM members WHERE deleted = :N_O_O AND u_id = :u_id');
       
        $stmt ->bindParam(':N_O_O', $string_deleted);
        $stmt ->bindParam(':u_id', $user_id);
        $stmt->execute();
       $data_ = $stmt ->fetchAll();  
       
       foreach ($data_ as $row) {
           $member_id = $row['member_id'];
          $fulname = $row['first_name'].' '.$row['other_name'].' '.$row['last_name'];
    $ranks = $row['ranks'];
    $tittles = $row['tittles'];
    if($tittles){
        $formatted = $ranks." "."(".$tittles.")"." ".$fulname;
    }else{
        $formatted = $ranks." ".$fulname;
    }
           $cur_led = $this->all_ledger_of_member($member_id);
           $cur_pay = $this->all_payments_of_member($member_id);
           $get_balance_paid = $cur_led - $cur_pay;
     if($get_balance_paid){
                 if($get_balance_paid==0){
             $get_balance_paid =   $get_balance_paid." -"."";
               }elseif ($get_balance_paid<0) {
            $get_balance_paid = str_replace("-", "", $get_balance_paid) . " CREDIT";
              }  else {

            $get_balance_paid = $get_balance_paid."  DEBIT";

               }
             }
          echo '<tr>' .
       '<td>' .
       $member_id.
       '</td>' .
        '<td>' .
      $formatted.
        '</td>' .
      
       '<td>' . "GH&#x20B5;".
        $get_balance_paid .
        '</td>' .

        '<td>'.

   '<a  href="pages/r?id=' . $row['member_id'] . '&inv17ml44=payments_ledger" >'
           . 'RECORD OR VIEW PAYMENTS</a>'.'  '.
   '</td>' .
         
        '</tr>';         
           
       }
       } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }}




           public function get_account_items_detail_by_id(){
         
            try {
          
             if(is_null($this->pdo)){
                 $this->msg = 'Connection did not work out!';
                 return [];
             }else{
                 $user_id = $_SESSION['userid'];
                 $member_id =   $_SESSION['member_id'];
               
                 $stirngdel = "NO";
                 $pdo = $this->pdo;
                 $stmt = $pdo->prepare('SELECT id,account_type,acc_name FROM account_items WHERE u_id = :u_id AND deleted = :del AND id =:member_id');
                 $stmt ->bindParam(':u_id', $user_id);
                  $stmt ->bindParam(':del', $stirngdel);
                  $stmt ->bindParam(':member_id', $member_id);
                 $stmt->execute();
                 $result = $stmt->fetch(); 
                 return $result; 
             }
             
            } catch (\Throwable $th) {
             echo $th->getTraceAsString();
            }
         
         }

         public function get_income_exp_detail_by_id(){
         
          try {
        
           if(is_null($this->pdo)){
               $this->msg = 'Connection did not work out!';
               return [];
           }else{
               $user_id = $_SESSION['userid'];
               $member_id =   $_SESSION['member_id'];
             
               $stirngdel = "NO";
               $pdo = $this->pdo;
               $stmt = $pdo->prepare('SELECT id,acc_type,acc_name,acc_amt,mop,description_note,business_type,date_reg FROM income_exp WHERE u_id = :u_id AND deleted = :del AND id =:member_id');
               $stmt ->bindParam(':u_id', $user_id);
                $stmt ->bindParam(':del', $stirngdel);
                $stmt ->bindParam(':member_id', $member_id);
               $stmt->execute();
               $result = $stmt->fetch(); 
               return $result; 
           }
           
          } catch (\Throwable $th) {
           echo $th->getTraceAsString();
          }
       
       }


           public function make_payments(){
            try {
                $pdo = $this->pdo;
                $now = date("Y-m-d");
                $d = date("Y");
                $m= date("m");
                $member_id =  $_SESSION['member_id'];
                $user_id = $_SESSION['userid'];
                $receivedby = $_SESSION['email'] ;
                
                 $amountpadi = filter_input(INPUT_POST, 'amountpadi', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
     $mop = filter_input(INPUT_POST, 'mop', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
      $paidby = filter_input(INPUT_POST, 'paidby', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
     $chequenumber = filter_input(INPUT_POST, 'chequenumber', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
     $code = $m."00".$d.$this->gen_verification_code().$member_id.$m;
                //$url = md5($code);
                $stmt = $pdo ->prepare('INSERT INTO fee_payments(member_id,u_id,amount,receipt_no,mode_of_payment,mode_of_payment_number,mode_of_payment_number,payment_date,paid_by,received_by) VALUES '
              . ' (:member_id,:u_id,:amount,:receipt_no,:mode_of_payment,:mode_of_payment_number,:payment_date,:paid_by,:received_by)');
         $stmt ->bindParam(':member_id', $member_id);
         $stmt ->bindParam(':u_id', $user_id);
         $stmt ->bindParam(':amount', $amountpadi);
         $stmt ->bindParam(':receipt_no', $code);
         $stmt ->bindParam(':mode_of_payment', $mop);
         $stmt ->bindParam(':mode_of_payment_number', $chequenumber);
         $stmt ->bindParam(':payment_date', $now);
         $stmt ->bindParam(':paid_by', $now);
         $stmt ->bindParam(':received_by', $receivedby);
      
      
              if($stmt->execute()){
                $this->saveMessageac();
                echo "<script>window.location='pages/r?inv17ml4=members_payment_list'</script>";
                return true;
          
            }else{
                $this->msg = 'Payment Failed.';
                return false;
            }   
                 
                 
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            } 
        }          


public function gen_verification_code(){
  $six_digit_random_number = mt_rand(100000, 999999);
  
  return $six_digit_random_number;
}



public function allincome(){
    try {
         $string_deleted = "NO";
         $user_id = $_SESSION['userid'];
    
   $pdo = $this->pdo;
   $stmt = $pdo->prepare('SELECT id,acc_name,acc_type,acc_amt,mop,business_type,description_note,date_reg FROM income_exp WHERE u_id = :u_id AND deleted = :N_O_O');
   $stmt ->bindParam(':u_id', $user_id);
   $stmt ->bindParam(':N_O_O', $string_deleted);
   
   $stmt->execute();
  $data_ = $stmt ->fetchAll();
  foreach ($data_ as $row) {

    if($_SESSION['user_type']=="Manager"){
 
      $account_name = $row['acc_name'];
      $acc_amt = $row['acc_amt'];
      $date_reg = $row['date_reg'];
      $acc_type = $row['acc_type'];
      $mop = $row['mop'];
      $business_type = $row['business_type'];
      $description_note = $row['description_note'];
      $amtf = number_format($acc_amt, 2, '.', ',');
     
    echo '<tr>' .
  '<td>' .
  $account_name.
  '</td>' .
   '<td>' .
   $amtf .
   '</td>' .
   '<td>' .
   $mop .
   '</td>' .
   '<td>' .
   $business_type .
   '</td>' .
   '<td>' .
   $description_note .
   '</td>' .
   '<td>' .
   $acc_type .
   '</td>' .
   '<td>' .
   $date_reg .
   '</td>' .
   '<td>'.

          '<a  href="pages/r?id=' . $row['id'] . '&inv17ml44=add_amt_ex_inc">'
                  . '<i class=" fas fa-edit"></i></a>'.'  '.
                    '<a href="pages/r?id=' . $row['id'] . '&inv17ml44=add_amt_ex_inc_del" >'
                  . '<i class="fas fa-trash"></i></a>'.
          '</td>' .
   '</tr>'; 
    }else{


       
      $account_name = $row['acc_name'];
      $acc_amt = $row['acc_amt'];
      $date_reg = $row['date_reg'];
      $acc_type = $row['acc_type'];

      $mop = $row['mop'];
      $business_type = $row['business_type'];
      $description_note = $row['description_note'];
      
      $amtf = number_format($acc_amt, 2, '.', ',');
     
    echo '<tr>' .
  '<td>' .
  $account_name.
  '</td>' .
   '<td>' .
   $amtf .
   '</td>' .
   '<td>' .
   $mop .
   '</td>' .
   '<td>' .
   $business_type .
   '</td>' .
   '<td>' .
   $description_note .
   '</td>' .
   '<td>' .
   $acc_type .
   '</td>' .
   '<td>' .
   $date_reg .
   '</td>' . 
   '</tr>'; 
    }
             
      
  }

}
catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

public function allincomeonly(){
  try {
       $string_deleted = "NO";
       $user_id = $_SESSION['userid'];
       $type = "Income";
  
 $pdo = $this->pdo;
 $stmt = $pdo->prepare('SELECT id,acc_name,acc_type,acc_amt,mop,business_type,description_note,date_reg FROM income_exp WHERE u_id = :u_id AND deleted = :N_O_O AND acc_type =:acc_type');
 $stmt ->bindParam(':u_id', $user_id);
 $stmt ->bindParam(':N_O_O', $string_deleted);
 $stmt ->bindParam(':acc_type', $type);
 
 $stmt->execute();
$data_ = $stmt ->fetchAll();
foreach ($data_ as $row) {
    
    $account_name = $row['acc_name'];
    $acc_amt = $row['acc_amt'];
    $date_reg = $row['date_reg'];
    $acc_type = $row['acc_type'];
  
    $amtf = number_format($acc_amt, 2, '.', ',');
   
  echo '<tr>' .
'<td>' .
$account_name.
'</td>' .
 '<td>' .
 $amtf .
 '</td>' .
 '<td>' .
 $acc_type .
 '</td>' .
 '<td>' .
 $date_reg .
 '</td>' .
 
 '</tr>';         
    
}

}
catch (Exception $exc) {
      echo $exc->getTraceAsString();
  }
}



public function allexpenseonly(){
  try {
       $string_deleted = "NO";
       $user_id = $_SESSION['userid'];
       $type = "Expense";
  
 $pdo = $this->pdo;
 $stmt = $pdo->prepare('SELECT id,acc_name,acc_type,acc_amt,date_reg FROM income_exp WHERE u_id = :u_id AND deleted = :N_O_O AND acc_type =:acc_type');
 $stmt ->bindParam(':u_id', $user_id);
 $stmt ->bindParam(':N_O_O', $string_deleted);
 $stmt ->bindParam(':acc_type', $type);
 
 $stmt->execute();
$data_ = $stmt ->fetchAll();
foreach ($data_ as $row) {
    
    $account_name = $row['acc_name'];
    $acc_amt = $row['acc_amt'];
    $date_reg = $row['date_reg'];
    $acc_type = $row['acc_type'];
  
    $amtf = number_format($acc_amt, 2, '.', ',');
   
  echo '<tr>' .
'<td>' .
$account_name.
'</td>' .
 '<td>' .
 $amtf .
 '</td>' .
 '<td>' .
 $acc_type .
 '</td>' .
 '<td>' .
 $date_reg .
 '</td>' .
  
 '</tr>';         
    
}

}
catch (Exception $exc) {
      echo $exc->getTraceAsString();
  }
}


public function get_income_exp_type($acc_name){
         
  try {

   if(is_null($this->pdo)){
       $this->msg = 'Connection did not work out!';
       return [];
   }else{
       $user_id = $_SESSION['userid'];
       
     
       $stirngdel = "NO";
       $pdo = $this->pdo;
       $stmt = $pdo->prepare('SELECT account_type FROM account_items WHERE u_id = :u_id AND deleted = :del AND acc_name =:acc_name');
       $stmt ->bindParam(':u_id', $user_id);
        $stmt ->bindParam(':del', $stirngdel);
        $stmt ->bindParam(':acc_name', $acc_name);
       $stmt->execute();
       $result = $stmt->fetch(); 
       return $result['account_type']; 
   }
   
  } catch (\Throwable $th) {
   echo $th->getTraceAsString();
  }

}

 

public function alldeposits(){
    try {
         $string_deleted = "NO";
         $user_id = $_SESSION['userid'];
    
   $pdo = $this->pdo;
   $stmt = $pdo->prepare('SELECT id,bank_name,amount_deposited,depositor,date_time FROM bank_deposits WHERE u_id = :u_id AND deleted = :N_O_O');
   $stmt ->bindParam(':u_id', $user_id);
   $stmt ->bindParam(':N_O_O', $string_deleted);
   
   $stmt->execute();
  $data_ = $stmt ->fetchAll();
  foreach ($data_ as $row) {
      
      $bank_name = $row['bank_name'];
      $amount_deposited = $row['amount_deposited'];
      $depositor = $row['depositor'];
      $date_time = $row['date_time'];
     // $newDateTime = date('h:i A', strtotime($date_time));
      $amtf = number_format($amount_deposited, 2, '.', ',');
     
    echo '<tr>' .
  '<td>' .
  $bank_name.
  '</td>' .
   '<td>' .
   $amtf .
   '</td>' .
   '<td>' .
   $depositor .
   '</td>' .
   '<td>' .
   $date_time .
   '</td>' .
   '<td>'.

   '<a  href="pages/r?id=' . $row['id'] . '&inv17ml44=bank_deposit_edit">'
           . '<i class=" fas fa-edit"></i></a>'.'  '.
             '<a href="pages/r?id=' . $row['id'] . '&inv17ml44=bank_deposit_delete" >'
           . '<i class="fas fa-trash"></i></a>'.
   '</td>' .
   '</tr>';         
      
  }

}
catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}


public function alldepositsmonthly(){
    try {
         $string_deleted = "NO";
         $user_id = $_SESSION['userid'];
    
   $pdo = $this->pdo;
   $stmt = $pdo->prepare('SELECT id,bank_name,amount_deposited,depositor,date_time FROM bank_deposits WHERE u_id = :u_id AND  MONTH(date_time) = MONTH(CURDATE()) AND YEAR(date_time) = YEAR(CURDATE()) AND deleted = :N_O_O');
  
   $stmt ->bindParam(':u_id', $user_id);
   $stmt ->bindParam(':N_O_O', $string_deleted);
   
   $stmt->execute();
  $data_ = $stmt ->fetchAll();
  foreach ($data_ as $row) {
      
      $bank_name = $row['bank_name'];
      $amount_deposited = $row['amount_deposited'];
      $depositor = $row['depositor'];
      $date_time = $row['date_time'];
     // $newDateTime = date('h:i A', strtotime($date_time));
      $amtf = number_format($amount_deposited, 2, '.', ',');
     
    echo '<tr>' .
  '<td>' .
  $bank_name.
  '</td>' .
   '<td>' .
   $amtf .
   '</td>' .
    
   '<td>' .
   $date_time .
   '</td>' .
   
   '</tr>';         
      
  }

}
catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}



public function allwithdrawals(){
    try {
         $string_deleted = "NO";
         $user_id = $_SESSION['userid'];
    
   $pdo = $this->pdo;
   $stmt = $pdo->prepare('SELECT id,bank_name,amount_withdrawn,withdrawn_by,date_time,reason FROM bank_withdrawals WHERE u_id = :u_id AND deleted = :N_O_O');
   $stmt ->bindParam(':u_id', $user_id);
   $stmt ->bindParam(':N_O_O', $string_deleted);
   
   $stmt->execute();
  $data_ = $stmt ->fetchAll();
  foreach ($data_ as $row) {
      
      $bank_name = $row['bank_name'];
      $amount_deposited = $row['amount_withdrawn'];
      $depositor = $row['withdrawn_by'];
      $date_time = $row['date_time'];
      $reason = $row['reason'];
     // $newDateTime = date('h:i A', strtotime($date_time));
      $amtf = number_format($amount_deposited, 2, '.', ',');
     
    echo '<tr>' .
  '<td>' .
  $bank_name.
  '</td>' .
   '<td>' .
   $amtf .
   '</td>' .
   '<td>' .
   $depositor .
   '</td>' .
   '<td>' .
   $reason .
   '</td>' .
   '<td>' .
   $date_time .
   '</td>' .
   '<td>'.

   '<a  href="pages/r?id=' . $row['id'] . '&inv17ml44=bank_withdrawals_edit">'
           . '<i class=" fas fa-edit"></i></a>'.'  '.
             '<a href="pages/r?id=' . $row['id'] . '&inv17ml44=bank_withdrawals_delete" >'
           . '<i class="fas fa-trash"></i></a>'.
   '</td>' .
   '</tr>';         
      
  }

}
catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}



public function allbankaccounts(){
    try {
         $string_deleted = "NO";
         $user_id = $_SESSION['userid'];
    
   $pdo = $this->pdo;
   $stmt = $pdo->prepare('SELECT id,bank_name,acc_number,branch FROM bank_details WHERE u_id = :u_id AND deleted = :N_O_O');
   $stmt ->bindParam(':u_id', $user_id);
   $stmt ->bindParam(':N_O_O', $string_deleted);
   
   $stmt->execute();
  $data_ = $stmt ->fetchAll();
  foreach ($data_ as $row) {
      
      $bank_name = $row['bank_name'];
      $acc_number = $row['acc_number'];
      $branch = $row['branch'];
    
     
     
    echo '<tr>' .
  '<td>' .
  $bank_name.
  '</td>' .
   '<td>' .
   $acc_number .
   '</td>' .
   '<td>' .
   $branch .
   '</td>' .
   '<td>'.

   '<a  href="pages/r?id=' . $row['id'] . '&inv17ml44=add_bank_edit">'
           . '<i class=" fas fa-edit"></i></a>'.'  '.
             '<a href="pages/r?id=' . $row['id'] . '&inv17ml44=add_bank_delete" >'
           . '<i class="fas fa-trash"></i></a>'.
   '</td>' .
   '</tr>';         
      
  }

}
catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}



public function get_details_of_bank_id(){
         
  try {

   if(is_null($this->pdo)){
       $this->msg = 'Connection did not work out!';
       return [];
   }else{
       $user_id = $_SESSION['userid'];
       $member_id =   $_SESSION['member_id'];
     
       $stirngdel = "NO";
       $pdo = $this->pdo;
       $stmt = $pdo->prepare('SELECT id,bank_name,acc_number,branch FROM bank_details WHERE u_id = :u_id AND deleted = :del AND id =:member_id');
       $stmt ->bindParam(':u_id', $user_id);
        $stmt ->bindParam(':del', $stirngdel);
        $stmt ->bindParam(':member_id', $member_id);
       $stmt->execute();
       $result = $stmt->fetch(); 
       return $result; 
   }
   
  } catch (\Throwable $th) {
   echo $th->getTraceAsString();
  }

}

public function get_details_of_bank_deposits_id(){
         
  try {

   if(is_null($this->pdo)){
       $this->msg = 'Connection did not work out!';
       return [];
   }else{
       $user_id = $_SESSION['userid'];
       $member_id =   $_SESSION['member_id'];
     
       $stirngdel = "NO";
       $pdo = $this->pdo;
       $stmt = $pdo->prepare('SELECT id,bank_name,amount_deposited,depositor FROM bank_deposits WHERE u_id = :u_id AND deleted = :del AND id =:member_id');
       $stmt ->bindParam(':u_id', $user_id);
        $stmt ->bindParam(':del', $stirngdel);
        $stmt ->bindParam(':member_id', $member_id);
       $stmt->execute();
       $result = $stmt->fetch(); 
       return $result; 
   }
   
  } catch (\Throwable $th) {
   echo $th->getTraceAsString();
  }

}

public function get_details_of_bank_withdrawals_id(){
         
  try {

   if(is_null($this->pdo)){
       $this->msg = 'Connection did not work out!';
       return [];
   }else{
       $user_id = $_SESSION['userid'];
       $member_id =   $_SESSION['member_id'];
     
       $stirngdel = "NO";
       $pdo = $this->pdo;
       $stmt = $pdo->prepare('SELECT id,bank_name,amount_withdrawn,withdrawn_by,reason FROM bank_withdrawals WHERE u_id = :u_id AND deleted = :del AND id =:member_id');
       $stmt ->bindParam(':u_id', $user_id);
        $stmt ->bindParam(':del', $stirngdel);
        $stmt ->bindParam(':member_id', $member_id);
       $stmt->execute();
       $result = $stmt->fetch(); 
       return $result; 
   }
   
  } catch (\Throwable $th) {
   echo $th->getTraceAsString();
  }

}



public function getaccountitemsdropdown(){
    try {
$string_deleted = "NO";
$user_id = $_SESSION['userid'];
   
  $pdo = $this->pdo;
  $stmt = $pdo->prepare('SELECT acc_name FROM account_items WHERE u_id = :u_id AND deleted = :N_O_O');
  $stmt ->bindParam(':u_id', $user_id);
  $stmt ->bindParam(':N_O_O', $string_deleted);
if($stmt->execute()){
 while ($row = $stmt ->fetch()){
   echo "<option value = '$row[acc_name]'>"  .$row['acc_name'] ."</option>";
                   
}  
return true;
}else{
   return false;
}
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}


public function bankdropdown(){
    try {
$string_deleted = "NO";
$user_id = $_SESSION['userid'];
   
  $pdo = $this->pdo;
  $stmt = $pdo->prepare('SELECT bank_name FROM bank_details WHERE u_id = :u_id AND deleted = :N_O_O');
  $stmt ->bindParam(':u_id', $user_id);
  $stmt ->bindParam(':N_O_O', $string_deleted);
if($stmt->execute()){
 while ($row = $stmt ->fetch()){
   echo "<option value = '$row[bank_name]'>"  .$row['bank_name'] ."</option>";
                   
}  
return true;
}else{
   return false;
}
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}


public function billitemdropdown(){
    try {
$string_deleted = "NO";
$user_id = $_SESSION['userid'];
   
  $pdo = $this->pdo;
  $stmt = $pdo->prepare('SELECT bill_name,date_registered FROM bill_item WHERE u_id = :u_id AND deleted = :N_O_O ORDER BY date_registered DESC');
  $stmt ->bindParam(':u_id', $user_id);
  $stmt ->bindParam(':N_O_O', $string_deleted);
if($stmt->execute()){
 while ($row = $stmt ->fetch()){
   echo "<option value = '$row[bill_name]'>"  .$row['bill_name']." ".($row['date_registered']) ."</option>";
                   
}  
return true;
}else{
   return false;
}
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}






public function get_users_activity(){
    try {
        $user_id = $_SESSION['userid'];
        $users_email = $_SESSION['email'];
        $string_deleted = "NO";
    $pdo = $this->pdo;
    $stmt = $pdo->prepare('SELECT task,summary,date_of_task,datetime_of_task FROM task_timeliness WHERE created_by = :created_by AND u_id = :u_id AND deleted = :NO_');
    $stmt ->bindParam(':created_by', $users_email); 
    $stmt ->bindParam(':u_id', $user_id);
    $stmt ->bindParam(':NO_', $string_deleted);
    $stmt->execute();
   
    for($i=0; $row = $stmt->fetch(); $i++){
        
      
    
    echo '<tr>' .
    '<td>' .
    $row['task'] .
    '</td>' .
    '<td>' .
    $row['summary'] .
    '</td>' .
  
   '<td>' .
    $row['date_of_task'] .
    '</td>' .
    '<td>' .
    $row['datetime_of_task'] .
    '</td>' .
   '</tr>';
    
    }
    
    } catch (PDOException $exc) {
        echo "ERROR". $exc->getMessage();
    }
    }




              
   public function time_passed($timestamp){
    //type cast, current time, difference in timestamps
    $timestamp      = (int) $timestamp;
    $current_time   = time();
    $diff           = $current_time - $timestamp;
    
    //intervals in seconds
    $intervals      = array (
        'year' => 31556926, 'month' => 2629744, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute'=> 60
    );
    
    //now we just find the difference
    if ($diff == 0)
    {
        return 'just now';
    }    

    if ($diff < 60)
    {
        return $diff == 1 ? $diff . ' second ago' : $diff . ' seconds ago';
    }        

    if ($diff >= 60 && $diff < $intervals['hour'])
    {
        $diff = floor($diff/$intervals['minute']);
        return $diff == 1 ? $diff . ' minute ago' : $diff . ' minutes ago';
    }        

    if ($diff >= $intervals['hour'] && $diff < $intervals['day'])
    {
        $diff = floor($diff/$intervals['hour']);
        return $diff == 1 ? $diff . ' hour ago' : $diff . ' hours ago';
    }    

    if ($diff >= $intervals['day'] && $diff < $intervals['week'])
    {
        $diff = floor($diff/$intervals['day']);
        return $diff == 1 ? $diff . ' day ago' : $diff . ' days ago';
    }    

    if ($diff >= $intervals['week'] && $diff < $intervals['month'])
    {
        $diff = floor($diff/$intervals['week']);
        return $diff == 1 ? $diff . ' week ago' : $diff . ' weeks ago';
    }    

    if ($diff >= $intervals['month'] && $diff < $intervals['year'])
    {
        $diff = floor($diff/$intervals['month']);
        return $diff == 1 ? $diff . ' month ago' : $diff . ' months ago';
    }    

    if ($diff >= $intervals['year'])
    {
        $diff = floor($diff/$intervals['year']);
        return $diff == 1 ? $diff . ' year ago' : $diff . ' years ago';
    }
}



public function searchincomexpense(){
  try {
       $string_deleted = "NO";
       $user_id = $_SESSION['userid'];

       $datefrom = filter_input(INPUT_POST, 'datefrom', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
       $dateto = filter_input(INPUT_POST, 'dateto', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
       $_SESSION['datefrom'] = $datefrom;
       $_SESSION['dateto'] = $dateto;
  $acc_type ="Income";
 $pdo = $this->pdo;
 $stmt = $pdo->prepare('SELECT id,acc_name,acc_type,acc_amt,date_reg FROM income_exp WHERE u_id = :u_id AND deleted = :N_O_O AND acc_type =:acc_type
 AND date_reg >= :datefrom AND date_reg <= :dateto ');
 $stmt ->bindParam(':u_id', $user_id);
 $stmt ->bindParam(':N_O_O', $string_deleted);
 $stmt ->bindParam(':acc_type', $acc_type);
 $stmt ->bindParam(':datefrom', $datefrom);
 $stmt ->bindParam(':dateto', $dateto);

 $stmt->execute();
$data_ = $stmt ->fetchAll();
foreach ($data_ as $row) {
    
    $account_name = $row['acc_name'];
    $acc_amt = $row['acc_amt'];
    $date_reg = $row['date_reg'];
    
  
    $amtf = number_format($acc_amt, 2, '.', ',');
   
  echo '<tr>' .
'<td>' .
$account_name.
'</td>' .
 '<td>' .
 $amtf .
 '</td>' .
 '</tr>';         
    
}

}
catch (Exception $exc) {
      echo $exc->getTraceAsString();
  }
}




public function searchexpense(){
  try {
       $string_deleted = "NO";
       $user_id = $_SESSION['userid'];

       $datefrom = filter_input(INPUT_POST, 'datefrom', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
       $dateto = filter_input(INPUT_POST, 'dateto', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
  $acc_type ="Expense";
  $_SESSION['datefrom'] = $datefrom;
  $_SESSION['dateto'] = $dateto;
 $pdo = $this->pdo;
 $stmt = $pdo->prepare('SELECT id,acc_name,acc_type,acc_amt,date_reg FROM income_exp WHERE u_id = :u_id AND deleted = :N_O_O AND acc_type =:acc_type
 AND date_reg >= :datefrom AND date_reg <= :dateto ');
 $stmt ->bindParam(':u_id', $user_id);
 $stmt ->bindParam(':N_O_O', $string_deleted);
 $stmt ->bindParam(':acc_type', $acc_type);
 $stmt ->bindParam(':datefrom', $datefrom);
 $stmt ->bindParam(':dateto', $dateto);

 $stmt->execute();
$data_ = $stmt ->fetchAll();
foreach ($data_ as $row) {
    
    $account_name = $row['acc_name'];
    $acc_amt = $row['acc_amt'];
    $date_reg = $row['date_reg'];
    
  
    $amtf = number_format($acc_amt, 2, '.', ',');
   
  echo '<tr>' .
'<td>' .
$account_name.
'</td>' .
 '<td>' .
 $amtf .
 '</td>' .
 '</tr>';         
    
}

}
catch (Exception $exc) {
      echo $exc->getTraceAsString();
  }
}


public function get_member_detail_by_id_id($member_id){
         
  try {

   if(is_null($this->pdo)){
       $this->msg = 'Connection did not work out!';
       return [];
   }else{
       $user_id = $_SESSION['userid'];
      // $member_id =   $_SESSION['member_id'];
     
       $stirngdel = "NO";
       $pdo = $this->pdo;
       $stmt = $pdo->prepare('SELECT * FROM members WHERE u_id = :u_id AND deleted = :del AND member_id =:member_id');
       $stmt ->bindParam(':u_id', $user_id);
        $stmt ->bindParam(':del', $stirngdel);
        $stmt ->bindParam(':member_id', $member_id);
       $stmt->execute();
       $result = $stmt->fetch(); 
       return $result; 
   }
   
  } catch (\Throwable $th) {
   echo $th->getTraceAsString();
  }

}

public function searchpayements(){
  try {
       $string_deleted = "NO";
       $user_id = $_SESSION['userid'];

       $datefrom = filter_input(INPUT_POST, 'datefrom', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
       $dateto = filter_input(INPUT_POST, 'dateto', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
       $_SESSION['datefrom'] = $datefrom;
       $_SESSION['dateto'] = $dateto;
  $acc_type ="Income";
 $pdo = $this->pdo;
 $stmt = $pdo->prepare('SELECT * FROM tbl_bookings WHERE deleted = :N_O_O
 AND DATE(book_date) >= :datefrom AND DATE(book_date) <= :dateto ');
 //$stmt ->bindParam(':u_id', $user_id);
 $stmt ->bindParam(':N_O_O', $string_deleted);
 //$stmt ->bindParam(':acc_type', $acc_type);
 $stmt ->bindParam(':datefrom', $datefrom);
 $stmt ->bindParam(':dateto', $dateto);

 $stmt->execute();
$data_ = $stmt ->fetchAll();
foreach ($data_ as $row) {
     
    $acc_amt = $row['amount_charged'];
    $date_reg = $row['book_date'];
    $room_id = $row['room_id']; 

     
  //$_SESSION['formattedname'] = $formatted;
    $amtf = number_format($acc_amt, 2, '.', ',');
   
  echo '<tr>' .
'<td>' .
$room_id.
'</td>' .
 '<td>' .
 $amtf .
 '</td>' .
 '<td>' .
 $date_reg .
 '</td>' .
 '</tr>';         
    
}

}
catch (Exception $exc) {
      echo $exc->getTraceAsString();
  }
}






public function sumsearchpayements(){
  try {

    $sum_intital = 0.00;
       $string_deleted = "NO";
      // $user_id = $_SESSION['userid'];

       $datefrom = filter_input(INPUT_POST, 'datefrom', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
       $dateto = filter_input(INPUT_POST, 'dateto', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
  $acc_type ="Income";
 $pdo = $this->pdo;
 $stmt = $pdo->prepare('SELECT SUM(amount_charged) FROM tbl_bookings WHERE deleted = :N_O_O
 AND DATE(book_date) >= :datefrom AND DATE(book_date) <= :dateto ');
 //$stmt ->bindParam(':u_id', $user_id);
 $stmt ->bindParam(':N_O_O', $string_deleted);
 //$stmt ->bindParam(':acc_type', $acc_type);
 $stmt ->bindParam(':datefrom', $datefrom);
 $stmt ->bindParam(':dateto', $dateto);

 $stmt->execute();
$data_ = $stmt ->fetch();
return $data_['SUM(amount_charged)'] + $sum_intital;

}
catch (Exception $exc) {
      echo $exc->getTraceAsString();
  }
}


public function sumsearchIncomes(){
  try {
    $sum_intital = 0.00;
       $string_deleted = "NO";
       $user_id = $_SESSION['userid'];

       $datefrom = filter_input(INPUT_POST, 'datefrom', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
       $dateto = filter_input(INPUT_POST, 'dateto', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
  $acc_type ="Income";
 $pdo = $this->pdo;
 $stmt = $pdo->prepare('SELECT SUM(acc_amt) FROM income_exp WHERE u_id = :u_id AND deleted = :N_O_O AND acc_type =:acc_type
 AND date_reg >= :datefrom AND date_reg <= :dateto ');
 $stmt ->bindParam(':u_id', $user_id);
 $stmt ->bindParam(':N_O_O', $string_deleted);
 $stmt ->bindParam(':acc_type', $acc_type);
 $stmt ->bindParam(':datefrom', $datefrom);
 $stmt ->bindParam(':dateto', $dateto);

 $stmt->execute();
$data_ = $stmt ->fetch();
return $data_['SUM(acc_amt)'] + $sum_intital;

}
catch (Exception $exc) {
      echo $exc->getTraceAsString();
  }
}



public function sumsearchExpense(){
  try {
    $sum_intital = 0.00;
       $string_deleted = "NO";
       $user_id = $_SESSION['userid'];

       $datefrom = filter_input(INPUT_POST, 'datefrom', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
       $dateto = filter_input(INPUT_POST, 'dateto', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
  $acc_type ="Expense";
 $pdo = $this->pdo;
 $stmt = $pdo->prepare('SELECT SUM(acc_amt) FROM income_exp WHERE u_id = :u_id AND deleted = :N_O_O AND acc_type =:acc_type
 AND date_reg >= :datefrom AND date_reg <= :dateto ');
 $stmt ->bindParam(':u_id', $user_id);
 $stmt ->bindParam(':N_O_O', $string_deleted);
 $stmt ->bindParam(':acc_type', $acc_type);
 $stmt ->bindParam(':datefrom', $datefrom);
 $stmt ->bindParam(':dateto', $dateto);

 $stmt->execute();
$data_ = $stmt ->fetch();
return $data_['SUM(acc_amt)'] + $sum_intital;

}
catch (Exception $exc) {
      echo $exc->getTraceAsString();
  }
}


public function profit_loss(){
  try {
    $initial_balance = 0.00;
    $get_balance_paid =  ( $this->sumsearchExpense() ) - ( $this -> sumsearchpayements() + $this -> sumsearchIncomes());

    $start_balance = $initial_balance + $get_balance_paid;
    $start_balance =  number_format($start_balance, 2, '.', ',');

    if($start_balance){
      if($start_balance==0){
  $start_balance =   $start_balance." -"."";
    }elseif ($start_balance<0) {
 $start_balance = str_replace("-", "", $start_balance) . " Profit";
   }  else {

 $start_balance = $start_balance."  Loss";



    }
  } 
  return $start_balance;
  } catch (\Throwable $th) {
    //throw $th;
  }
}
 
}
