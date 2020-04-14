<?php session_start(); ?> 
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
   
    
    $sql = "SELECT subject.subject_Name as subjectName, tutor.tutor_Location as location,user.user_Fname as tutorName,user.user_Image as userImage,tutor.tutor_rate as tuitionPrice,tutor.tutor_Mode as tuitionMode  from tutor, subject,user where tutor.tutor_ID = subject.tutor_ID and user.user_ID=tutor.user_ID ";


    
    $result = mysqli_query($conn, $sql);
    //$datas = array(); //emplty array to store query result

    

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
        

            <div class="container ">
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <button type="button" class="btn btn-secondary">show more</button>
                            
                          
                            <div class="btn-group" role="group">
                              <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sort
                              </button>
                              <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="#">By Price</a>
                                <a class="dropdown-item" href="#">By Reviews</a>
                                <a class="dropdown-item" href="#">By Rating</a>

                              </div>
                            </div>
                          </div> 

                       
            </div>
             


            <div class="container border border-dark">


                <?php 


while($row = mysqli_fetch_assoc($result)) 

    { 
        ?> 
                    <div class="row text-center  ">
                           

                            <div class="col-6  d-flex justify-content-center "> 
                                

                              
                              
     <?php                         
                    echo  ' <img src = assets/img/'. h($row['userImage'].' class="img-fluid" alt="Responsive image" height = 200 width = 150>'); 
                    /*
                         class="img-fluid" ---> to maintain aspect ratio
                    */
                        
          ?>              

                                                 
                            
                            </div>
                            


                            <div class="col-6">
                                <h3> <?php echo h($row['tutorName']);?></h3> 
                                <i class="fa fa-star fa-lg"></i>
                                            <i class="fa fa-star fa-lg"></i>
                                            <i class="fa fa-star fa-lg"></i>
                                            <i class="fa fa-star fa-lg"></i>
                                            <i class="fa fa-star-half-o fa-lg"></i> 
                                            <p class="text-primary font-italic">15 Reviews</p>        
                                <h4>tag: <?php echo h($row['subjectName']);?></h4>
                                <h3> <?php echo h($row['tuitionPrice']);?></h3>
                                <h3> <?php echo h($row['tuitionMode']);?></h3>
                                <h3> <?php echo h($row['location']);?></h3>
                                <a class="btn btn-success btn-lg" href="book.php" role="button">Book tutor <i class="fa fa-shopping-cart fa-lg"></i></a>
                                <p> 
                                Learn more about tutor. 
                                </p>
                                
                                <a class="btn btn-primary btn-lg" href="profile.php" role="button">Profile <i class="fa fa-info fa-lg"></i></a>
                                
                                
                            </div>


                            
                          
                    </div>
            
                </div>
            <hr class="my-4">
      
    <?php }
                

                mysqli_close($conn);
            ?>


            
     

  <?php include('footer.php');?>

  