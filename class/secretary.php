<?php
//require_once 'accountant.php';

 
class secretary {
    
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

      //  $root_url = "https://linutekgh.com/associationmis/class/uploads/";
     // $root_url = "https://app.knustmarshallan.org/class/uploads/";
      $root_url = "http://localhost/groupmis/class/uploads/";
        return $root_url;
    }  


    /////ADMINISTRATOR METHODS


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
    
     
     public function get_visitor_message_template(){
         
        try {
      
         if(is_null($this->pdo)){
             $this->msg = 'Connection did not work out!';
             return [];
         }else{
             $membership_id = $_SESSION['membership_id'];
            
             $stirngdel = "NO";
             $pdo = $this->pdo;
             $dummy = "(NULL)";
             $stmt = $pdo->prepare('SELECT sms_message_visitor FROM sms_templates ');
            // $stmt ->bindParam(':u_id', $user_id);
            //  $stmt ->bindParam(':del', $stirngdel);
              $stmt ->bindParam(':staff_id', $userid);
              $stmt ->bindParam(':membership_id', $membership_id);
           //   $stmt ->bindParam(':dummy', $dummy);
             $stmt->execute();
             $result = $stmt->fetch(); 
             return $result['sms_message_visitor']; 
         }
         
        } catch (\Throwable $th) {
         echo $th->getTraceAsString();
        }
     
     }  

public function view_users(){
    try {
      $membership_id = $_SESSION['membership_id'];
         $string_deleted = "NO";
       $pdo = $this->pdo;
       // $sql = "SELECT * FROM tbl_staff, tbl_login WHERE tbl_staff.staff_id = tbl_login.userid AND tbl_staff.staff_id = '" . $staff_id . "'";
$stmt = $pdo->prepare('SELECT * FROM tbl_login WHERE deleted = :N_O_O  AND membership_id =:membership_id ');

$stmt ->bindParam(':N_O_O', $string_deleted);
$stmt ->bindParam(':membership_id', $membership_id);
$stmt->execute();
$data_ = $stmt ->fetchAll();  

foreach ($data_ as $row) {
  

  $fullname = $this->get_staff_fullname_detail_by_id_($row['userid']);

   $fulnames = $fullname['firstName'].'  '.$fullname['otherNames'];
 
   $user_types = $row['user_type'];
   
   
  echo '<tr>' .
  '<td>' .
$row['userid'].
'</td>' .
'<td>' .
$fulnames.
'</td>' .
'<td>' .
$user_types.
'</td>' . 
 
'</tr>';         
   
}
} catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }}


    public function view_members(){
        try {
          $membership_id = $_SESSION['membership_id'];
             $string_deleted = "NO";
           $pdo = $this->pdo;
           // $sql = "SELECT * FROM tbl_staff, tbl_login WHERE tbl_staff.staff_id = tbl_login.userid AND tbl_staff.staff_id = '" . $staff_id . "'";
    $stmt = $pdo->prepare('SELECT * FROM members WHERE deleted = :N_O_O  AND membership_id =:membership_id ');
    
    $stmt ->bindParam(':N_O_O', $string_deleted);
    $stmt ->bindParam(':membership_id', $membership_id);
    $stmt->execute();
    $data_ = $stmt ->fetchAll();  
    
    foreach ($data_ as $row) {
      
    
     // $fullname = $this->get_staff_fullname_detail_by_id_($row['userid']);
    
       $fulnames = $row['first_name'].'  '.$row['other_name'];
     
       $contact = $row['phone_number'];

       $residence = $row['residence'];
       
       
      echo '<tr>' .
    '<td>' .
    $fulnames.
    '</td>' .
    '<td>' .
    $contact.
    '</td>' . 

    '<td>' .
    $residence.
    '</td>' . 
     
    '</tr>';         
       
    }
    } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }}

        public function view_members_males(){
            try {
              $membership_id = $_SESSION['membership_id'];
                 $string_deleted = "NO";
                 $gender = "Male";
               $pdo = $this->pdo;
               // $sql = "SELECT * FROM tbl_staff, tbl_login WHERE tbl_staff.staff_id = tbl_login.userid AND tbl_staff.staff_id = '" . $staff_id . "'";
        $stmt = $pdo->prepare('SELECT * FROM members WHERE deleted = :N_O_O  AND membership_id =:membership_id AND gender =:gender ');
        
        $stmt ->bindParam(':N_O_O', $string_deleted);
        $stmt ->bindParam(':membership_id', $membership_id);
        $stmt ->bindParam(':gender', $gender);
        $stmt->execute();
        $data_ = $stmt ->fetchAll();  
        
        foreach ($data_ as $row) {
          
        
         // $fullname = $this->get_staff_fullname_detail_by_id_($row['userid']);
        
           $fulnames = $row['first_name'].'  '.$row['other_name'];
         
           $contact = $row['phone_number'];
    
           $residence = $row['residence'];
           
           
          echo '<tr>' .
        '<td>' .
        $fulnames.
        '</td>' .
        '<td>' .
        $contact.
        '</td>' . 
    
        '<td>' .
        $residence.
        '</td>' . 
         
        '</tr>';         
           
        }
        } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }}


            public function view_members_females(){
                try {
                  $membership_id = $_SESSION['membership_id'];
                     $string_deleted = "NO";
                     $gender = "Female";
                   $pdo = $this->pdo;
                   // $sql = "SELECT * FROM tbl_staff, tbl_login WHERE tbl_staff.staff_id = tbl_login.userid AND tbl_staff.staff_id = '" . $staff_id . "'";
            $stmt = $pdo->prepare('SELECT * FROM members WHERE deleted = :N_O_O  AND membership_id =:membership_id AND gender =:gender ');
            
            $stmt ->bindParam(':N_O_O', $string_deleted);
            $stmt ->bindParam(':membership_id', $membership_id);
            $stmt ->bindParam(':gender', $gender);
            $stmt->execute();
            $data_ = $stmt ->fetchAll();  
            
            foreach ($data_ as $row) {
              
            
             // $fullname = $this->get_staff_fullname_detail_by_id_($row['userid']);
            
               $fulnames = $row['first_name'].'  '.$row['other_name'];
             
               $contact = $row['phone_number'];
        
               $residence = $row['residence'];
               
               
              echo '<tr>' .
            '<td>' .
            $fulnames.
            '</td>' .
            '<td>' .
            $contact.
            '</td>' . 
        
            '<td>' .
            $residence.
            '</td>' . 
             
            '</tr>';         
               
            }
            } catch (Exception $exc) {
                    echo $exc->getTraceAsString();
                }}


        public function view_members_for_payments(){
            try {
              $membership_id = $_SESSION['membership_id'];
                 $string_deleted = "NO";
               $pdo = $this->pdo;
               $link_redirection = "";
               // $sql = "SELECT * FROM tbl_staff, tbl_login WHERE tbl_staff.staff_id = tbl_login.userid AND tbl_staff.staff_id = '" . $staff_id . "'";
      
      if($_SESSION['user_type']=="Administrator"){
        $link_redirection = "add_member_payments";
      }elseif($_SESSION['user_type']=="Resident Pastor"){
        $link_redirection = "r_add_member_payments";
      }
      else{
        $link_redirection = "f_add_member_payments";
      }
      
        $stmt = $pdo->prepare('SELECT * FROM members WHERE deleted = :N_O_O  AND membership_id =:membership_id ');
        
        $stmt ->bindParam(':N_O_O', $string_deleted);
        $stmt ->bindParam(':membership_id', $membership_id);
        $stmt->execute();
        $data_ = $stmt ->fetchAll();  
        
        foreach ($data_ as $row) {
          
        
         // $fullname = $this->get_staff_fullname_detail_by_id_($row['userid']);
        
           $fulnames = $row['first_name'].'  '.$row['other_name'];
         
           $contact = $row['phone_number'];
    
           $residence = $row['residence'];
           
           
          echo '<tr>' .
        '<td>' .
        $fulnames.
        '</td>' .
        '<td>' .
        $contact.
        '</td>' . 
    
        '<td>' .
        $residence.
        '</td>' . 

        '<td>'.
        '<a onclick="return confirm("Are you sure you want to contitnue with action?")" title=Receive-payments  href="pages/r?id='.$row['member_id'] . '&inv17ml44='.$link_redirection.'">'
                . '<i class="fa fa-fw fa-money-bill-alt"></i> RECEIVE PAYMENT </a>'.
         '</td>' .
         
        '</tr>';         
           
        }
        } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }}



            public function get_member_detail_by_id_(){
         
                try {
              
                 if(is_null($this->pdo)){
                     $this->msg = 'Connection did not work out!';
                     return [];
                 }else{
                     $member_id = $_SESSION['member_id'];
                     $membership_id =   $_SESSION['membership_id'];
                   
                     $stirngdel = "NO";
                     $pdo = $this->pdo;
                     $stmt = $pdo->prepare('SELECT * FROM members WHERE member_id = :member_id AND deleted = :del AND membership_id =:membership_id');
                     $stmt ->bindParam(':member_id', $member_id);
                      $stmt ->bindParam(':del', $stirngdel);
                      $stmt ->bindParam(':membership_id', $membership_id); 
                     $stmt->execute();
                     $result = $stmt->fetch(); 
                     return $result; 
                 }
                 
                } catch (\Throwable $th) {
                 echo $th->getTraceAsString();
                }
             
             }



             public function get_staff_name_by_id_($userid){
         
                try {
              
                 if(is_null($this->pdo)){
                     $this->msg = 'Connection did not work out!';
                     return [];
                 }else{
                    // $member_id = $_SESSION['member_id'];
                     $membership_id =   $_SESSION['membership_id'];
                   
                     $stirngdel = "NO";
                     $pdo = $this->pdo;
                     $stmt = $pdo->prepare('SELECT firstName,otherNames FROM tbl_staff WHERE staff_id = :staff_id AND membership_id =:membership_id');
                     $stmt ->bindParam(':staff_id', $userid);
                    //  $stmt ->bindParam(':del', $stirngdel);
                      $stmt ->bindParam(':membership_id', $membership_id); 
                     $stmt->execute();
                     $result = $stmt->fetch(); 
                     return $result; 
                 }
                 
                } catch (\Throwable $th) {
                 echo $th->getTraceAsString();
                }
             
             }





             public function createEvent(){
                try {
                    $pdo = $this->pdo;
                    $now = date("Y-m-d");
                    $d = date("Y");
                    $m= date("m");
                   // $member_id =  $_SESSION['member_id'];
                    $user_id = $_SESSION['userid'];
                    $membership_id = $_SESSION['membership_id'];
                   // $receivedby = $_SESSION['email'] ;

                    $ProgrammeService = "";
                    
                     $TypeOfService = filter_input(INPUT_POST, 'TypeOfService', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);
         $slogan =strtoupper( filter_input(INPUT_POST, 'slogan', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS));
          $ProgramName = strtoupper(filter_input(INPUT_POST, 'ProgramName', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS));
          $TotalAttendance = filter_input(INPUT_POST, 'TotalAttendance', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);
         $comments = filter_input(INPUT_POST, 'comments', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);
         $dateOfEvent = filter_input(INPUT_POST, 'dateOfEvent', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);


         if($TypeOfService == "OTHER"){
            $ProgrammeService = $ProgramName;
         }else{
            $ProgrammeService = $TypeOfService;
         }

         $fullnameRecords = $this->get_staff_fullname_detail_by_id_($user_id);

         $taken_by = $fullnameRecords['firstName']." ".$fullnameRecords['otherNames'];
         
                    $stmt = $pdo ->prepare('INSERT INTO events_calendar(membership_id,name_of_program,slogan,venue,attendance,comments,taken_by,date_created,date_recorded) VALUES '
                  . ' (:membership_id,:name_of_program,:slogan,:venue,:attendance,:comments,:taken_by,:date_created,:date_recorded)');
             $stmt ->bindParam(':membership_id', $membership_id);
             $stmt ->bindParam(':name_of_program', $ProgrammeService);
             $stmt ->bindParam(':slogan', $slogan);
             $stmt ->bindParam(':venue', $venue);
             $stmt ->bindParam(':attendance', $TotalAttendance);
             $stmt ->bindParam(':comments', $comments);
             $stmt ->bindParam(':taken_by', $taken_by);
             $stmt ->bindParam(':date_created', $now);
             $stmt ->bindParam(':date_recorded', $dateOfEvent);
          
          
                  if($stmt->execute()){
                    $this->saveMessageac();
                  //  echo "<script>window.location='pages/r?inv17ml4=members_payment_list'</script>";
                    return true;
              
                }else{
                    $this->msg = 'Event Failed.';
                    return false;
                }   
                     
                     
                } catch (Exception $exc) {
                    echo $exc->getTraceAsString();
                } 
            }  
            
            
            public function saveMessageac(){
                echo  '<div>';
             echo  '<div class="alert alert-info">';
             echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
              echo '<strong><i class="icon-user icon-large"></i>&nbsp;Action Completed Sucessfully</strong>';
                echo'</div>';
                 echo'</div>';
          }



    
          public function addVisitor(){
            try {
                $pdo = $this->pdo;
                $now = date("Y-m-d");
                $d = date("Y");
                $m= date("m");
               // $member_id =  $_SESSION['member_id'];
                $user_id = $_SESSION['userid'];
                $membership_id = $_SESSION['membership_id'];
               // $receivedby = $_SESSION['email'] ;

               // $ProgrammeService = "";
                
                 $VisitorContact = filter_input(INPUT_POST, 'VisitorContact', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);
     $Fullname =strtoupper( filter_input(INPUT_POST, 'Fullname', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS));
      $ReasonJoin = filter_input(INPUT_POST, 'ReasonJoin', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS); 
     $PreviousChurch = filter_input(INPUT_POST, 'PreviousChurch', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);
     
     $Residence = filter_input(INPUT_POST, 'Residence', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);
     
     $comments = filter_input(INPUT_POST, 'comments', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);
     $dateOfVisit = filter_input(INPUT_POST, 'dateOfVisit', FILTER_UNSAFE_RAW,FILTER_SANITIZE_SPECIAL_CHARS);

     $country_of_birth = "233";
     $sms_format_1 = substr($VisitorContact, 1);
     $sms_format_1 = $country_of_birth.$sms_format_1;
   

     $fullnameRecords = $this->get_staff_fullname_detail_by_id_($user_id);

     $taken_by = $fullnameRecords['firstName']." ".$fullnameRecords['otherNames'];
     
                $stmt = $pdo ->prepare('INSERT INTO visitors(membership_id,name_of_visitor,contact,sms_contact,previous_church,residence,reason,date_of_visit,taken_by,commentsTaken) VALUES '
              . ' (:membership_id,:name_of_visitor,:contact,:sms_contact,:previous_church,:residence,:reason,:date_of_visit,:taken_by,:commentsTaken)');
         $stmt ->bindParam(':membership_id', $membership_id);
         $stmt ->bindParam(':name_of_visitor', $Fullname);
         $stmt ->bindParam(':contact', $VisitorContact);
         $stmt ->bindParam(':sms_contact', $sms_format_1);
         $stmt ->bindParam(':previous_church', $PreviousChurch);
         $stmt ->bindParam(':residence', $Residence);
         $stmt ->bindParam(':reason', $ReasonJoin);
         $stmt ->bindParam(':date_of_visit', $dateOfVisit);
         $stmt ->bindParam(':taken_by', $taken_by);
         $stmt ->bindParam(':commentsTaken', $comments); 
      
      
              if($stmt->execute()){


              $visitor_message = $this->get_visitor_message_template();


              // if(IS_ON_PRODUCTION==TRUE){

              //    $strUserName = "pat8-dunamis";
              //    $strPassword = "Rout123@";
              //    $strMessageType = "0";
              //    $strDlr = "1";
              //    $strMobile = $sms_format_1;
              //    $Sender = "PROPH-FIIFI";
                 
              //     $url = "http://rslr.connectbind.com" . "/bulksms/bulksms?username=" . $strUserName . "&password=" . $strPassword . "&type=" . $strMessageType . "&dlr=" 
              //     . $strDlr . "&destination=" . $strMobile . "&source=" . $Sender . "&message=" . $visitor_message . "";
                  
                  
              //   $url = preg_replace("/ /", "%20", $url);
              //   $output = file_get_contents($url);
                  
                  
                     
                  
              //     print_r($output);
                 
              //     }  




                $this->saveMessageac();
              //  echo "<script>window.location='pages/r?inv17ml4=members_payment_list'</script>";
                return true;
          
            }else{
                $this->msg = 'Event Failed.';
                return false;
            }   
                 
                 
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            } 
        }
        
        
    
       
