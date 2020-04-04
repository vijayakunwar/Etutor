
<?php 
session_start();
?>
<?php include('../private/header.php');?>


<?php include('../db_connection.php');?>

<?php 
    
    function h($string="") {
    return htmlspecialchars($string);
    }
    //make the database connection
    $conn = db_connect();

    $u_ID = $_SESSION['userIDFN'];

    //display tutor detail with course html 
    //i used subject ID here becuase my database design let me  not to dispay tutor and student name same time
   
    $sql = "SELECT user.user_Fname as TutorFname , user.user_Lname as TutorLname,tutor.tutor_ID as tutorID , tutor.tutor_rate as tutorRate , user.user_Email as userEmail ,user.user_Image as userImage, subject.subject_Name as subjectName from user, tutor, subject where user.user_ID = '$u_ID' and tutor.user_ID = user.user_ID";
    
    $result = mysqli_query($conn, $sql);
    //$datas = array(); //emplty array to store query result

    //query to find the booking or new student request for tutor ID = 1

    $sql2 ="SELECT user.user_ID as UID,student.student_ID as newstudentID , user.user_Fname as Student_Name , tutor.tutor_ID as tutor,subject.subject_Name as SubjectEnroll from user, tutor,student,subject, book where tutor.tutor_ID = 1 and book.tutor_ID = tutor.tutor_ID and book.student_ID= student.student_ID and student.user_ID = user.user_ID and subject.tutor_ID = tutor.tutor_ID";

    $result2 = mysqli_query($conn,$sql2);

    //select list of student for tutor with ID 1
    $sql3 ="SELECT student.student_ID as studentID , user.user_Fname as studentFname , user.user_Lname as studentLname ,user.user_Image as userImage,subject.subject_Name as SubjectEnroll,subject.subject_length as subjectLength, tutor.tutor_rate as tutorRate from user, tutor,student,subject, book where tutor.tutor_ID = 1 and book.tutor_ID = tutor.tutor_ID and book.student_ID= student.student_ID and student.user_ID = user.user_ID and subject.tutor_ID = tutor.tutor_ID";

    $result3 = mysqli_query($conn,$sql3);

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

            
                <?php 

                $row = mysqli_fetch_assoc($result);   ?> 

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
                      <b> Subject:</b> <?php echo $row["subjectName"]; ?> <br>
                      <b> Tuition Rate:</b> <?php echo '$'. h($row['tutorRate']); ?>  <br>
                
               

                </div>
                <div class="col-6">
                        <hr class="my-4">
                        <p><a href="#" class="text-white bg-dark"><h3>New Student Request</h3></a></p>
                        
                        
                
                        <table class="table table-dark">
                                <thead>
                                  <tr>
                                    <th scope="col">User ID</th>
                                    <th scope="col">St ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Update</th>
                                    
                                  </tr>
                                </thead>

                                

                                <tbody>
                                    <?php while($row2 = mysqli_fetch_assoc($result2)) { ?> 

                                          <tr>
                                            <td scope="row"><?php echo h($row2['UID']); ?></th>
                                            <td ><?php echo h($row2['newstudentID']); ?></th>
                                            <td><?php echo h($row2['Student_Name']); ?></td>
                                            <td><?php echo h($row2['SubjectEnroll']); ?></td>
                                            <td>
                                          <?php  
                                          echo "<td>
                                                      <a href=\"edit.php?id=$row2[newstudentID]\"> edit</a>
                                                        |
                   <a href=\"delete.php?id=$row2[UID]\" onClick=\"return confirm('are u sure to delete data?')\">Delete</a>
                                          </td>";
                                              
                                              ?>

                                            </td>
                                          </tr>
                                     <?php } 
                                        //mysqli_close($conn);
                                       ?>
                                  
                                </tbody>
                              </table>
                    
                        
                </div>
            </div>
            
        </div> <!-- end of jumbotron container-->

    </div>
            
         <div class="container">
            <h3> Student List</h3> 
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
            
             


            <div class="container border border-dark">
              <?php while($row3 = mysqli_fetch_assoc($result3)) { ?> 
                    <div class="row text-center ">
                            <div class="col-6  d-flex justify-content-center">
                             <!--   <img src="../assets/img/car1_web.jpg" class="img-fluid" alt="Responsive image"  >  -->
                             <?php 
                        echo  ' <img src = ../assets/img/'. h($row3['userImage'].' height = 200 width = 150 >'); 
                    ?>
                    

                            </div>
                            <div class="col-6">
                                <p><a href="#" class="text-white bg-dark"><h3>Student ID : <?php echo h($row3['studentID']);?></h3></a></p>
                                <h4>Student Name : <?php echo h($row3['studentFname']." ".$row3['studentLname']);?></h4>
                                <h4>Subject Enroll: <?php echo h($row3['SubjectEnroll']);?></h4>
                                <h4>Total hour of lesson : <?php echo h($row3['subjectLength']);?></h4>
                                <h4>Tuition Rate: <?php echo h($row3['tutorRate']);?> </h4>
                             <!--   <h4>Start Date : 01/01/2019</h4>
                                <h4>End Date : 30/12/2019</h4> -->
                                                               
                                <a class="btn btn-danger btn-lg" href="" role="button"> <i class="fa fa-times fa-lg"></i> </a>
                                <a class="btn btn-primary btn-lg" href="" role="button"> <i class="fa fa-envelope fa-lg"></i> </a>
                                <a class="btn btn-primary btn-lg" href="" role="button"> <i class="fa fa-comments fa-lg"></i> </a>
                                <a class="btn btn-primary btn-lg" href="" role="button"> <i class="fa fa-folder-open fa-lg"></i> </a>
                                
                                
                            </div>
                            
                          
                    </div>
            </div>
                
            <hr class="my-4">

        <?php } 
            mysqli_close($conn);
        ?>
                
            
             
                    
  <?php include('../private/footer.php'); ?>