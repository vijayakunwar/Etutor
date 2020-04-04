
<?php
if(isset($_POST['login-submit'])) {
    require "dbh.php";
    $try_username = $_POST["try_username"];
    $try_pwd = $_POST["try_pwd"];

    $sql = "SELECT * FROM user where user_Name=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../login.php?error=sqlerror");
        exit();
    }
    else {
        $sql = "SELECT * FROM user WHERE user_Name=? ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror"); //test connection see if database have error
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $try_username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($try_pwd, $row['user_Password']);
                if ($pwdCheck == false) {
                    header("Location: ../login.php?error=wrongpwd&username=".$try_username);
                    exit();
                }
                else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['username'] = $row['user_name'];

                    //user id
                    $_SESSION['userIDFN'] = $row['user_ID'];

                    //user type
                    $_SESSION['userType'] = $row['user_Type'];

                    if ($row['user_Type'] == 1) {
                        # code...
                        header("Location: ../tutor/index.php?login=success");
                    } else {
                        # code...
                        header("Location: ../student/index.php?login=success");
                    }
                    
                    

                  //  header("Location: ../private/index.php?login=success");
                
                    exit();
                }
            }
            else {
                header("Location: ../login.php?error=nouser");
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: ../index.html");
    exit();
}