public function allevnets(){
    try {
         $string_deleted = "NO";
         $membership_id = $_SESSION['membership_id'];
         $pos = $_SESSION['user_type']; 
         
        
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('SELECT event_id,name_of_program,slogan,attendance,date_recorded,comments FROM events_calendar WHERE membership_id = :membership_id AND deleted = :N_O_O');
            $stmt ->bindParam(':membership_id', $membership_id);
            $stmt ->bindParam(':N_O_O', $string_deleted);
            
            $stmt->execute();
           $data_ = $stmt ->fetchAll();
           foreach ($data_ as $row) {
               
               $name_of_program = $row['name_of_program']; 
               $slogan = $row['slogan']; 
               $attendance = $row['attendance']; 
               $comments = $row['comments']; 
               $date_recorded = $row['date_recorded']; 

               $human_readable = date("F jS, Y", strtotime($date_recorded));
               
              
             echo '<tr>' .
             '<td>' .
             $human_readable.
             '</td>' .
           '<td>' .
           $name_of_program.
           '</td>' .
           '<td>' .
           $attendance.
           '</td>' .
           '<td>' .
           $slogan.
           '</td>' .
           '<td>' .
           $comments.
           '</td>' .
           '<td>'.
           '<a  href="pages/r?id='.$row['event_id'] . '&inv17ml44=add_event_edit">'
                   . '<i class=" fas fa-edit"></i></a>'.'  '.
                     '<a  href="pages/r?id='.$row['event_id']. '&inv17ml44=add_event_delete" >'
                   . '<i class="fas fa-trash"></i></a>'.
            '</td>' .
            '</tr>';         
               
           }
        
         
      
  

}
catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}




