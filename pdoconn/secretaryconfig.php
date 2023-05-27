<?php
//session_start();
 define('conStringsecretary', 'mysql:host=localhost;dbname=taugscsf_vbcidunamis');
 define('dbUsersecretary', 'taugscsf_vbcidunamis');
 define('dbPasssecretary', 'x.O&cuR0Ts[.');



// define('conStringsecretary', 'mysql:host=localhost;dbname=fire_house');
// define('dbUsersecretary', 'root');
// define('dbPasssecretary', '');

 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$secretary = new Secretary();
$secretary->dbConnect(conStringsecretary, dbUsersecretary, dbPasssecretary);

 

 