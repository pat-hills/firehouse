<?php 

session_start();
#Pie Chart
function con_con (){
    $hostdb = "localhost";  // MySQl host
    $userdb = "root";  // MySQL username
    $passdb = "";  // MySQL password
    $namedb = "fire_house";  // MySQL database name
 
    // Establish a connection to the database
    $dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);
    if ($dbhandle->connect_error) {
       exit("There was an error with your connection: ".$dbhandle->connect_error);
    }
    
    return $dbhandle;
   }



?>