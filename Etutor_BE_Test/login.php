<?php include('header.php'); ?>
    
            
    
    <div class="containertext-center ">

        <div class="row ">
            <div class=" offset-md-4 col-md-4  ">
                <br>
                <br>

                <h3> <p class="text-white bg-dark text-center">
                        LOGIN  PAGE
                    </p>
                </h3>


                    <form action="phps/login.inc.php" method="post">
                    <div class="form-group">
                        <label for="UserName">Username</label>
                        <input type="text" name="try_username" class="form-control" id="UserName"  required placeholder="User Name">
                        <?php
                        if (isset($_GET["error"])){
                            if ($_GET["error"]=="nouser"){
                                echo '<p class="signuperror"> We cant find your username, please sign up first.</P>';
                            }
                        }
                        ?>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="try_pwd" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                        <?php
                        if (isset($_GET["error"])){
                            if ($_GET["error"]=="wrongpwd"){
                                echo '<p class="signuperror">Check you password and try agin </P>';
                            }
                        }
                        ?>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="RememberMe" id="exampleCheck1">
                        <label class="RememberMe" name ="remember" for="exampleCheck1">Remember Me</label>
                    </div>
                    <button type="submit" name="login-submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>

    </div>
    <hr class="my-4">
        
 
 <?php include('footer.php'); ?>