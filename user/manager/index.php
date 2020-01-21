<?php
    session_start();

    if(isset($_SESSION['id']) && $_SESSION['role']=="manager"){
        header("Location: profile.php");
        exit();

    }


?>