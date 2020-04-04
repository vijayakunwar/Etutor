<?php
//define constants for connection info
define("MYSQLUSER","root");
define("MYSQLPASS","");
define("HOSTNAME","localhost");
define("MYSQLDB","etutor");
//make connection to database
function db_connect()
{
$conn = @new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);
if($conn -> connect_error) {
die('Connect Error: ' . $conn -> connect_error);
}
return $conn;
}
//make the database connection
$conn = db_connect();
echo "data base connected". "<br>";

$sql = "select * from user";
$result = $conn -> query($sql);
//display data from database
if ($result -> num_rows > 0) {
 //to access to result we normally use for loop
 while($row = $result -> fetch_assoc()){
 $firstNname = $row['user_Fname'];
 $lastName = $row['user_Lname'];
 $userName = $row['user_Email'];
 $userType = $row['user_Type'];
 $userGender = $row['user_Gender'];
 $userPhone = $row['user_Phone'];
 $userAge = $row['user_Age'];
 $userDOB = $row['user_DOB'];
 $userPayType = $row['user_Pay_Type'];

 echo "Welcome ". $firstNname . " ". $lastName. "<br>" ;
// echo "<p>Welcome <b>$des!</b></p>";
 //who to echo all item from fetch array using loop
 echo "Your detail obtained by etutor system are as follows :" ;
 echo $firstNname . "<br>";
 echo $lastName. "<br>";
 echo $userName. "<br>";
 echo $userType. "<br>";
 echo $userGender. "<br>";
 echo $userPhone. "<br>";
 echo $userAge. "<br>";
 echo $userDOB. "<br>";
 echo $userPayType. "<br>";
 }
}
else {
 echo "<p>Something is wrong.</p>";
}
// close the connection after output data
mysqli_close($conn);

?>