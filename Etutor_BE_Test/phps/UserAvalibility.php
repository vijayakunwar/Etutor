<?php

if(isset($_POST['username'])){
    require 'dbh.php';
    $id=$_POST['user_name'];
    $checkdata = "SELECT * FROM user WHERE User_Name= $id";
    $query=mysqli_query($checkdata);
    if(mysqli_num_rows($query)>0)
    {
        echo"User Name Already Exist, try a new one.";
    }
    else
    {
        echo "Available";
    }
    exit();
}