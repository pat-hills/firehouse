<?php
//session_start();
 define('conString', 'mysql:host=localhost;dbname=taugscsf_vbcidunamis');
 define('dbUser', 'taugscsf_vbcidunamis');
 define('dbPass', 'x.O&cuR0Ts[.');

// define('conString', 'mysql:host=localhost;dbname=fire_house');
// define('dbUser', 'root');
// define('dbPass', '');

 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$user = new User();
$user->dbConnect(conString, dbUser, dbPass);

 

 