<?php
    session_start();
    include_once './dbConnect.php';
    $id = $_SESSION['user_id'];

    if(isset($_POST['submit'])){
        $file = $_FILES['file'];
        print_r($file);
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allow = array('jpg','jpeg','png','pdf');

        if(in_array($fileActualExt,$allow)){
            if($fileError === 0){
                if($fileSize<1000000){
                    $fileNameNew = "profile".$id.".".$fileActualExt;
                    $fileDestination = './uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);
                    $sql = "UPDATE profileimg SET status=0 WHERE user_id='$id';";
                    $result = mysqli_query($conn,$sql);
                    header("Location: ../pages/SettingsPage/SettingPage.php?upload=success");
                }else{
                    echo '<span>Your file is too big</span>';
                }
            }else{
                echo '<span>There was an error</span>';
            }
        }else{
            echo '<span>Ypu cannot uplaod such file</span>';
        }
    }
?>