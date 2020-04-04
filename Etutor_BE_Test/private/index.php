<?php 

session_start();

include('header.php'); ?>


<!--
    <div class="container">
      
    </div>
  -->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../assets/img/car1_web.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Become a Tutor</h5>
            <p>Share Knowledge and Earn.</p>
            <a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../assets/img/car2_web.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Are you looking for tutor !!</h5>
            <p>Our platform aims to connect best tutor to you.</p>
            
            <a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../assets/img/car3_web.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Become a Tutor</h5>
            <p>Share Knowledge and Earn.</p>
            <a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../assets/img/car4_web.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Are you looking for tutor !!</h5>
            <p>Our platform aims to connect best tutor to you.</p>
            <a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
            
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
   

    
    <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->
      
      <div class="container marketing">
          <div class="row text-center">
              <p><a href="#" class="text-white bg-dark"><h3>How it works</h3></a></p>
          </div>

          <!-- Three columns of text below the carousel -->
          <div class="row">
            <div class="col-lg-4">
              <img class="rounded-circle" src="assets/img/car1_web.jpg" alt="Generic placeholder image" width="140" height="140">
              <h2>Student</h2>
              <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
              <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
              <img class="rounded-circle" src="assets/img/car2_web.jpg" alt="Generic placeholder image" width="140" height="140">
              <h2>Tutor</h2>
              <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
              <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
              <img class="rounded-circle" src="assets/img/car3_web.jpg" alt="Generic placeholder image" width="140" height="140">
              <h2>Subjects</h2>
              <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
              <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
          </div><!-- /.row -->
  
          

          <!-- START THE FEATURETTES -->
  
          <hr class="featurette-divider">
          <div class="row text-center">
              <p><a href="#" class="text-white bg-dark"><h3>featurette</h3></a></p>
          </div>
  
          <div class="row featurette">
            <div class="col-md-7">
              <h2 class="featurette-heading">Experts tutor. <span class="text-muted">Most of them are univeristy lecturer.</span></h2>
              <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            </div>
            <div class="col-md-5">
              <img class="featurette-image img-fluid mx-auto" src="assets/img/car4_web.jpg" alt="Generic placeholder image">
            </div>
          </div>
  
          <hr class="featurette-divider">
  
          <div class="row featurette">
            <div class="col-md-7 order-md-2">
              <h2 class="featurette-heading">24/7 access to Tutor, <span class="text-muted">on your prefer method of learning</span></h2>
              <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            </div>
            <div class="col-md-5 order-md-1">
              <img class="featurette-image img-fluid mx-auto" src="assets/img/car3_web.jpg" alt="Generic placeholder image">
            </div>
          </div>
  
  
          <hr class="featurette-divider">
  
          <!-- /END THE FEATURETTES -->
<?php include('footer.php'); ?>