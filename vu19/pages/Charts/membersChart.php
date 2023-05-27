<?php
require_once './../../../pdoconn/chartcon.php';
   $user_id = $_SESSION['userid'];
   $membership_id = $_SESSION['membership_id'];
   $user_type = $_SESSION['user_type'];
   $income = "Income";
   $expense = "Expense";
   $stirngdel = "NO";
   $dbcon = con_con(); 
 
       
   //if($user_type=="Administrator"){

        $query1 = "SELECT gender,COUNT(member_id) FROM members WHERE membership_id = '$membership_id' AND deleted = '$stirngdel' GROUP BY gender";

 //  }
   $result1 = $dbcon->query($query1) or exit("Error code ({$dbcon->errno}): {$dbcon->error}");
 $rows1['type'] = 'pie';
     
 $rows1['name'] = 'Members Population Chart'; 
        while($r1 = mysqli_fetch_array($result1)) {
             $rows1['data'][] = array($r1['gender'], $r1['COUNT(member_id)']);
              // $rows1['categories'] = array($r1['month_created']);
               $rows1['categories'] = array($r1['COUNT(member_id)']);
        } 
        
           
        $rslt = array();
//array_push($rslt,$rows); 
array_push($rslt,$rows1);
print json_encode($rslt, JSON_NUMERIC_CHECK);

       