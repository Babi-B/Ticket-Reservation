<?php
    session_start();
    include_once '../../backend/dbConnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> User Setting Page</title>
    <link rel="stylesheet" href="SettingPage.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,800&display=swap" rel="stylesheet">
</head>
<body>
      <?php
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if(strpos($fullUrl,"upload=success") == true){
          echo "<p class ='error'>&#128528 Nice profile you got there,</p>";
        }

      ?>
    <div class="container">
        <div class="leftbox">
            <nav>
                <a onclick="tabs(0)" class="tab active" >
                <i class="fa fa-user"></i>
            </a>
            <a onclick="tabs(1)" class="tab" >
                <i class="fa fa-credit-card"></i>
            </a>
            <a onclick="tabs(2)" class="tab" >
                <i class="fa fa-tv"></i>
            </a>
            <a onclick="tabs(3)" class="tab" >
                <i class="fa fa-tasks"></i>
            </a>
            <a onclick="tabs(4)" class="tab" >
                <i class="fa fa-cog"></i>
            </a>
            </nav>
        </div>
        <div class="rightbox">
            <div class="profile tabShow">
                <div class="personalInfoAndProfilePic">
                    <h1>Personal Info</h1>
                    <div>
                        <span>Change Profile_pic</span>
                        <form action="../../backend/uploadImage.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="file">
                            <button type="submit" name="submit">Set</button>
                        </form>
                        <?php
                            $sql= "SELECT * FROM users";
                            $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $id = $row['id'];
                                    $sqlimg = "SELECT * FROM profileimg WHERE user_id ='id';";
                                    $resultImg = mysqli_query($conn,$sqlimg);
                                    while($rowImg = mysqli_fetch_assoc($resultImg)){
                                        echo "<div>";
                                            if($rowImg['status']==0){
                                                "<img src='../../backend/uploads/profile".$id.".png'>";
                                            }else{
                                                echo "<img src='../../backend/uploads/5f12409ca01f35.58821257.png'>";
                                            }
                                            echo $row['user_name'];
                                        echo "<div>";
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
                <form action="../../backend/updateUserData.php" method="POST">
                    <h2>Full Name</h2>
                    <input type="text" class="input" value="Enter Name">
                    <h2>User Name</h2>
                    <input type="text" class="input" value="Enter User Name">
                    <h2>Email</h2>
                    <input type="text" class="input" placeholder="example@example.com">
                    <h2>Password</h2>
                    <input type="password" class="input" placeholder="queencode">
                    <h2>Language</h2>
                    <input type="text" class="input" placeholder="Language">
                    <h2>Location</h2>
                    <input type="text" class="input" placeholder="location">
    
                    <input type="submit" class="btn" value="UPDATE">
                </form>
            </div>
            <div class=" payment tabShow">
                <h1>Payment Info</h1>
                <h2>payment Methode</h2>
                <input type="text" class="input" value="MasterCard - 0202 .... .... 7336">
                <h2>Billing Address</h2>
                <input type="text" class="input" value="1234 some street">
                <h2>ZipCode</h2>
                <input type="text" class="input" value="0000">
                <h2>Billing Date</h2>
                <input type="text" class="input" value="jan 20 2017">
                <h2>Redeem Card</h2>
                <input type="password" class="input" value="Enter Gift Code">
                <button class="btn">Update</button>
            </div>
            <div class="subscription tabShow">
                <h1>Subscription Info</h1>
                <h2>Payment Date</h2>
                <input type="text" class="input" value="March 04 2000">
                <h2>Next Charge</h2>
                <p>5000 <span>including tax</span></p>
                <h2>Plan</h2>
                <p>Limited Plan</p>
                <h2>Monthly Total</h2>
                <p>5000FCFA/month</p>
                <button class="btn">Update</button>
            </div>
            <div class="Privacy tabShow">
                <h1>Privacy Setting</h1>
                <h2>Manage Email Notification.</h2>
                <p></p>
                <h2>Manage Privacy Settings</h2>
                <p></p>
                <h2>View Terms Of Use</h2>
                <p></p>
                <h2>Personalized Ad Expirence</h2>
                <p></p>
                <h2>Protect Account</h2>
                <p></p>
                <button class="btn">Update</button>
            </div>
            <div class="Setting tabShow">
                <h1>Account Setting</h1>
                <h2>Sync Watchlist.</h2>
                <p></p>
                <h2>Hold Subscription</h2>
                <p></p>
                <h2>Cancel Subscription</h2>
                <p></p>
                <h2>Personalized Ad Expirence</h2>
                <p></p>
                <h2>Your Devices</h2>
                <p>Referals</p>
                <button class="btn">Update</button>
            </div>
        </div>
    </div>
    






    <script src="SettingsPage.js"></script>
    <script>
        const tabBtn = document.querySelectorAll(".tab");
        const tab = document.querySelectorAll(".tabShow");

function tabs(panelIndex){
    tab.forEach(function(node){
        node.SettingPage.display = "none";
    });
    tab[panelIndex].SettingPage.display = "block";
}
tabs(0);
 </script>
    <script>
        $(".tab").click(function(){
            $(this).addClass("active").siblings().removeClass("active");
        })


    </script>
</body>
</html>