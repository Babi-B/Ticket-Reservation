<?php
session_start();
$id = $_SESSION['user_id'];
// $userName = $_SESSION['user_name']; 
// $email = $_SESSION['user_email']; 
// $_SESSION['user_password'];
// $_SESSION['full_name'] = $row['full_name'];
// $_SESSION['language'] = $row['language'];
// $_SESSION['location'] = $row['location'];
if(isset($_POST['updateProfile'])){

    include_once './dbConnect.php';

    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $language = mysqli_real_escape_string($conn, $_POST['language']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);

    //check for empty fields
    if(empty($full_name)||empty($name)||empty($email)||empty($language)||empty($location)){
        header("Location: ../pages/SettingsPage/SettingPage.php?update=empty");
        exit();
    }else{
        //check if input characters are valid
        if(!preg_match("/^[a-zA-Z]*$/",$name)){
            header("Location: ../pages/SettingsPage/SettingPage.php?update=invalid");
            exit();
        }else{
            //check if email is valid
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                header("Location: ../pages/SettingsPage/SettingPage.php?update=emailIsInvalid");
                exit();
            }else{
                $sql = "SELECT * FROM users WHERE email ='$email';";
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);

                if($resultCheck>0){
                    header("Location: ../pages/SettingsPage/SettingPage.php?update=emailExitsAlready");
                    exit();
                }else{
                    //hashing the password
                    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                    //Insert the user into the database
                    $sql = "UPDATE users 
                    set full_name = '$full_name',
                    name = '$name',
                    email = '$email',
                    language = '$language',
                    location = '$location'
                    WHERE id = '$id'
                    ";
                    mysqli_query($conn,$sql);
                    $sql = "SELECT * from users WHERE id ='$id';";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            $_SESSION['user_id'] = $row['id'];
                            $_SESSION['user_name'] = $row['name'];
                            $_SESSION['user_email'] = $row['email'];
                            $_SESSION['user_password'] = $row['password'];
                            $_SESSION['full_name'] = $row['full_name'];
                            $_SESSION['language'] = $row['language'];
                            $_SESSION['location'] = $row['location'];
                        }
                    }else{

                    }
                    session_start();
                    header("Location: ../pages/SettingsPage/SettingPage.php?update=success");
                    exit();
                }
            }
        }
    }

}else{
    header("Location: ../pages/SettingsPage/SettingPage.php");
    exit();
}