<?php
//define constants for connection info
define("MYSQLUSER","root");
define("MYSQLPASS","");
define("HOSTNAME","localhost");
define("MYSQLDB","etutor");
//make connection to database

function db_connect() {
    $connection = mysqli_connect(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);
    confirm_db_connect();
    return $connection;
  }

function confirm_db_connect() {
    if(mysqli_connect_errno()) {
      $msg = "Database connection failed: ";
      $msg .= mysqli_connect_error();
      $msg .= " (" . mysqli_connect_errno() . ")";
      exit($msg);
    }
  }

 function confirm_result_set($result_set) {
    if (!$result_set) {
    	exit("Database query failed.");
    }
  } 

function db_disconnect($connection) {
    if(isset($connection)) {
      mysqli_close($connection);
    }
  }

?>