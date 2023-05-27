<?php
session_start();
#Pie Chart
  function con_con (){
   $hostdb = "localhost";  // MySQl host
   $userdb = "grup_asoc";  // MySQL username
   $passdb = "group_assoc_db_#2019";  // MySQL password
   $namedb = "group_assoc_db";  // MySQL database name

   // Establish a connection to the database
   $dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);
   if ($dbhandle->connect_error) {
  	exit("There was an error with your connection: ".$dbhandle->connect_error);
   }
   
   return $dbhandle;
  } 
   $dbcon = con_con(); 
   $user_id = $_SESSION['userid'];
   $Females = "Female";
   $Male = "Male";
   $stirngdel = "NO";
   $query = "SELECT sex,COUNT(id)  FROM members WHERE u_id = '$user_id' AND deleted = '$stirngdel' GROUP BY sex";
   
        $result = $dbcon->query($query) or exit("Error code ({$dbcon->errno}): {$dbcon->error}");
       $rows['type'] = 'bar';
     
$rows['name'] = 'Gender Population Chart'; 
        while($r = mysqli_fetch_array($result)) {
             $rows['data'][] = array($r['sex'], $r['COUNT(id)']);
               $rows['categories'] = array($r['sex']);
        } 
        
  
           
        $rslt = array();
array_push($rslt,$rows); 
print json_encode($rslt, JSON_NUMERIC_CHECK);

