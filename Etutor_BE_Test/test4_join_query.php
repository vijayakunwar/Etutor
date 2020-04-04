
<?php require_once('db_connection.php'); ?>


<?php 

	//make the database connection
	$conn = db_connect();

	//display message if database cannot be connected
	confirm_db_connect();

	$sql = "SELECT user.user_ID  , user.user_Fname  , tutor.tutor_ID  , subject.subject_Name from user, tutor, book,subject where book.book_ID = 1 and book.tutor_ID = tutor.tutor_ID and tutor.user_ID = user.user_ID and subject.tutor_ID = tutor.tutor_ID";
	
	$result = $conn -> query($sql);

	if ($result -> num_rows > 0) {
	 //to access to result we normally use for loop
		 while($row = $result -> fetch_assoc()){
	 		 echo $row["user_ID"] ." --".$row["user_Fname"]."--".$row["tutor_ID"]."--".$row["subject_Name"]."<br>" ;
		 }
	}
	else {
 	echo "<p>Something is wrong.</p>";
	}
	// close the connection after output data
	db_disconnect($conn);
	echo 'data bse disconnecteed';

?>