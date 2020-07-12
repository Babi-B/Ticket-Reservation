<?php
    if(isset($_POST['log_out_submit'])){
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../../pages/Registration/Registration.php?logout=success");
        exit();
    }
?>