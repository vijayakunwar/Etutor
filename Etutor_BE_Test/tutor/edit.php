
<?php include('../private/header.php');?>


<?php include('../db_connection.php');?>

<?php 
    
    function h($string="") {
    return htmlspecialchars($string);
    }
    //make the database connection
    $conn = db_connect();

    //display tutor detail with course html 
    //i used subject ID here becuase my database design let me  not to dispay tutor and student name same time
   
    $sql = "SELECT distinct user.user_ID as tutorID , user.user_Fname as TutorFname , user.user_Lname as TutorLname,tutor.tutor_ID as tutorID , subject.subject_Name as SubjectTutor,tutor.tutor_rate as tutorRate , user.user_Email as userEmail ,user.user_Image as userImage from user, tutor, book,subject where subject.subject_ID = 1 and book.tutor_ID = tutor.tutor_ID and tutor.user_ID = user.user_ID and subject.tutor_ID = tutor.tutor_ID";
    
    $result = mysqli_query($conn, $sql);
    //$datas = array(); //emplty array to store query result

    //query to find the booking or new student request for tutor ID = 1

    
?>

<?php
//echo "hello ";
	
	if (isset($_POST['update'])) {
		# code...
		$uid= mysqli_real_escape_string($conn,$_POST['UID']);
		$sid = mysqli_real_escape_string($con, $_POST['newstudentID']);
		$sname = mysqli_real_escape_string($con,$_POST['Student_Name']);
		$subject=mysqli_real_escape_string($con,$_POST['SubjectEnroll']);

		// checking empty fields
		if( empty($sname || empty($subject))) {	
				
						
			if(empty($sname)) {
				echo "<font color='red'>student name field is empty.</font><br/>";
			}
			if(empty($subject)) {
				echo "<font color='red'>subject field is empty.</font><br/>";
			}		
		}else{

			//updating the table
	$resutl=mysqli_query($conn,"UPDATE subject SET subject_Name='$subject' WHERE student_ID=$sid ");
			
			//redirectig to the display page. In our case, it is index.php
			header("Location: index.php");
		}


	}
	
?>
<?php
	//getting id from url
	$id = $_GET['id'];

	//selectig data with reference to the id
	$result = mysqli_query($conn,"SELECT * FROM user WHERE user_ID=$id");

	while($res=mysqli_fetch_array($result)) {
		# code...
		$name= $res['user_Fname'];
		$age=$res['user_Lname'];
		$email=$res['user_Email'];
	}

?>


        <div class="container">

        
            <!-- jumbotron-->
        <div class="jumbotron text-center ">
                <h1 class="display-5">Tutor Dashboard</h1>
            <div class="row">
                
                <div class="col-6">
                    
            
                    <hr class="my-4">
                    <p><a href="#" class="text-white bg-dark"><h3>Tutor Detail</h3></a></p>
                  <!--  <i class="fa fa-user fa-5x"></i> -->

            
                <?php while($row = mysqli_fetch_assoc($result)) { ?> 

                    <?php 
                        echo  ' <img src = ../assets/img/'. h($row['userImage'].' height = 200 width = 150'); 
                    ?> 
                    
                    <br>

                  <br>
                    <!--<?php print_r($row); ?> -->
                       <!-- Name: ABC XYZ <br> -->
                      <b> User ID: </b> <?php echo h($row['tutorID']); ?><br>
                       <b>Tutor Name:</b> <?php echo h($row['TutorFname']." ".$row['TutorLname']);  ?><br>
                      <!--  Tutor Id : ET123456<br> -->
                      <b>Tutor ID : </b><?php echo h($row["tutorID"]); ?><br>
                     <b>  Tutor Email:</b> <?php echo h($row["userEmail"]); ?><br>
                      <b> Subject:</b> <?php echo $row["SubjectTutor"]; ?> <br>
                      <b> Tuition Rate:</b> <?php echo '$'. h($row['tutorRate']); ?>  <br>
                
               <?php } 

                //mysqli_close($conn);
               ?>

                </div>
                <div class="col-6">
                        <hr class="my-4">
                        <p><a href="#" class="text-white bg-dark"><h3>Student Record</h3></a></p>
                        
                        <form action="edit.php" method="post" name="form1">
							<table class="table table-dark" >
								<tr>
									<td>Student Fname:</td>
									<td><input type="text" name="name" value="<?php echo $name; ?> "></td>
								</tr>
								<tr>
									<td>Student Lname:</td>
									<td><input type="text" name="age" value="<?php echo $age;?> "></td>
								</tr>
								<tr>
									<td>student Email</td>
									<td><input type="text" name="email" value="<?php echo $email;?> "></td>
								</tr>
								<tr>
									<!--<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?> ></td> -->
									<!-- <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
									<td><input type="submit" name="update" value="UPDATE"></td> -->

								<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
									<td><input type="submit" name="update" value="Update"></td>

								</tr>
							</table>
	</form>
                
                        
                        
                </div>
            </div>
            
        </div> <!-- end of jumbotron container-->

    

        <?php 
            mysqli_close($conn);
        ?>
                
            
             
                    
  <?php include('../private/footer.php'); ?>