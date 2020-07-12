<?php

    session_start();

    if(isset($_POST['log_submit'])){

        include_once '../dbConnect.php';

        $email = mysqli_real_escape_string($conn, $_POST['log_email']);
        $password = mysqli_real_escape_string($conn, $_POST['log_password']);

        if(empty($email)||empty($password)){
            header("Location: ../../pages/Registration/Registration.php?login=empty");
            exit();
        }else{
            $sql = "SELECT * FROM users WHERE email = '$email';";
            $result = mysqli_query($conn,$sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck<1){
                header("Location: ../../pages/Registration/Registration.php?login=error");
                exit();
            }else{
                if($row = mysqli_fetch_assoc($result)){
                   //dehashing the password
                   $hashPasswordCheck = password_verify($password,$row['password']);
                   if($hashPasswordCheck == false){
                    header("Location: ../../pages/Registration/Registration.php?login=error");
                    exit();
                   }elseif($hashPasswordCheck == true){
                       //log in the user here
                       $_SESSION['user_id'] = $row['id'];
                       $_SESSION['user_name'] = $row['name'];
                       $_SESSION['user_email'] = $row['email'];
                       $_SESSION['user_password'] = $row['password'];
                       header("Location: ../../pages/SelectOptionPage/SelectOptionPage.php?login=success");
                       exit();
                   }
                }
            }
        }
    }else{
        header("Location: ../../pages/Registration/Registration.php?login=error");
        exit();
    }
?>