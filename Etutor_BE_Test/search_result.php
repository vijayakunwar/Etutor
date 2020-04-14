<?php session_start(); ?> 
<?php include('header.php'); ?>
<?php include('db_connection.php');?>
<?php 
    
    function h($string="") {
    return htmlspecialchars($string);
    }
    //make the database connection
    $conn = db_connect();

    // send from form select    
    $select_subject = $_POST['subject'];
    $select_mode = $_POST['mode'];
    $select_gender = $_POST['gender'];

 
     $sql = "SELECT subject.subject_Name as subjectName, tutor.tutor_Location as location,user.user_Fname as tutorName,user.user_Image as userImage,tutor.tutor_rate as tuitionPrice,tutor.tutor_Mode as tuitionMode from tutor, subject,user where tutor.tutor_ID = subject.tutor_ID and user.user_ID=tutor.user_ID 
            and subject.subject_Name = ? and tutor.tutor_Mode =? and user.user_Gender=? ";   
        
  //no secure form of mysqli connection and queries susciptle to sql injection attack

    $stmt = $conn -> prepare($sql) ;
    // sss --> must be in small case and number of 's' must equal to number of parameter
    // each parameter value is used in sql statement
    // sss number is equal to number of ?
    $stmt-> bind_param('sss',$select_subject,$select_mode,$select_gender ) ; 
    $stmt-> execute();
    $stmt-> store_result();  

   $stmt-> bind_result($subject,$location,$tutorname,$userimage,$price,$tutormode );

    while ($stmt->fetch()) {
           # code...
        echo "<br/> Subject: ".$subject ;
        echo "<br/> Location: ".$location ;
        echo "<br/> Tutor name: ".$tutorname ;
        echo "<br/> User Image: ".$userimage ;
        echo "<br/> Tutition Price: ".$price ;
        echo "<br/> Tuttion Mode: ".$tutormode ;
       }   
    

?>
<!-- jumbotron-->
            <div class="jumbotron text-center ">
            <h1 class="display-5">FIND A TUTOR</h1>
            
            <hr class="my-4">

            <form action="search_result.php" method = "post">
                <div class="form-row">
                    <div class="col-sm">
                        Subject
                        <!-- <select name="Subject[]" class="form-control">-->
                        <select name="subject" class="form-control">
                            <option value="all" >All Subject</option>
                            <option value="html">Html</option>
                            <option value="javascript">javascript</option>
                            <option value="css3">CSS3 </option>
                            
                        </select>
                    </div>
                    <div class="col-sm">
                        Delivery
                        <select name="mode" class = "form-control">
                            <option value="all"> All </option>
                            <option value="distance"> distance</option>
                            <option value="onsite"> onsite</option>
                            
                        </select>
                    </div>
                    <div class="col-sm">
                        Gender
                        <select name="gender" class = "form-control">
                            <option value="all" > All </option>
                            <option value="female"> Female</option>
                            <option value="male"> Male</option>
                            
                        </select>

                    </div> 
                </div>
                <input type = 'submit' name = 'submit' value = submit class="btn btn-primary btn-lg" href="" role="button">
            </form>
            
            <hr class="my-4">
            <!-- AJAX call even for -->
            
            
            </div> <!-- end of jumbotron container-->
      
    <?php 
                

                mysqli_close($conn);
            ?>


            
     

  <?php include('footer.php');?>

  