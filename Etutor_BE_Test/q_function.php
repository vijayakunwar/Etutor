<?php require_once('db_connection.php'); ?>
<?php 

$conn = db_connect();

  function find_Tutor() {
    

    $sql = "SELECT user.user_ID  , user.user_Fname  , tutor.tutor_ID  , subject.subject_Name from user, tutor, book,subject where book.book_ID = 1 and book.tutor_ID = tutor.tutor_ID and tutor.user_ID = user.user_ID and subject.tutor_ID = tutor.tutor_ID";
    //echo $sql;
    //$result = mysqli_query($sql);

	$result = $conn -> query($conn,$sql);
    confirm_result_set($result);
    return $result;
  }

?>