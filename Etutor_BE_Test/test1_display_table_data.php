
<?php

//https://www.php.net/manual/en/mysqli-result.fetch-assoc.php 

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


$sql = "select user_Fname,user_Lname,user_Email from user";
$result = $conn -> query($sql);
//display data from database
if ($result -> num_rows > 0) {
 //to access to result we normally use for loop
 while($row = $result -> fetch_assoc()){
 

 echo "Welcome ". $row["user_Fname"] . " ". $row["user_Lname"]. $row["user_Email"] ;

 }
}
else {
 echo "<p>Something is wrong.</p>";
}
// close the connection after output data
mysqli_close($conn);

?>