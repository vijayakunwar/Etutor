<?php include('header.php'); ?>
<?php include('db_connection.php');?>
<?php 
    
    function h($string="") {
    return htmlspecialchars($string);
    }
    //make the database connection
    $conn = db_connect();

    //display tutor detail with course html 
    //i used subject ID here becuase my database design let me  not to dispay tutor and student name same time
   
    $sql = 'select user.user_Fname as TutorFame, user.user_Lname as TutorLname,user.user_Gender as Gender,subject.subject_Name as subjectName, tutor.tutor_ID as tutorID tutor.tutor_Mode as tuitionMode ,tutor.tutor_rate as Price,user.user_Email as userEmail  from user,subject, tutor where tutor.tutor_ID = 1 and user.user_ID = tutor.tutor_ID and tutor.tutor_ID = subject.tutor_ID';
    
    $result = mysqli_query($conn, $sql);
    //$datas = array(); //emplty array to store query result
   

?>
     


        <?php  

       

        while($row = mysqli_fetch_assoc($result))   

        print_r($FILE);

        {  ?> 

            <!-- jumbotron-->
            <div class="jumbotron text-center "  >
            <h1 class="display-5">TUTOR: <?php echo h($row['TutorName']);?> PROFILE  </h1>
            
            <hr class="my-4">

            
            <div class="container  ">
                    <div class="row text-center ">
                            <div class="col-6  d-flex justify-content-center">
                                <img src="assets/img/car1_web.jpg"  height="100%" width="100%">
                            </div>
                            <div class="col-6 ">
                                <h3> Tutor Name: <?php echo h($row['TutorName']." ".$row['TutorLname']);?>  </h3> 
                                <h3>Gender: <?php echo h($row['Gender']);?></h3>
                                <h3>Tutor Id : <?php echo h($row['tutorID']);?></h3>
                                <h3>Tutoring medium: <?php echo h($row['tuitionMode']);?></h3>
                                <H3>Subject :   <?php echo h($row['subjectName']);?></H3>
                                <h3>Email: <?php echo h($row['userEmail']);?></h3>
                               <h3>Rate: <?php echo h($row['Price']);?>$/hr </h3>
                               
                                            
                                <a class="btn btn-success btn-lg" href="" role="button">Book tutor <i class="fa fa-shopping-cart fa-lg"></i></a>
                                
                                                            
                            </div>
                                                 
                    </div>
                    <div class="row text-center">
                            <div class="col-6">
                                    <p class="text-primary font-italic">Review : 1 </p> 
                                    <div class="container">
                                            <p> 
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown 
                                                    printer took a galley of type and scrambled it to make a type specimen book 
                                                    </p>
                                    </div>
                            </div>
                    </div>
                    <div class="row text-center">
                            <div class="col-6">
                                    <p class="text-primary font-italic">Review : 2</p> 
                                    <div class="container">
                                            <p> 
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown 
                                                    printer took a galley of type and scrambled it to make a type specimen book 
                                                    </p>
                                    </div>

                            </div>
                    </div>
            </div>
            <hr class="my-4">
            
            
            </div> <!-- end of jumbotron container-->

            <?php }
        
                mysqli_close($conn);
            ?>

<?php include('footer.php'); ?>