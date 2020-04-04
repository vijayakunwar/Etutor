<?php
$servername = "localhost";//replace servername if required on other patform. db=database
$dbUsername = "root";  // replace to jc account ?
$dbPassword ="";  //replace to jc account ?
$dbName ="etutor";

$conn = mysqli_connect($servername,$dbUsername,$dbPassword,$dbName);

if(!$conn){
    die("Connection failed".mysqli_connect_error()); //check if the connection is successful
}
