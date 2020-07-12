<?php
if(isset($_POST['reg_submit'])){

    include_once '../dbConnect.php';

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //check for empty fields
    if(empty($name)||empty($email)||empty($password)){
        header("Location: ../../pages/Registration/Registration.php?signup=empty");
        exit();
    }else{
        //check if input characters are valid
        if(!preg_match("/^[a-zA-Z]*$/",$name)){
            header("Location: ../../pages/Registration/Registration.php?signup=invalid");
            exit();
        }else{
            //check if email is valid
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                header("Location: ../../pages/Registration/Registration.php?signup=emailIsInvalid");
                exit();
            }else{
                $sql = "SELECT * FROM users WHERE email ='$email';";
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);

                if($resultCheck>0){
                    header("Location: ../../pages/Registration/Registration.php?signup=emailExitsAlready");
                    exit();
                }else{
                    //hashing the password
                    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                    //Insert the user into the database
                    $sql = "INSERT INTO users (name, email, password) VALUES ('$name','$email','$hashedPassword');";
                    mysqli_query($conn,$sql);
                    header("Location: ../../pages/Registration/Registration.php?signup=success");
                    exit();
                }
            }
        }
    }

}else{
    header("Location: ../../pages/Registration/Registration.php");
    exit();
}