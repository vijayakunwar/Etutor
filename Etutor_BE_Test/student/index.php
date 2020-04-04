<?php 
session_start();

?>
<?php include('../private/header.php'); ?>

<?php include('../db_connection.php');?>

<?php 
    
    function h($string="") {
    return htmlspecialchars($string);
    }
    

    # code...
    $conn = db_connect();
    $u_ID = $_SESSION['userIDFN'];

    //display tutor detail with course html 
    //i used subject ID here becuase my database design let me  not to dispay tutor and student name same time
   


    $sql = "select student.student_ID , user.user_Fname,user.user_Lname, user.user_Email,user.user_Image from user, student where user.user_ID = '$u_ID' and user.user_ID = student.user_ID";
    
    $result = mysqli_query($conn, $sql);

    

    $sql2 = "SELECT distinct tutor.tutor_ID as tutorID,tutor.tutor_rate as subjectRate ,subject.subject_Name as subjectName,subject_length as tuitionHour,book_Date as bookDate from student,book, tutor,user,subject where user.user_ID = $u_ID and student.student_ID = book.student_ID and book.tutor_ID = tutor.tutor_ID and book.tutor_ID = subject.tutor_ID; ";


    
/*
    $sql2 = "SELECT subject.subject_Name as subjectName, tutor.tutor_rate as subjectRate,subject.subject_length as tuitionHour from user,tutor, subject, book where user.user_ID = $u_ID and user.user_ID = tutor.user_ID and tutor.tutor_ID = subject.tutor_ID and tutor.tutor_ID = book.book_ID  "; 
     */

    $result2 = mysqli_query($conn, $sql2);
    



    //make the database connection
    

    

?>
        
            <!-- jumbotron-->
        <div class="jumbotron text-center ">
             <?php while($row = mysqli_fetch_assoc($result)) { ?> 

            <h1 class="display-5">User ID: <?php echo($u_ID." ");?><?php echo h($row['user_Fname']." ".$row['user_Lname']);?> Dashboard  </h1>
            
            <hr class="my-4">
            <p><a href="#" class="text-white bg-dark"><h3>Student Detail</h3></a></p>
          
          

            <?php 
                        echo  ' <img src = ../assets/img/'. h($row['user_Image'].' height = 200 width = 150 />'); 
                    
                    ?>
            
            <br>
            <br>
              
              <b>  Name:</b> <?php echo h($row['user_Fname']." ".$row['user_Lname']);?> <br>
                <b>Student Id:</b> <?php echo h($row['student_ID']); ?><br>
                <b>Student Email:</b> <?php echo h($row['user_Email']); ?> <br>  
                <hr class="my-4">

            <?php } ?>

            
        </div> <!-- end of jumbotron container-->
            
         <div class="container">
            <h3> Subject List</h3> 
        </div>

            <div class="container ">
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <button type="button" class="btn btn-secondary">show more</button>
                            
                          
                            <div class="btn-group" role="group">
                              <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sort
                              </button>
                              <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="#">By start Date</a>
                                <a class="dropdown-item" href="#">By level</a>
                                <a class="dropdown-item" href="#">By commence date</a>

                              </div>
                            </div>
                          </div> 

                       
            </div>
            
             
             <?php while($row2 = mysqli_fetch_assoc($result2)) { ?> 
           
            <div class="container border border-dark">


                    <div class="row text-center ">
                            <div class="col-6  d-flex justify-content-center">
                                <img src="../assets/img/car1_web.jpg" class="img-fluid" alt="Responsive image"  >
                            </div>
                            <div class="col-6">
                                <p><a href="#" class="text-white bg-dark"><h3>Course_1 Name</h3></a></p>
                                
                                <h4>Subject : <?php echo h($row2['subjectName']);?></h4>
                                <h4>Tutor ID : <?php echo h($row2['tutorID']);?></h4>
                                <h4>Tuition Rate : <?php echo h($row2['subjectRate']);?></h4>
                                <h4>Total hour of lesson : <?php echo h($row2['tuitionHour']);?></h4>
                                <h4>Book Date : <?php echo h($row2['bookDate']);?></h4>
                                
                                
                                <a class="btn btn-primary btn-lg" href="" role="button">Course Page <i class="fa fa-graduation-cap fa-lg"></i></a>
                                
                                
                            </div>
                            
                          
                    </div>
            </div>
                
            <hr class="my-4">
            <?php }
                mysqli_close($conn);
            ?>
                
                       
     <?php  include('../private/footer.php');?>       
                    
  
        