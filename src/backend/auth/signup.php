<?php
if(isset($_POST['reg_submit'])){

    include_once '../dbConnect.php';

    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $language = mysqli_real_escape_string($conn, $_POST['language']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);

    //check for empty fields
    if(empty($full_name)||empty($name)||empty($email)||empty($password)){
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
                    $sql = "INSERT INTO users (name, email, password, full_name,  language, location) VALUES ('$name','$email','$hashedPassword', '$full_name', '$language', '$location');";
                    mysqli_query($conn,$sql);
                    $sqlNew = "SELECT * FROM users WHERE email ='$email';";
                    $resultNew = mysqli_query($conn,$sqlNew);
                    if(mysqli_num_rows($resultNew)>0){
                        while($row=mysqli_fetch_assoc($resultNew)){
                            $userid = $row['id'];
                            $sqlimg = "INSERT INTO profileimg (user_id,status) VALUES ('$userid',1)";
                            mysqli_query($conn,$sqlimg);
                        }
                    }
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