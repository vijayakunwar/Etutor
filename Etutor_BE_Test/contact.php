<?php include('header.php'); ?>


<?php
    
    
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $message = $_POST['message'];
        $subject = $_POST['subject'];
        $email = $_POST['email'];

        //info of this file 
        var_dump($_FILES);
        

                
        $mailto = "vijaya.kunwar@my.jcu.edu.au";
        //who the mail is from:
        $headers = "From: ". $email;
        $txt = "You have received email from  ".$name. ".\n\n".$message;

        mail($mailto,$subject,$text,$headers);

               
    }
?>

    <!-- jumbotron-->
    <div class="jumbotron text-center ">
            <h1 class="display-5">CONTACT US</h1>
            
            <hr class="my-4">
            <p>We aim helping student to get higher grade.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">How it Works</a>
            
          </div>


<div class="container">
    <!-- contact form-->
    
    <section class="mb-4">

            <!--Section heading-->
            <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
            <!--Section description-->
            <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
                a matter of hours to help you.</p>
        
            <div class="row">
        
                <!--Grid column-->
                <div class="col-md-9 mb-md-0 mb-5">

                    <?php if ($msg != "") echo "$msg<br><br>"; ?>
                    <form method="post" id="contact-form" name="contact-form" action="contact.php"  enctype="multipart/form-data">
        
                        <!--Grid row-->
                        <div class="row">
        
                            
                            <!--Grid column-->
                                <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="name" name="name" class="form-control">
                                    <label for="name" class="">Your name</label>
                                </div>
                            </div>
                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="email" name="email" class="form-control">
                                    <label for="email" class="">Your email</label>
                                </div>
                            </div>
                            <!--Grid column-->
        
                        </div>
                        <!--Grid row-->
        
                        <!--Grid row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <input type="text" id="subject" name="subject" class="form-control">
                                    <label for="subject" class="">Subject</label>
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->
        
                        <!--Grid row-->
                        <div class="row">
        
                            <!--Grid column-->
                            <div class="col-md-12">
        
                                <div class="md-form">
                                    <textarea type="text" id="message" name="message" rows="5" class="form-control md-textarea"></textarea>
                                    <label for="message">Your message</label>
                                </div>
        
                            </div>
                        </div>
                        <!--Grid row-->       
                    
                    
        
                    <div class="text-center text-md-left">
                        
                        <!--<a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a> -->
                        <input type="submit"  name="submit" value="Send Email" class="btn btn-primary" >
                    </div>

                     </form>   

                    <div class="status"></div>
                </div>
                <!--Grid column-->      
                
        
            </div>
        
    </section>
        
</div>

<div class="container">
        
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3540.0787657807837!2d153.0275444!3d-27.4668071!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b915a1d064dcb2f%3A0x7f3aed61f0bfd9e3!2sJames%20Cook%20University%2C%20Brisbane%20Campus!5e0!3m2!1sen!2sau!4v1566542977382!5m2!1sen!2sau" 
      width=100% height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</div>


   <?php include('footer.php'); ?>