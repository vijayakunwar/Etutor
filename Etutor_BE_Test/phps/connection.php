<?php
$servername = "localhost";//replace servername if required on other patform. db=database
$dbUsername = "root";  // replace to jc account ?
$dbPassword ="";  //replace to jc account ?
$dbName ="etutor";

$conn = mysqli_connect($servername,$dbUsername,$dbPassword,$dbName);

if(!$conn){
    die("Connection failed".mysqli_connect_error()); //check if the connection is successful
}
else {
    echo "Welcome! You are now in study elite club!";
    echo"you page will redirect after 3 seconds...";
   // header('Refresh:3;  URL= http://localhost/test/Etutor-front%20end%20design/login.php?');//refreash page
    header('Refresh:3;  URL= ../login.php?');
}