<?php
if(isset($_POST['signup_submit'])){// check if user have been click submit.

require 'connection.php';  // required connection with database

$username = $_POST['username'];
$password = $_POST['password'];
$firstName = $_POST['fName'];
$lastName= $_POST['lName'];
$eMail= $_POST['email'];
$phoneNumber = $_POST['phone'];
$dateOfBirth= $_POST['DOB'];
$gender= $_POST['sex'];
$certificate = ["certificate"]; //this dont work .
$userType = $_POST["userType"];


    $sql = "SELECT user_Name FROM user WHERE User_Name=?";
    $stmt = mysqli_stmt_init($conn);  //connection
    if (!mysqli_stmt_prepare($stmt, $sql)) {//check if the the sql is failed
        header("Location:../new_reg.php? error=sqlerror&username=".$username."&email=".$eMail."&fName=".$firstName."&lName=".$lastName."&phone=".$phoneNumber."&DOB=".$dateOfBirth."&sex=".$gender."&certificate=".$certificate);
        exit();
    } ///use "?" to pervent sql injection give web more securety
    else{ //this step chececk user name avability, user Ajax combine with PHP can achive it at real time.
        mysqli_stmt_bind_param($stmt,"s",$username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if($resultCheck>0){
            header("Location:../new_reg.php? error=usertaken&username=".$username."&email=".$eMail."&fName=".$firstName."&lName=".$lastName."&phone=".$phoneNumber."&DOB=".$dateOfBirth."&sex=".$gender."&certificate=".$certificate);
            exit();
        }
        else{//sql check
            $sql= "INSERT INTO user(User_Name,user_Password,user_fName,user_LName,user_Email,user_Phone,user_DOB,user_Gender,user_Certificate,user_Type) VALUE (?,?,?,?,?,?,?,?,?,?)";//?place holders
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {//check if the the sql is failed
                header("Location:../new_reg.php
                ? error=sqlerror&username=".$username."&email=".$eMail."&fName=".$firstName."&lName=".$lastName."&phone=".$phoneNumber."&DOB=".$dateOfBirth."&sex=".$gender."&certificate=".$certificate);
                exit();
        }
            else{// instert data
                $hashedPwd = password_hash($password,PASSWORD_DEFAULT); // not useing MD5 or XIA 256 becuase its not updated often, not secure. USE bcrpty. bcrpty always updated automaticaly.
                mysqli_stmt_bind_param($stmt,"sssssissbs",$username,$hashedPwd,$firstName,$lastName,$eMail,$phoneNumber,$dateOfBirth,$gender,$certificate,$userType);
                mysqli_stmt_execute($stmt);
                header("Loacation:../signup.php?signup=success ");
                exit();

            }
        }
    }


    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    // If the user tries to access this page an inproper way, we send them back to the signup page.
    header("Location: ../new_reg.php");
    exit();
};