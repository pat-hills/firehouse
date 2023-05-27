<?php
require_once './../../../pdoconn/chartcon.php';
   $user_id = $_SESSION['userid'];
   $membership_id = $_SESSION['membership_id'];
   $user_type = $_SESSION['user_type'];
   $income = "Income";
   $expense = "Expense";
   $stirngdel = "NO";
   $dbcon = con_con(); 
 
       
   if($user_type=="Administrator" || $user_type=="Resident Pastor"){

        $query1 = "SELECT payment_date,SUM(amount) FROM fee_payments WHERE membership_id = '$membership_id' AND deleted = '$stirngdel' 
        AND YEAR(payment_date) = YEAR(CURDATE()) GROUP BY payment_date";

   }else{

        $query1 = "SELECT payment_date,SUM(amount) FROM fee_payments WHERE membership_id = '$membership_id' AND deleted = '$stirngdel' 
        AND user_id = '$user_id' AND YEAR(payment_date) = YEAR(CURDATE()) GROUP BY payment_date";
   }
   $result1 = $dbcon->query($query1) or exit("Error code ({$dbcon->errno}): {$dbcon->error}");
 $rows1['type'] = 'line';
     
 $rows1['name'] = 'Payments Received Chart'; 
        while($r1 = mysqli_fetch_array($result1)) {
             $rows1['data'][] = array($r1['payment_date'], $r1['SUM(amount)']);
              // $rows1['categories'] = array($r1['month_created']);
               $rows1['categories'] = array($r1['SUM(amount)']);
        } 
        
           
        $rslt = array();
//array_push($rslt,$rows); 
array_push($rslt,$rows1);
print json_encode($rslt, JSON_NUMERIC_CHECK);

       