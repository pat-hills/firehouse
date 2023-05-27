<?php
//session_start();
 define('conStringaccountant', 'mysql:host=localhost;dbname=taugscsf_vbcidunamis');
 define('dbUseraccountant', 'taugscsf_vbcidunamis');
 define('dbPassaccountant', 'x.O&cuR0Ts[.');




// define('conStringaccountant', 'mysql:host=localhost;dbname=fire_house');
// define('dbUseraccountant', 'root');
// define('dbPassaccountant', '');

 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$accountant = new Accountant();
$accountant->dbConnect(conStringaccountant, dbUseraccountant, dbPassaccountant);

 

 