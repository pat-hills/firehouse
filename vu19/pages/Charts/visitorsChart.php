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

        $query1 = "SELECT date_of_visit,COUNT(id) FROM visitors WHERE membership_id = '$membership_id' AND deleted = '$stirngdel' GROUP BY date_of_visit";

 //  }
   $result1 = $dbcon->query($query1) or exit("Error code ({$dbcon->errno}): {$dbcon->error}");
 $rows1['type'] = 'line';
     
 $rows1['name'] = 'Visitors Population Chart'; 
        while($r1 = mysqli_fetch_array($result1)) {
             $rows1['data'][] = array($r1['date_of_visit'], $r1['COUNT(id)']);
              // $rows1['categories'] = array($r1['month_created']);
               $rows1['categories'] = array($r1['COUNT(id)']);
        } 
        
           
        $rslt = array();
//array_push($rslt,$rows); 
array_push($rslt,$rows1);
print json_encode($rslt, JSON_NUMERIC_CHECK);

       