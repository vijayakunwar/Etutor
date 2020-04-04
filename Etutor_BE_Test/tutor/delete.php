<?php

include_once('../db_connection.php');
$conn = db_connect();
//getting id from the url


	$id= $_GET['UID'];
	
//deleting the row from table// need to use inner join
	$result=mysqli_query($conn,"DELETE FROM user WHERE user_ID= $id");

//redirecting to home page
	header("Location: index.php ");



?>