public function allvisitors(){
    try {
         $string_deleted = "NO";
         $membership_id = $_SESSION['membership_id'];
         $pos = $_SESSION['user_type']; 
         
        
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('SELECT * FROM visitors WHERE membership_id = :membership_id AND deleted = :N_O_O');
            $stmt ->bindParam(':membership_id', $membership_id);
            $stmt ->bindParam(':N_O_O', $string_deleted);
            
            $stmt->execute();
           $data_ = $stmt ->fetchAll();
           foreach ($data_ as $row) {
               
               $name_of_visitor = $row['name_of_visitor']; 
               $contact = $row['contact']; 
               $residence = $row['residence']; 
              $reason = $row['reason']; 
               $date_recorded = $row['date_of_visit']; 

               $human_readable = date("F jS, Y", strtotime($date_recorded));
               
              
             echo '<tr>' .
             '<td>' .
             $human_readable.
             '</td>' .
           '<td>' .
           $name_of_visitor.
           '</td>' .
           '<td>' .
           $reason.
           '</td>' .
           '<td>' .
           $contact.
           '</td>' .
           '<td>' .
           $residence.
           '</td>' . 
           '<td>'.
           '<a  href="pages/r?id='.$row['id'] . '&inv17ml44=add_event_edit">'
                   . '<i class=" fas fa-edit"></i></a>'.'  '.
                     '<a  href="pages/r?id='.$row['id']. '&inv17ml44=add_event_delete" >'
                   . '<i class="fas fa-trash"></i></a>'.
            '</td>' .
            '</tr>';         
               
           }
        
         
      
  

}
catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

public function allvisitors_today(){
    try {
         $string_deleted = "NO";
         $membership_id = $_SESSION['membership_id'];
         $pos = $_SESSION['user_type']; 

         $now = date("Y-m-d");
         
        
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('SELECT * FROM visitors WHERE membership_id = :membership_id AND deleted = :N_O_O AND date_of_visit = :date_of_visit');
            $stmt ->bindParam(':membership_id', $membership_id);
            $stmt ->bindParam(':N_O_O', $string_deleted);
            $stmt ->bindParam(':date_of_visit', $now);
            
            $stmt->execute();
           $data_ = $stmt ->fetchAll();
           foreach ($data_ as $row) {
               
               $name_of_visitor = $row['name_of_visitor']; 
               $contact = $row['contact']; 
               $residence = $row['residence']; 
              $reason = $row['reason']; 
               $date_recorded = $row['date_of_visit']; 

               $human_readable = date("F jS, Y", strtotime($date_recorded));
               
              
             echo '<tr>' .
             '<td>' .
             $human_readable.
             '</td>' .
           '<td>' .
           $name_of_visitor.
           '</td>' .
           '<td>' .
           $reason.
           '</td>' .
           '<td>' .
           $contact.
           '</td>' .
           '<td>' .
           $residence.
           '</td>' . 
           
            '</tr>';         
               
           }
}
catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}


public function allvisitors_monthly(){
    try {
         $string_deleted = "NO";
         $membership_id = $_SESSION['membership_id'];
         $pos = $_SESSION['user_type']; 

         $now = date("Y-m-d");
         
        
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('SELECT * FROM visitors WHERE membership_id = :membership_id AND deleted = :N_O_O AND MONTH(date_of_visit) = MONTH(CURDATE()) AND YEAR(date_of_visit) = YEAR(CURDATE())');
            $stmt ->bindParam(':membership_id', $membership_id);
            $stmt ->bindParam(':N_O_O', $string_deleted);
           // $stmt ->bindParam(':date_of_visit', $now);
            
            $stmt->execute();
           $data_ = $stmt ->fetchAll();
           foreach ($data_ as $row) {
               
               $name_of_visitor = $row['name_of_visitor']; 
               $contact = $row['contact']; 
               $residence = $row['residence']; 
              $reason = $row['reason']; 
               $date_recorded = $row['date_of_visit']; 

               $human_readable = date("F jS, Y", strtotime($date_recorded));
               
              
             echo '<tr>' .
             '<td>' .
             $human_readable.
             '</td>' .
           '<td>' .
           $name_of_visitor.
           '</td>' .
           '<td>' .
           $reason.
           '</td>' .
           '<td>' .
           $contact.
           '</td>' .
           '<td>' .
           $residence.
           '</td>' . 
            
            '</tr>';         
               
           }
}
catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}


public function allvisitors_yearly(){
    try {
         $string_deleted = "NO";
         $membership_id = $_SESSION['membership_id'];
         $pos = $_SESSION['user_type']; 

         $now = date("Y-m-d");
         
        
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('SELECT * FROM visitors WHERE membership_id = :membership_id AND deleted = :N_O_O AND YEAR(date_of_visit) = YEAR(CURDATE())');
            $stmt ->bindParam(':membership_id', $membership_id);
            $stmt ->bindParam(':N_O_O', $string_deleted);
          //  $stmt ->bindParam(':date_of_visit', $now);
            
            $stmt->execute();
           $data_ = $stmt ->fetchAll();
           foreach ($data_ as $row) {
               
               $name_of_visitor = $row['name_of_visitor']; 
               $contact = $row['contact']; 
               $residence = $row['residence']; 
              $reason = $row['reason']; 
               $date_recorded = $row['date_of_visit']; 

               $human_readable = date("F jS, Y", strtotime($date_recorded));
               
              
             echo '<tr>' .
             '<td>' .
             $human_readable.
             '</td>' .
           '<td>' .
           $name_of_visitor.
           '</td>' .
           '<td>' .
           $reason.
           '</td>' .
           '<td>' .
           $contact.
           '</td>' .
           '<td>' .
           $residence.
           '</td>' . 
           
            '</tr>';         
               
           }
}
catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}



// ATTENDANCE 

public function allattendance_today(){
    try {
         $string_deleted = "NO";
         $membership_id = $_SESSION['membership_id'];
         $pos = $_SESSION['user_type']; 

         $now = date("Y-m-d");
         
        
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('SELECT * FROM events_calendar WHERE membership_id = :membership_id AND deleted = :N_O_O AND date_recorded = :date_of_visit');
            $stmt ->bindParam(':membership_id', $membership_id);
            $stmt ->bindParam(':N_O_O', $string_deleted);
            $stmt ->bindParam(':date_of_visit', $now);
            
            $stmt->execute();
           $data_ = $stmt ->fetchAll();
           foreach ($data_ as $row) {
               
               $name_of_program = $row['name_of_program']; 
               $attendance = $row['attendance']; 
               $taken_by = $row['taken_by'];  
               $date_recorded = $row['date_recorded']; 

               $human_readable = date("F jS, Y", strtotime($date_recorded));
               
              
             echo '<tr>' .
             '<td>' .
             $human_readable.
             '</td>' .
           '<td>' .
           $name_of_program.
           '</td>' .
           '<td>' .
           $attendance.
           '</td>' .
           '<td>' .
           $taken_by.
           '</td>' . 
           
            '</tr>';         
               
           }
}
catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}


public function all_attendance_monthly(){
    try {
         $string_deleted = "NO";
         $membership_id = $_SESSION['membership_id'];
         $pos = $_SESSION['user_type']; 

         $now = date("Y-m-d");
         
        
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('SELECT * FROM events_calendar WHERE membership_id = :membership_id AND deleted = :N_O_O AND MONTH(date_recorded) = MONTH(CURDATE()) AND YEAR(date_recorded) = YEAR(CURDATE())');
            $stmt ->bindParam(':membership_id', $membership_id);
            $stmt ->bindParam(':N_O_O', $string_deleted);
           // $stmt ->bindParam(':date_of_visit', $now);
            
            $stmt->execute();
           $data_ = $stmt ->fetchAll();
           foreach ($data_ as $row) {
               
            $name_of_program = $row['name_of_program']; 
            $attendance = $row['attendance']; 
            $taken_by = $row['taken_by'];  
            $date_recorded = $row['date_recorded']; 

            $human_readable = date("F jS, Y", strtotime($date_recorded));
            
           
          echo '<tr>' .
          '<td>' .
          $human_readable.
          '</td>' .
        '<td>' .
        $name_of_program.
        '</td>' .
        '<td>' .
        $attendance.
        '</td>' .
        '<td>' .
        $taken_by.
        '</td>' . 
        
         '</tr>';         
               
           }
}
catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}


public function all_attendance_yearly(){
    try {
         $string_deleted = "NO";
         $membership_id = $_SESSION['membership_id'];
         $pos = $_SESSION['user_type']; 

         $now = date("Y-m-d");
         
        
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('SELECT * FROM events_calendar WHERE membership_id = :membership_id AND deleted = :N_O_O AND YEAR(date_recorded) = YEAR(CURDATE())');
            $stmt ->bindParam(':membership_id', $membership_id);
            $stmt ->bindParam(':N_O_O', $string_deleted);
          //  $stmt ->bindParam(':date_of_visit', $now);
            
            $stmt->execute();
           $data_ = $stmt ->fetchAll();
           foreach ($data_ as $row) {
               
            $name_of_program = $row['name_of_program']; 
            $attendance = $row['attendance']; 
            $taken_by = $row['taken_by'];  
            $date_recorded = $row['date_recorded']; 

            $human_readable = date("F jS, Y", strtotime($date_recorded));
            
           
          echo '<tr>' .
          '<td>' .
          $human_readable.
          '</td>' .
        '<td>' .
        $name_of_program.
        '</td>' .
        '<td>' .
        $attendance.
        '</td>' .
        '<td>' .
        $taken_by.
        '</td>' . 
        
         '</tr>';         
               
           }
}
catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

// ATTENDANCE



public function todays_birthday(){
    try {
        $membership_id = $_SESSION['membership_id'];
        $string_deleted = "NO";
    $pdo = $this->pdo;
    $stmt = $pdo->prepare('SELECT other_name,first_name,dob FROM members WHERE MONTH(dob) = MONTH(CURDATE()) AND DAY(dob) = DAY(CURDATE()) AND membership_id = :membership_id AND deleted = :NO_');
    $stmt ->bindParam(':membership_id', $membership_id);
    $stmt ->bindParam(':NO_', $string_deleted);
    $stmt->execute();
   
    for($i=0; $row = $stmt->fetch(); $i++){

        $human_readable = date("F jS, Y", strtotime($row['dob']));
        
      
    
    echo '<tr>' .
    
    '<td>' .
    $human_readable .
    '</td>' .
    '<td>' .
    $row['other_name'] .' '.  $row['first_name'].
    '</td>' .
      '</tr>';
    
    }
    
    } catch (PDOException $exc) {
        echo "ERROR". $exc->getMessage();
    }
    }


    public function incoming_birthday(){
        try {
            $membership_id = $_SESSION['membership_id'];
            $string_deleted = "NO";
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT other_name,first_name,dob FROM members WHERE MONTH(dob) = MONTH(CURDATE()) AND membership_id = :membership_id AND deleted = :NO_');
        $stmt ->bindParam(':membership_id', $membership_id);
        $stmt ->bindParam(':NO_', $string_deleted);
        $stmt->execute();
       
        for($i=0; $row = $stmt->fetch(); $i++){
    
            $human_readable = date("F jS, Y", strtotime($row['dob']));
            
          
        
        echo '<tr>' .
        '<td>' .
        $human_readable .
        '</td>' .
        '<td>' .
        $row['other_name'] .' '.  $row['first_name'].
        '</td>' .
       
          '</tr>';
        
        }
        
        } catch (PDOException $exc) {
            echo "ERROR". $exc->getMessage();
        }
        }


        public function count_all_members(){
         
            try {

              
          
             if(is_null($this->pdo)){
                 $this->msg = 'Connection did not work out!';
                 return [];
             }else{
                // $user_id = $_SESSION['userid'];
                 $stirngdel = "NO";
                 $membership_id = $_SESSION['membership_id'];
               //  $string_deleted = "NO";
                 $pdo = $this->pdo;
                 $stmt = $pdo->prepare('SELECT COUNT(member_id) FROM members WHERE deleted = :del AND membership_id = :membership_id');
                // $stmt ->bindParam(':u_id', $user_id);
                 $stmt ->bindParam(':del', $stirngdel);
                 $stmt ->bindParam(':membership_id', $membership_id);
                 $stmt->execute();
                 $result = $stmt->fetch(); 
                 return $result['COUNT(member_id)']; 
             }
             
            } catch (\Throwable $th) {
             echo $th->getTraceAsString();
            }
         
         }


    
         public function count_all_members_males(){
         
            try {

              
          
             if(is_null($this->pdo)){
                 $this->msg = 'Connection did not work out!';
                 return [];
             }else{
                // $user_id = $_SESSION['userid'];
                 $stirngdel = "NO";
                 $gender = "Male";
                 $membership_id = $_SESSION['membership_id'];
               //  $string_deleted = "NO";
                 $pdo = $this->pdo;
                 $stmt = $pdo->prepare('SELECT COUNT(member_id) FROM members WHERE deleted = :del AND membership_id = :membership_id AND gender = :gender');
                // $stmt ->bindParam(':u_id', $user_id);
                 $stmt ->bindParam(':del', $stirngdel);
                 $stmt ->bindParam(':membership_id', $membership_id);
                 $stmt ->bindParam(':gender', $gender);
                 $stmt->execute();
                 $result = $stmt->fetch(); 
                 return $result['COUNT(member_id)']; 
             }
             
            } catch (\Throwable $th) {
             echo $th->getTraceAsString();
            }
         
         }


         public function count_all_members_females(){
         
            try {

              
          
             if(is_null($this->pdo)){
                 $this->msg = 'Connection did not work out!';
                 return [];
             }else{
                // $user_id = $_SESSION['userid'];
                 $stirngdel = "NO";
                 $gender = "Female";
                 $membership_id = $_SESSION['membership_id'];
               //  $string_deleted = "NO";
                 $pdo = $this->pdo;
                 $stmt = $pdo->prepare('SELECT COUNT(member_id) FROM members WHERE deleted = :del AND membership_id = :membership_id AND gender = :gender');
                // $stmt ->bindParam(':u_id', $user_id);
                 $stmt ->bindParam(':del', $stirngdel);
                 $stmt ->bindParam(':membership_id', $membership_id);
                 $stmt ->bindParam(':gender', $gender);
                 $stmt->execute();
                 $result = $stmt->fetch(); 
                 return $result['COUNT(member_id)']; 
             }
             
            } catch (\Throwable $th) {
             echo $th->getTraceAsString();
            }
         
         }


    // VISITORS
    public function count_all_visitors(){
         
        try {

          
      
         if(is_null($this->pdo)){
             $this->msg = 'Connection did not work out!';
             return [];
         }else{
            // $user_id = $_SESSION['userid'];
             $stirngdel = "NO";
             $membership_id = $_SESSION['membership_id'];
           //  $string_deleted = "NO";
             $pdo = $this->pdo;
             $stmt = $pdo->prepare('SELECT COUNT(id) FROM visitors WHERE deleted = :del AND membership_id = :membership_id');
            // $stmt ->bindParam(':u_id', $user_id);
             $stmt ->bindParam(':del', $stirngdel);
             $stmt ->bindParam(':membership_id', $membership_id);
             $stmt->execute();
             $result = $stmt->fetch(); 
             return $result['COUNT(id)']; 
         }
         
        } catch (\Throwable $th) {
         echo $th->getTraceAsString();
        }
     
     }



     public function count_all_visitors_this_month(){
     
        try {

          
      
         if(is_null($this->pdo)){
             $this->msg = 'Connection did not work out!';
             return [];
         }else{
            // $user_id = $_SESSION['userid'];
             $stirngdel = "NO";
             $gender = "Male";
             $membership_id = $_SESSION['membership_id'];
           //  $string_deleted = "NO";
             $pdo = $this->pdo;
             $stmt = $pdo->prepare('SELECT COUNT(id) FROM visitors WHERE deleted = :del AND membership_id = :membership_id AND MONTH(date_of_visit) = MONTH(CURDATE()) AND YEAR(date_of_visit) = YEAR(CURDATE())');
            // $stmt ->bindParam(':u_id', $user_id);
             $stmt ->bindParam(':del', $stirngdel);
             $stmt ->bindParam(':membership_id', $membership_id);
            // $stmt ->bindParam(':gender', $gender);
             $stmt->execute();
             $result = $stmt->fetch(); 
             return $result['COUNT(id)']; 
         }
         
        } catch (\Throwable $th) {
         echo $th->getTraceAsString();
        }
     
     }


     public function count_all_visitors_this_year(){
     
        try {

          
      
         if(is_null($this->pdo)){
             $this->msg = 'Connection did not work out!';
             return [];
         }else{
            // $user_id = $_SESSION['userid'];
             $stirngdel = "NO";
             $gender = "Female";
             $membership_id = $_SESSION['membership_id'];
           //  $string_deleted = "NO";
             $pdo = $this->pdo;
             $stmt = $pdo->prepare('SELECT COUNT(id) FROM visitors WHERE deleted = :del AND membership_id = :membership_id AND YEAR(date_of_visit) = YEAR(CURDATE())');
            // $stmt ->bindParam(':u_id', $user_id);
             $stmt ->bindParam(':del', $stirngdel);
             $stmt ->bindParam(':membership_id', $membership_id);
            // $stmt ->bindParam(':gender', $gender);
             $stmt->execute();
             $result = $stmt->fetch(); 
             return $result['COUNT(id)']; 
         }
         
        } catch (\Throwable $th) {
         echo $th->getTraceAsString();
        }
     
     }

    // VISITORS


    //////ADMINISTATOR METHODS
    
    


    public function count_all_events(){
         
        try {
      
         if(is_null($this->pdo)){
             $this->msg = 'Connection did not work out!';
             return [];
         }else{
             $user_id = $_SESSION['userid'];
             $stirngdel = "NO";
             $available = "AVAILABLE";
             $pdo = $this->pdo;
             $stmt = $pdo->prepare('SELECT COUNT(id) FROM tbl_rooms WHERE deleted = :del AND status = :AVAILABLE');
             $stmt ->bindParam(':AVAILABLE', $available);
             $stmt ->bindParam(':del', $stirngdel);
             $stmt->execute();
             $result = $stmt->fetch(); 
             return $result['COUNT(id)']; 
         }
         
        } catch (\Throwable $th) {
         echo $th->getTraceAsString();
        }
     
     }

     public function total_roll_call(){
         
        try {
      
         if(is_null($this->pdo)){
             $this->msg = 'Connection did not work out!';
             return [];
         }else{
             $user_id = $_SESSION['userid'];
             $stirngdel = "NO";
             $pdo = $this->pdo;
             $stmt = $pdo->prepare('SELECT COUNT(id) FROM tbl_bookings WHERE u_id = :u_id AND deleted = :del  AND DATE(book_date) BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE()');

          //   $stmt = $pdo->prepare('SELECT id,room_id,number_of_days,amount_charged,book_date,checkout_date,checkout_status FROM tbl_bookings WHERE deleted = :N_O_O
           //  AND u_id = :u_id  AND DATE(book_date) BETWEEN DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND CURDATE()  ORDER BY id DESC');
           
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

     public function total_member_appraisals(){
         
        try {
      
         if(is_null($this->pdo)){
             $this->msg = 'Connection did not work out!';
             return [];
         }else{
             $user_id = $_SESSION['userid'];
             $stirngdel = "NO";
             $pdo = $this->pdo;
             $stmt = $pdo->prepare('SELECT COUNT(id) FROM member_appraisal WHERE u_id = :u_id AND deleted = :del');
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

     public function total_member_rollcalls(){
         
        try {
      
         if(is_null($this->pdo)){
             $this->msg = 'Connection did not work out!';
             return [];
         }else{
             $user_id = $_SESSION['userid'];
             $stirngdel = "NO";
             $show_up = "1";
             $pdo = $this->pdo;
             $stmt = $pdo->prepare('SELECT COUNT(member_id) FROM roll_call WHERE u_id = :u_id AND show_up = :show_up AND deleted = :del');
             $stmt ->bindParam(':u_id', $user_id);
             $stmt ->bindParam(':show_up', $user_id);
             $stmt ->bindParam(':del', $stirngdel);
             $stmt->execute();
             $result = $stmt->fetch(); 
             return $result['COUNT(member_id)']; 
         }
         
        } catch (\Throwable $th) {
         echo $th->getTraceAsString();
        }
     
     }

     public function total_member_appraisals_count(){
         
        try {
      
         if(is_null($this->pdo)){
             $this->msg = 'Connection did not work out!';
             return [];
         }else{
             $user_id = $_SESSION['userid'];
             $stirngdel = "NO";
             $pdo = $this->pdo;
             $stmt = $pdo->prepare('SELECT COUNT(DISTINCT(member_id)) FROM member_appraisal WHERE u_id = :u_id AND deleted = :del');
             $stmt ->bindParam(':u_id', $user_id);
             $stmt ->bindParam(':del', $stirngdel);
             $stmt->execute();
             $result = $stmt->fetch(); 
             return $result['COUNT(DISTINCT(member_id))']; 
         }
         
        } catch (\Throwable $th) {
         echo $th->getTraceAsString();
        }
     
     }
 

    public function count_all_male_members(){
         
        try {
      
         if(is_null($this->pdo)){
             $this->msg = 'Connection did not work out!';
             return [];
         }else{
             $user_id = $_SESSION['userid'];
             $males = "Male";
             $stirngdel = "NO";
             $pdo = $this->pdo;
             $stmt = $pdo->prepare('SELECT COUNT(member_id) FROM members WHERE u_id = :u_id AND sex =:male AND deleted = :del');
             $stmt ->bindParam(':u_id', $user_id);
             $stmt ->bindParam(':male', $males);
             $stmt ->bindParam(':del', $stirngdel);
             $stmt->execute();
             $result = $stmt->fetch(); 
             return $result['COUNT(member_id)']; 
         }
         
        } catch (\Throwable $th) {
         echo $th->getTraceAsString();
        }
     
     }


   


     public function housesdropdown(){
        try {
    $string_deleted = "NO";
    $statusroom = "AVAILABLE";
    $user_id = $_SESSION['userid'];
       
      $pdo = $this->pdo;
      $stmt = $pdo->prepare('SELECT *  FROM tbl_rooms WHERE deleted = :N_O_O AND status = :statusroom');
     // $stmt ->bindParam(':u_id', $user_id);
      $stmt ->bindParam(':N_O_O', $string_deleted);
      $stmt ->bindParam(':statusroom', $statusroom);
    if($stmt->execute()){
     while ($row = $stmt ->fetch()){
       echo "<option value = '$row[id]'>"  .$row['room_no']." : ".$row['inter_com_no'] ."</option>";
                       
    }  
    return true;
    }else{
       return false;
    }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }


    public function houses_or_groups_members_in_bill_item(){
        try {
    $string_deleted = "NO";
    $user_id = $_SESSION['userid'];
       
      $pdo = $this->pdo;
      $stmt = $pdo->prepare('SELECT house_name,bill_item FROM member_bill WHERE u_id = :u_id AND deleted = :N_O_O');
      $stmt ->bindParam(':u_id', $user_id);
      $stmt ->bindParam(':N_O_O', $string_deleted);
    if($stmt->execute()){
     while ($row = $stmt ->fetch()){
       echo "<option value ='$row[house_name]_$row[bill_item]'>"  .$row['house_name']."_Billed Item : ".$row['bill_item']."</option>";
                       
    }  
    return true;
    }else{
       return false;
    }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }


    


    public function eventdropdown(){
        try {
    $string_deleted = "NO";
    $user_id = $_SESSION['userid'];
       
      $pdo = $this->pdo;
      $stmt = $pdo->prepare('SELECT name_of_program FROM events_calendar WHERE u_id = :u_id AND deleted = :N_O_O');
      $stmt ->bindParam(':u_id', $user_id);
      $stmt ->bindParam(':N_O_O', $string_deleted);
    if($stmt->execute()){
     while ($row = $stmt ->fetch()){
       echo "<option value = '$row[name_of_program]'>"  .$row['name_of_program'] ."</option>";
                       
    }  
    return true;
    }else{
       return false;
    }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }


    public function ranksdropdown(){
        try {
    $string_deleted = "NO";
    $user_id = $_SESSION['userid'];
       
      $pdo = $this->pdo;
      $stmt = $pdo->prepare('SELECT DISTINCT ranks FROM members WHERE u_id = :u_id AND deleted = :N_O_O');
      $stmt ->bindParam(':u_id', $user_id);
      $stmt ->bindParam(':N_O_O', $string_deleted);
    if($stmt->execute()){
     while ($row = $stmt ->fetch()){
       echo "<option value = '$row[ranks]'>"  .$row['ranks'] ."</option>";
                       
    }  
    return true;
    }else{
       return false;
    }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

     public function count_all_female_members(){
         
        try {
      
         if(is_null($this->pdo)){
             $this->msg = 'Connection did not work out!';
             return [];
         }else{
             $user_id = $_SESSION['userid'];
             $males = "Female";
             $stirngdel = "NO";
             $pdo = $this->pdo;
             $stmt = $pdo->prepare('SELECT COUNT(member_id) FROM members WHERE u_id = :u_id AND sex =:male AND deleted = :del');
             $stmt ->bindParam(':u_id', $user_id);
             $stmt ->bindParam(':male', $males);
             $stmt ->bindParam(':del', $stirngdel);
             $stmt->execute();
             $result = $stmt->fetch(); 
             return $result['COUNT(member_id)']; 
         }
         
        } catch (\Throwable $th) {
         echo $th->getTraceAsString();
        }
     
     }

  
   public function allcustomers(){
    try {
         $string_deleted = "NO";
         $user_id = $_SESSION['userid'];
         $pos = $_SESSION['user_type']; 

    if($pos=="Receptionist"){
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT id,fullname,contact,address FROM customers WHERE deleted = :N_O_O');
       // $stmt ->bindParam(':u_id', $user_id);
        $stmt ->bindParam(':N_O_O', $string_deleted);
        
        $stmt->execute();
       $data_ = $stmt ->fetchAll();
       foreach ($data_ as $row) {
     
        $fulname = $row['fullname'];
        $contact = $row['contact'];
        $address = $row['address'];

        //fa fa-times
        
        
          
          
         echo '<tr>' .
         '<td>' .
     $fulname.
     '</td>' .
       '<td>' .
       $contact.
       '</td>' . 
       '<td>' .
        $address .
        '</td>' . 
        '<td>'.
       '<a title=Edit-Info  href="pages/r?id='.$row['id'] . '&inv17ml44=add_members_new_edit">'
               . '<i class=" fas fa-edit"></i></a>'.' ||| '.
               '<a title=Book-Guest  href="pages/r?id='.$row['id']. '&inv17ml44=appraisal_add_member&guest_id_checkout='.$row['id'].' " >'
             . '<i class="fas fa-book"></i></a>'.
        '</tr>';         
//&guest_id_checkout='.$row['guest_id'].' " >'
       }
    }else{
        $pdo = $this->pdo;
        
        $stmt = $pdo->prepare('SELECT id,fullname,contact,address FROM customers WHERE deleted = :N_O_O');
      //  $stmt ->bindParam(':u_id', $user_id);
        $stmt ->bindParam(':N_O_O', $string_deleted);
        
        $stmt->execute();
       $data_ = $stmt ->fetchAll();
       foreach ($data_ as $row) {
     
        $fulname = $row['fullname'];
        $contact = $row['contact'];
        $address = $row['address'];
        
        
          
          
         echo '<tr>' .
         '<td>' .
     $fulname.
     '</td>' .
       '<td>' .
       $contact.
       '</td>' . 
       '<td>' .
        $address .
        '</td>' . 
        '<td>' .
        '</tr>';            
           
       }   

    }

 

}
catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}



public function checkoutguest(){
    try {
         $string_deleted = "NO";
         $user_id = $_SESSION['userid'];
         $pos = $_SESSION['user_type']; 

    if($pos=="Receptionist"){
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT id,fullname,contact,address FROM customers WHERE deleted = :N_O_O');
       // $stmt ->bindParam(':u_id', $user_id);
        $stmt ->bindParam(':N_O_O', $string_deleted);
        
        $stmt->execute();
       $data_ = $stmt ->fetchAll();
       foreach ($data_ as $row) {
     
        $fulname = $row['fullname'];
        $contact = $row['contact'];
        $address = $row['address'];

        //fa fa-times
        
        
          
          
         echo '<tr>' .
         '<td>' .
     $fulname.
     '</td>' .
       '<td>' .
       $contact.
       '</td>' . 
       '<td>' .
        $address .
        '</td>' . 
        '<td>'.
       '<a title=Edit-Info  href="pages/r?id='.$row['id'] . '&inv17ml44=add_members_new_edit">'
               . '<i class=" fas fa-edit"></i></a>'.' ||| '.
               '<a title=Book-Guest  href="pages/r?id='.$row['id']. '&inv17ml44=appraisal_add_member" >'
             . '<i class="fas fa-book"></i></a>'.' |||  '.
             '<a title=Checkout-Guest  href="pages/r?id='.$row['id']. '&inv17ml44=checkout_appraisal_add_member" >'
             . '<i class="fas fa-times"></i></a>'.
        '</td>' .
        '</tr>';         
           
       }
    }else{
        $pdo = $this->pdo;
        
        $stmt = $pdo->prepare('SELECT id,fullname,contact,address FROM customers WHERE deleted = :N_O_O');
      //  $stmt ->bindParam(':u_id', $user_id);
        $stmt ->bindParam(':N_O_O', $string_deleted);
        
        $stmt->execute();
       $data_ = $stmt ->fetchAll();
       foreach ($data_ as $row) {
     
        $fulname = $row['fullname'];
        $contact = $row['contact'];
        $address = $row['address'];
        
        
          
          
         echo '<tr>' .
         '<td>' .
     $fulname.
     '</td>' .
       '<td>' .
       $contact.
       '</td>' . 
       '<td>' .
        $address .
        '</td>' . 
        '<td>' .
        '</tr>';            
           
       }   

    }

 

}
catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}


   
public function allhouses(){
    try {
         $string_deleted = "NO";
         $user_id = $_SESSION['userid'];
          $pos = $_SESSION['user_type']; 
 
   if($pos=="Secretary"){
    $pdo = $this->pdo;
    $stmt = $pdo->prepare('SELECT id,house_name FROM assoc_houses WHERE u_id = :u_id AND deleted = :N_O_O');
    $stmt ->bindParam(':u_id', $user_id);
    $stmt ->bindParam(':N_O_O', $string_deleted);
    
    $stmt->execute();
   $data_ = $stmt ->fetchAll();
   foreach ($data_ as $row) {
       
       $full_name = $row['house_name']; 
       $sub_id = $row['id'];  
       
      
     echo '<tr>' .
   '<td>' .
   $sub_id.
   '</td>' .
   '<td>' .
   $full_name.
   '</td>' .
   '<td>'.
   '<a  href="pages/r?id='.$row['id'] . '&inv17ml44=add_houses_edit">'
           . '<i class=" fas fa-edit"></i></a>'.'  '.
             '<a  href="pages/r?id='.$row['id']. '&inv17ml44=add_houses_delete" >'
           . '<i class="fas fa-trash"></i></a>'.
    '</td>' .
    '</tr>';         
       
   }
   }else{
    $pdo = $this->pdo;
    $stmt = $pdo->prepare('SELECT id,house_name FROM assoc_houses WHERE u_id = :u_id AND deleted = :N_O_O');
    $stmt ->bindParam(':u_id', $user_id);
    $stmt ->bindParam(':N_O_O', $string_deleted);
    
    $stmt->execute();
   $data_ = $stmt ->fetchAll();
   foreach ($data_ as $row) {
       
       $full_name = $row['house_name']; 
       $sub_id = $row['id'];  
       
      
     echo '<tr>' .
   '<td>' .
   $sub_id.
   '</td>' .
   '<td>' .
   $full_name.
   '</td>' .
    '</tr>';         
       
   }
   }    

  

}
catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}






//  $stmt = $pdo->prepare('SELECT id,room_id,number_of_days,amount_charged,book_date,checkout_date,checkout_status FROM tbl_bookings WHERE deleted = :N_O_O
//AND u_id = :u_id  AND DATE(book_date) = :booking_today ORDER BY id DESC');

// public function count_incoming_birthday(){
//     try {
//         $user_id = $_SESSION['userid'];
//         $string_deleted = "NO";
//         $booking_today = date("Y-m-d");
//     $pdo = $this->pdo;
//     $stmt = $pdo->prepare('SELECT SUM(amount_charged) FROM tbl_bookings WHERE DATE(book_date) = :booking_today AND u_id = :u_id AND deleted = :NO_');
//     $stmt ->bindParam(':u_id', $user_id);
//     $stmt ->bindParam(':NO_', $string_deleted);
//     $stmt ->bindParam(':booking_today', $booking_today);
//     $stmt->execute();
//     $result = $stmt->fetch(); 
//     return $result['SUM(amount_charged)']; 
   
    
//     } catch (PDOException $exc) {
//         echo "ERROR". $exc->getMessage();
//     }
//     }







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


public function loadmemberforpritn(){
            try {
                 $string_deleted = "NO";
                 $user_id = $_SESSION['userid'];
            $billee = filter_input(INPUT_POST, 'house_name', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
            
            $_SESSION['grp'] = $billee;
           $pdo = $this->pdo;
  if($billee=="ALL MEMBERS"){
    $stmt = $pdo->prepare('SELECT  *  FROM members WHERE deleted = :N_O_O AND u_id =:u_id');
          
    $stmt ->bindValue(':N_O_O', $string_deleted);
    $stmt ->bindValue(':u_id', $user_id);
    $stmt->execute();
   $data_ = $stmt ->fetchAll();
   //$ldg_amt =  $this->g_grp_amount($billee);
   foreach ($data_ as $row) {
       
    //    $first_name = $row['first_name'];
    //    $last_name = $row['last_name'];
    //    $other_name = $row['other_name'];
    //    $full =$first_name." ".$last_name." ".$other_name;

    $fulname = $row['first_name'].' '.$row['other_name'].' '.$row['last_name'];
    $ranks = $row['ranks'];
    $tittles = $row['tittles'];
    if($tittles){
        $formatted = $ranks." "."(".$tittles.")"." ".$fulname;
    }else{
        $formatted = $ranks." ".$fulname;
    }
       $chr_grp = $row['house_name'];
     echo '<tr>' .
    '<td>' .
    $row['member_id'].
      '</td>' .
      '<td>' .
      $row['tittles'] .
      '</td>' .
    '<td>' .
    $formatted .
    '</td>' .
    '<td>' .
    $row['profession'] .
    '</td>' .
    '<td>' .
    $row['house_name'] .
    '</td>' .
    '<td>' .
    $row['phone_number'] .
    '</td>' .
    '</tr>';         
        }
  }else{
    $stmt = $pdo->prepare('SELECT first_name,last_name,other_name,house_name,phone_number,profession,ranks,member_id,tittles FROM members WHERE house_name = :chr_grp OR ranks =:chr_grp AND deleted = :N_O_O AND u_id =:u_id');
          
    $stmt ->bindValue(':N_O_O', $string_deleted);
    $stmt ->bindValue(':chr_grp', $billee);
    $stmt ->bindValue(':u_id', $user_id);
    $stmt->execute();
   $data_ = $stmt ->fetchAll();
  
   foreach ($data_ as $row) {
       
    // $first_name = $row['first_name'];
    // $last_name = $row['last_name'];
    // $other_name = $row['other_name'];
    // $full =$first_name." ".$last_name." ".$other_name;

    $fulname = $row['first_name'].' '.$row['other_name'].' '.$row['last_name'];
    $ranks = $row['ranks'];
    $tittles = $row['tittles'];
    if($tittles){
        $formatted = $ranks." "."(".$tittles.")"." ".$fulname;
    }else{
        $formatted = $ranks." ".$fulname;
    }

     echo '<tr>' .
    '<td>' .
    $row['member_id'].
       
    '</td>' .
    '<td>' .
    $row['tittles'] .
    '</td>' .
    '<td>' .
    $formatted .
    '</td>' .
    '<td>' .
    $row['profession'] .
    '</td>' .
    '<td>' .
    $row['house_name'] .
    '</td>' .
    '<td>' .
    $row['phone_number'] .
    '</td>' .
    '</tr>';         
       
   }
  }
} catch (Exception $exc) {
                echo $exc->getTraceAsString();}
}      

        
        public function loadmembers_rolecall(){
            try {
                 $string_deleted = "NO";
                 $user_id = $_SESSION['userid'];
            $billee = filter_input(INPUT_POST, 'house_name', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
            
            $_SESSION['grp'] = $billee;
           $pdo = $this->pdo;
  if($billee=="ALL MEMBERS"){
    $stmt = $pdo->prepare('SELECT * FROM members WHERE deleted = :N_O_O AND u_id =:u_id');
          
    $stmt ->bindValue(':N_O_O', $string_deleted);
    $stmt ->bindValue(':u_id', $user_id);
    $stmt->execute();
   $data_ = $stmt ->fetchAll();
   //$ldg_amt =  $this->g_grp_amount($billee);
   foreach ($data_ as $row) {
       
   // $fulname = $row['last_name'].' '.$row['first_name'];
       $chr_grp = $row['house_name'];
     //  $ranks = $row['ranks'];
     //  $tittles = $row['tittles'];
     //  $formatted = $ranks." "."(".$tittles.")"." ".$fulname;

     
       $fulname = $row['first_name'].' '.$row['other_name'].' '.$row['last_name'];
       $ranks = $row['ranks'];
       $tittles = $row['tittles'];
       if($tittles){
           $formatted = $ranks." "."(".$tittles.")"." ".$fulname;
       }else{
           $formatted = $ranks." ".$fulname;
       }

     echo '<tr>' .
    '<td>' .
    $row['member_id'].
        "<input type=hidden value=$row[member_id] name=member_id[] />".
      
    '</td>' .
    '<td>' .
    $formatted .
    '</td>' .
  
   '<td>' .
   "<label>Select Option</label> ".
   "<select name=attend[] required> <option > </option> <option value=Present>Present</option> <option value=Absent>Absent</option> <option value=Permission>Permission</option>
   <option value=Distance>Distance</option>
   <option value=Sick>Sick</option>
   <select>".
    '</td>' .
    '</tr>';         
       
   }
  }else{
    $stmt = $pdo->prepare('SELECT * FROM members WHERE house_name = :chr_grp AND deleted = :N_O_O AND u_id =:u_id');
          
    $stmt ->bindValue(':N_O_O', $string_deleted);
    $stmt ->bindValue(':chr_grp', $billee);
    $stmt ->bindValue(':u_id', $user_id);
    $stmt->execute();
   $data_ = $stmt ->fetchAll();
  
   foreach ($data_ as $row) {
       
   // $fulname = $row['last_name'].' '.$row['first_name'];
    $chr_grp = $row['house_name'];
   // $ranks = $row['ranks'];
   // $tittles = $row['tittles'];
   // $formatted = $ranks." "."(".$tittles.")"." ".$fulname;
   
    $fulname = $row['first_name'].' '.$row['other_name'].' '.$row['last_name'];
    $ranks = $row['ranks'];
    $tittles = $row['tittles'];
    if($tittles){
        $formatted = $ranks." "."(".$tittles.")"." ".$fulname;
    }else{
        $formatted = $ranks." ".$fulname;
    }


     echo '<tr>' .
    '<td>' .
    $row['member_id'].
        "<input type=hidden value=$row[member_id] name=member_id[] />".
       
    '</td>' .
    '<td>' .
    $fulname .
    '</td>' .
    '<td>' .
    "<label>Select Option</label> ".
    "<select name=attend[] required> <option > </option> <option value=Present>Present</option> <option value=Absent>Absent</option> <option value=Permission>Permission</option> 
    <option value=Distance>Distance</option>
    <option value=Sick>Sick</option>
    <select>".
    '</td>'  .
    '</tr>';         
       
   }
  }
} catch (Exception $exc) {
                echo $exc->getTraceAsString();}
}


public function view_members_attendance(){
    try {
         $string_deleted = "NO";
         $user_id = $_SESSION['userid'];
    $billee = filter_input(INPUT_POST, 'house_name', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
    
    $_SESSION['grp'] = $billee;
   $pdo = $this->pdo;
$stmt = $pdo->prepare('SELECT roll_call_id,member_id,show_up,comments,date_created FROM roll_call WHERE deleted = :N_O_O AND u_id =:u_id AND name_of_program =:dsd');
  
$stmt ->bindValue(':N_O_O', $string_deleted);
$stmt ->bindValue(':u_id', $user_id);
$stmt ->bindValue(':dsd', $billee);
$stmt->execute();
$data_ = $stmt ->fetchAll();
//$ldg_amt =  $this->g_grp_amount($billee);
foreach ($data_ as $row) {

$show_up = $row['show_up'];


$id_detail = $this->get_member_detail_by_id_($row['member_id']);

$fulname = $id_detail['first_name'].' '.$id_detail['other_name'].' '.$id_detail['last_name'];
$ranks = $id_detail['ranks'];
$tittles = $id_detail['tittles'];
if($tittles){
    $formatted = $ranks." "."(".$tittles.")"." ".$fulname;
}else{
    $formatted = $ranks." ".$fulname;
}

echo '<tr>' .
'<td>' .
$row['roll_call_id'].
'</td>' .
'<td>' .
$formatted.
'</td>' .

'<td>' .
$show_up.
'</td>' .
'<td>' .
$row['comments'].
'</td>' .
'<td>' .
$row['date_created'].
'</td>' .
'</tr>';         

}
 
} catch (Exception $exc) {
        echo $exc->getTraceAsString();}
}




public function view_members_ranks(){
    try {
         $string_deleted = "NO";
         $user_id = $_SESSION['userid'];
    $billee = filter_input(INPUT_POST, 'house_name', FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);
    
    $_SESSION['grp'] = $billee;
   $pdo = $this->pdo;
$stmt = $pdo->prepare('SELECT member_id,last_name,first_name,tittles FROM members WHERE deleted = :N_O_O AND u_id =:u_id AND ranks =:dsd');
  
$stmt ->bindValue(':N_O_O', $string_deleted);
$stmt ->bindValue(':u_id', $user_id);
$stmt ->bindValue(':dsd', $billee);
$stmt->execute();
$data_ = $stmt ->fetchAll();
//$ldg_amt =  $this->g_grp_amount($billee);
foreach ($data_ as $row) {
 
//$id_detail = $this->get_member_detail_by_id_($row['member_id']);
$fullname = $row['last_name'].' '.$row['first_name'];

echo '<tr>' .

'<td>' .
$row['member_id'].
'</td>' .
'<td>' .
$row['tittles'].
'</td>' .
'<td>' .
$fullname.
'</td>' .
'</tr>';         

}
 
} catch (Exception $exc) {
        echo $exc->getTraceAsString();}
}


public function IsChecked($chkname,$value)
{if(!empty($_POST[$chkname]))
{
 foreach($_POST[$chkname] as $chkval)
 {
if($chkval == $value)
 {return "PRESENT";}
            } } return "ABSENT";
}

public function insert_rolecall(){

   
              
    $member_id = $_POST["member_id"];
     $attend = $_POST["attend"];
     $user_id = $_SESSION['userid'];
$comments = $_POST["comments"];
$nameofprogram = $_POST["nameofprogram"];
$receivedby = $_SESSION['email'] ;
$total = count($member_id);
 


for ($i = 0; $i < $total; $i++) {
$now_now = date("Y-m-d");
$pdo = $this->pdo;
////$stmt = $pdo->prepare("DELETE FROM member_ledger WHERE member_id = '$member_id[$i]' AND house_name = '$ch[$i]' AND u_id = '$user_id' AND deleted = 'NO' AND YEAR(date_recorded) = YEAR(CURDATE()) LIMIT 1");
//$stmt->execute();
//$stmtt = $pdo ->prepare("INSERT INTO member_ledger(u_id,member_id,date_recorded,date_of_billing,fee_amount,house_name) VALUES ('$user_id','$member_id[$i]',NOW(),NOW(),'$ledger_amount[$i]','$ch[$i]')");
   
$stmtt = $pdo ->prepare("INSERT INTO roll_call(u_id,member_id,name_of_program,show_up,comments,created_by,date_created) VALUES ('$user_id','$member_id[$i]','$nameofprogram','$attend[$i]','$comments','$receivedby',NOW())");
$stmtt ->execute();

}
$this->saveMessageac();

}



public function insert_children(){

   
              
    $member_id =  $_SESSION['member_id'];
     $fullname = $_POST["fullname"];
     $user_id = $_SESSION['userid'];
$sex = $_POST["sex"];
$total = count($fullname);
 


for ($i = 0; $i < $total; $i++) {
$now_now = date("Y-m-d");
$pdo = $this->pdo;
////$stmt = $pdo->prepare("DELETE FROM member_ledger WHERE member_id = '$member_id[$i]' AND house_name = '$ch[$i]' AND u_id = '$user_id' AND deleted = 'NO' AND YEAR(date_recorded) = YEAR(CURDATE()) LIMIT 1");
//$stmt->execute();
//$stmtt = $pdo ->prepare("INSERT INTO member_ledger(u_id,member_id,date_recorded,date_of_billing,fee_amount,house_name) VALUES ('$user_id','$member_id[$i]',NOW(),NOW(),'$ledger_amount[$i]','$ch[$i]')");
   
$stmtt = $pdo ->prepare("INSERT INTO members_children(u_id,member_id,fullname,sex,date_created) VALUES ('$user_id','$member_id','$fullname[$i]','$sex[$i]',NOW())");
$stmtt ->execute();

}
$this->saveMessageac();

}


public function list_members_photos(){
    try {
      $user_id = $_SESSION['userid'];
         $string_deleted = "NO";
       $pdo = $this->pdo;
$stmt = $pdo->prepare('SELECT * FROM members WHERE deleted = :N_O_O AND u_id =:u_id');

$stmt ->bindParam(':N_O_O', $string_deleted);
$stmt ->bindParam(':u_id', $user_id);
$stmt->execute();
$data_ = $stmt ->fetchAll();  

foreach ($data_ as $row) {

    $fulname = $row['first_name'].' '.$row['other_name'].' '.$row['last_name'];
    $ranks = $row['ranks'];
    $tittles = $row['tittles'];
    if($tittles){
        $formatted = $ranks." "."(".$tittles.")"." ".$fulname;
    }else{
        $formatted = $ranks." ".$fulname;
    }

   $member_id = $row['member_id'];
  $img_url = $row['picture_url'];
  if($img_url){
      $img_confirm =$img_url;
  }else{
      $img_confirm = "avatar-1.jpg";
  }
   $root_url = $this->get_root_url().$img_confirm;
                  
  $img_urll =  "<img src=$root_url height=80 width-80 alt=Member Picture class=rounded-circle user-avatar-xxl>"; 
  echo '<tr>' .


'<td>' .
$member_id.
'</td>' .

'<td>' .
$img_urll.
'</td>' .

'<td>' .
$formatted.
'</td>' .
'<td>' .
'<a  href="pages/r?id=' . $row['member_id'] . '&inv17ml44=browse_member_photo" >'
   . 'BROWSE MEMBER PHOTO</a>'.'  '.
'</td>' .
 
'</tr>';         
   
}
} catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }}





    public function list_members_children(){
        try {
          $user_id = $_SESSION['userid'];
             $string_deleted = "NO";
           $pdo = $this->pdo;
    $stmt = $pdo->prepare('SELECT * FROM members WHERE deleted = :N_O_O AND u_id =:u_id');
    
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
       
      echo '<tr>' .
    '<td>' .
    $member_id.
    '</td>' .
    '<td>' .
    $formatted.
    '</td>' .
    '<td>' .
    '<a  href="pages/r?id=' . $row['member_id'] . '&inv17ml44=children_add_member" >'
       . 'ADD MEMBER CHILD / CHILDREN </a>'.'  '.
    '</td>' .
     
    '</tr>';         
       
    }
    } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }}



        public function list_members_for_individual(){
            try {
              $user_id = $_SESSION['userid'];
                 $string_deleted = "NO";
               $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT * FROM members WHERE deleted = :N_O_O AND u_id =:u_id');
        
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
           
          echo '<tr>' .
        '<td>' .
        $member_id.
        '</td>' .
        '<td>' .
        $formatted.
        '</td>' .
        '<td>' .
        '<a  href="pages/r?id=' . $row['member_id'] . '&inv17ml44=bill_add_member" >'
           . 'ADD BILL TO LEDGER </a>'.'  '.
        '</td>' .
         
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
             $user_id = $_SESSION['userid'];
             $member_id =   $_SESSION['member_id'];
           
             $stirngdel = "NO";
             $pdo = $this->pdo;
             $stmt = $pdo->prepare('SELECT member_id,last_name,first_name,house_number,phone_number FROM members WHERE u_id = :u_id AND deleted = :del AND member_id =:member_id');
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


     public function get_event_detail_by_id(){
         
        try {
      
         if(is_null($this->pdo)){
             $this->msg = 'Connection did not work out!';
             return [];
         }else{
             $user_id = $_SESSION['userid'];
             $member_id =   $_SESSION['member_id'];
           
             $stirngdel = "NO";
             $pdo = $this->pdo;
             $stmt = $pdo->prepare('SELECT event_id,name_of_program,slogan,venue,comments FROM events_calendar WHERE u_id = :u_id AND deleted = :del AND event_id =:member_id');
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

     public function get_all_member_detail_by_id(){
         
        try {
      
         if(is_null($this->pdo)){
             $this->msg = 'Connection did not work out!';
             return [];
         }else{
             $user_id = $_SESSION['userid'];
             $member_id =   $_SESSION['member_id'];
           
             $stirngdel = "NO";
             $pdo = $this->pdo;
             $stmt = $pdo->prepare('SELECT * FROM customers WHERE deleted = :del AND id =:member_id');
            // $stmt ->bindParam(':u_id', $user_id);
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



 


     public function get_appraisal_by_id(){
         
        try {
      
         if(is_null($this->pdo)){
             $this->msg = 'Connection did not work out!';
             return [];
         }else{
             $user_id = $_SESSION['userid'];
             $member_id =   $_SESSION['member_id'];
           
             $stirngdel = "NO";
             $pdo = $this->pdo;
             $stmt = $pdo->prepare('SELECT id,appraisal,date_recorded FROM member_appraisal WHERE u_id = :u_id AND deleted = :del AND id =:member_id');
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

     public function get_houses_detail_by_id(){
         
        try {
      
         if(is_null($this->pdo)){
             $this->msg = 'Connection did not work out!';
             return [];
         }else{
             $user_id = $_SESSION['userid'];
             $member_id =   $_SESSION['member_id'];
           
             $stirngdel = "NO";
             $pdo = $this->pdo;
             $stmt = $pdo->prepare('SELECT id,house_name FROM assoc_houses WHERE u_id =:u_id AND deleted = :del AND id =:member_id');
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



     public function get_tbl_organizationid(){
         
        try {
      
         if(is_null($this->pdo)){
             $this->msg = 'Connection did not work out!';
             return [];
         }else{
             $user_id = $_SESSION['userid'];
             //$member_id =   $_SESSION['member_id'];
           
             $stirngdel = "NO";
             $pdo = $this->pdo;
             $stmt = $pdo->prepare('SELECT * FROM tbl_organization WHERE u_id =:u_id AND deleted = :del ');
             $stmt ->bindParam(':u_id', $user_id);
              $stmt ->bindParam(':del', $stirngdel);
             // $stmt ->bindParam(':member_id', $member_id);
             $stmt->execute();
             $result = $stmt->fetch(); 
             return $result; 
         }
         
        } catch (\Throwable $th) {
         echo $th->getTraceAsString();
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


      public function members_appraisals_checkout(){
        try {
          $user_id = $_SESSION['userid'];
             $string_deleted = "NO";
             $member_id =   $_SESSION['member_id'];
             $checkout_status = "NO";
           $pdo = $this->pdo;
          // $accountant = new accountant();
    $stmt = $pdo->prepare('SELECT id,room_id,number_of_days FROM tbl_bookings WHERE deleted = :N_O_O AND u_id = :u_id
     AND id = :member_id AND checkout_status = :checkout_status LIMIT 1');
   
    $stmt ->bindParam(':N_O_O', $string_deleted);
    $stmt ->bindParam(':u_id', $user_id);
    $stmt ->bindParam(':member_id', $member_id);
    $stmt ->bindParam(':checkout_status', $checkout_status);
   // $stmt ->bindParam(':checkout_date', null);
    $stmt->execute();
   $data_ = $stmt ->fetch();  

   return $data_;
   } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }}


        public function get_all_uncheckout_guest(){
            try {
              $user_id = $_SESSION['userid']; 
                 $string_deleted = "NO"; 
                 $checkout_status = "NO"; 
               $pdo = $this->pdo; 
        $stmt = $pdo->prepare('SELECT id,guest_id,room_id,number_of_days,amount_charged,book_date,checkout_date,checkout_status FROM tbl_bookings WHERE deleted = :N_O_O
         AND u_id = :u_id  AND checkout_status = :checkout_status');
       
        $stmt ->bindParam(':N_O_O', $string_deleted); 
        $stmt ->bindParam(':u_id', $user_id); 
        $stmt ->bindParam(':checkout_status', $checkout_status); 
        $stmt->execute();
       $data_ = $stmt ->fetchAll();  
       
       foreach ($data_ as $row) {

        $guest_name = $this -> get_all_member_detail_by_id_($row['guest_id']);
        $full_name = $guest_name['fullname'];
           $room_id = $row['room_id'];
           $room_detail = $this->get_room_detail_by_id($room_id);
           $room_name = $room_detail['room_no'];

          $amount_charge = $row['amount_charged'];

           $amount_charge =  number_format($amount_charge, 2, '.', ',');
        
    
          echo '<tr>' .
          '<td>' .
          $full_name.
          '</td>' .
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
         $row['checkout_status'] .
          '</td>' .
    
         '<td>' . 
         $amount_charge.
          '</td>' .

          '<td>'.
                '<a title=Checkout-Guest  href="pages/r?id='.$row['id']. '&inv17ml44=checkout_appraisal_add_member&guest_id_checkout='.$row['guest_id'].' " >'
                . '<i class="fas fa-times"></i></a>'.
           '</td>' .
     
    '</tr>';         
           
       }
       } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }}

        public function bookings_last_30_days(){
            try {
              $user_id = $_SESSION['userid']; 
                 $string_deleted = "NO"; 
               $pdo = $this->pdo; 
        $stmt = $pdo->prepare('SELECT id,room_id,number_of_days,amount_charged,book_date,checkout_date,checkout_status FROM tbl_bookings WHERE deleted = :N_O_O
         AND u_id = :u_id  AND DATE(book_date) BETWEEN DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND CURDATE()  ORDER BY id DESC');
       
        $stmt ->bindParam(':N_O_O', $string_deleted); 
        $stmt ->bindParam(':u_id', $user_id); 
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
         

//$sql = "SELECT patient_id,date_sent FROM tbl_consulting WHERE doctor_id = '".$uid."' AND view_state = '".$dateview."' AND date_sent BETWEEN DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND CURDATE() ORDER BY date_sent DESC ";
   
public function bookings_today(){
            try {
              $user_id = $_SESSION['userid'];
              $now = date("Y-m-d");
                 $string_deleted = "NO"; 
               $pdo = $this->pdo; 
        $stmt = $pdo->prepare('SELECT id,room_id,number_of_days,amount_charged,book_date,checkout_date,checkout_status FROM tbl_bookings WHERE deleted = :N_O_O
         AND u_id = :u_id  AND DATE(book_date) = :booking_today ORDER BY id DESC');
       
        $stmt ->bindParam(':N_O_O', $string_deleted);
        $stmt ->bindParam(':booking_today', $now);
        $stmt ->bindParam(':u_id', $user_id); 
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
  

    public function members_appraisals(){
        try {
          $user_id = $_SESSION['userid'];
             $string_deleted = "NO";
             $member_id =   $_SESSION['guest_id_checkout'];
           $pdo = $this->pdo;
          // $accountant = new accountant();
    $stmt = $pdo->prepare('SELECT id,transaction_code,room_id,number_of_days,amount_charged,booking_type,book_date,checkout_date,checkout_status FROM tbl_bookings WHERE deleted = :N_O_O
     AND u_id = :u_id AND guest_id = :member_id ORDER BY id DESC');
   
    $stmt ->bindParam(':N_O_O', $string_deleted);
    $stmt ->bindParam(':u_id', $user_id);
    $stmt ->bindParam(':member_id', $member_id);
    $stmt->execute();
   $data_ = $stmt ->fetchAll();  
   
   foreach ($data_ as $row) {
       $room_id = $row['room_id'];
       $room_detail = $this->get_room_detail_by_id($room_id);
       $room_name = $room_detail['room_no'];
    

      echo '<tr>' .
   '<td>' .
   $room_name.
   '</td>' .
    '<td>' . 
  $row['number_of_days'].
    '</td>' .
    '<td>' . 
  $row['booking_type'].
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
     '<a  target=_blank href="pages/print_receipt?id=' . $row['transaction_code'] . '">'
     . '<i class="fas fa-print"></i></a>'.
      '</td>' .
 
'</tr>';         
       
   }
   } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }}
        
        

        public function members_children(){
            try {
              $user_id = $_SESSION['userid'];
                 $string_deleted = "NO";
                 $member_id =   $_SESSION['member_id'];
               $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT id,member_id,fullname,sex FROM members_children WHERE deleted = :N_O_O AND u_id = :u_id AND member_id = :member_id');
       
        $stmt ->bindParam(':N_O_O', $string_deleted);
        $stmt ->bindParam(':u_id', $user_id);
        $stmt ->bindParam(':member_id', $member_id);
        $stmt->execute();
       $data_ = $stmt ->fetchAll();  
       
       foreach ($data_ as $row) {
           $member_id = $row['member_id'];
           $id_detail = $this->get_member_detail_by_id_($member_id);
           $fullname = $id_detail['first_name'].' '.$id_detail['last_name'];
        
    
          echo '<tr>' .
       '<td>' .
       $fullname.
       '</td>' .
        '<td>' . 
      $row['fullname'].
        '</td>' .
      
       '<td>' . 
       $row['sex'] .
        '</td>' .
        // '<td>'.
        // '<a  href="pages/r?id='.$row['id'] . '&inv17ml44=appraisal_edit_member">'
        //         . '<i class=" fas fa-edit"></i></a>'.'  '.
        //           '<a  href="pages/r?id='.$row['id']. '&inv17ml44=appraisal_delete_member" >'
        //         . '<i class="fas fa-trash"></i></a>'.
        //  '</td>' .
    '</tr>';         
           
       }
       } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }}     



            public function get_organizational_logo(){
         
                try {
              
                 if(is_null($this->pdo)){
                     $this->msg = 'Connection did not work out!';
                     return [];
                 }else{
                     $user_id = $_SESSION['userid'];
                     $stirngdel = "NO";
                     $pdo = $this->pdo;
                     $stmt = $pdo->prepare('SELECT upload_logo_url FROM tbl_organization WHERE u_id = :u_id AND deleted = :del');
                     $stmt ->bindParam(':u_id', $user_id);
                     $stmt ->bindParam(':del', $stirngdel);
                     $stmt->execute();
                     $result = $stmt->fetch(); 
                     return $result['upload_logo_url']; 
                 }
                 
                } catch (\Throwable $th) {
                 echo $th->getTraceAsString();
                }
             
             }  


        public function password_encrypt($password) {
            $hash_format = "$2y$10$";
            $salt_length = 132;
            $salt = $this->generate_salt($salt_length);
            $format_and_salt = $hash_format . $salt;
            $hash = crypt($password, $format_and_salt);
            return $hash;
        }
        
        public function generate_salt($length) {
            $unique_random_string = md5(uniqid(mt_rand(), true));
            $base64_string = base64_encode($unique_random_string);
            $modified_base64_string = str_replace('+', '.', $base64_string);
            $salt = substr($modified_base64_string, 0, $length);
            return $salt;
        }
        
        public function password_check($password, $existing_hash) {
            $hash = crypt($password, $existing_hash);
            if ($hash === $existing_hash) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        
        public function recordsMessage(){
            echo  '<div class="alert alert-info">';
            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
             echo '<strong><i class="icon-pen icon-large"></i>&nbsp;Record Information Successfully Saved,Thank You</strong>';
               echo'</div>';
         }
    
    
    



      
      
 public function _some_ego($time_ago){
           try {
               $cur_time 	= time();
$time_elapsed 	= $cur_time - $time_ago;
$seconds 	= $time_elapsed ;
$minutes 	= round($time_elapsed / 60 );
$hours 		= round($time_elapsed / 3600);
$days 		= round($time_elapsed / 86400 );
$weeks 		= round($time_elapsed / 604800);
$months 	= round($time_elapsed / 2600640 );
$years 		= round($time_elapsed / 31207680 );
// Seconds
if($seconds <= 60){
	$ego  = "$seconds seconds ago";
}
//Minutes
else if($minutes <=60){
	if($minutes==1){
		$ego  = "one minute ago";
	}
	else{
		$ego  = "$minutes minutes ago";
	}
}
//Hours
else if($hours <=24){
	if($hours==1){
		$ego  = "an hour ago";
	}else{
		$ego  = "$hours hours ago";
	}
}
//Days
else if($days <= 7){
	if($days==1){
		$ego  = "yesterday";
	}else{
		$ego  = "$days days ago";
	}
}
//Weeks
else if($weeks <= 4.3){
	if($weeks==1){
		$ego  = "a week ago";
	}else{
		$ego  = "$weeks weeks ago";
	}
}
//Months
else if($months <=12){
	if($months==1){
		$ego  = "a month ago";
	}else{
		$ego  = "$months months ago";
	}
}
//Years
else{
	if($years==1){
		$ego  ="one year ago";
	}else{
		$ego  = "$years years ago";
	}
}
return $ego;
}
catch (Exception $exc) {
               echo $exc->getTraceAsString();
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
 
}
