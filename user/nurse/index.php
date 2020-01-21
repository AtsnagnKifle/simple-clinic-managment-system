<?php
    session_start();

    if(isset($_SESSION['id']) && $_SESSION['role']=="nurse"){

        header("Location: doctor_request.php");
        exit();
    }


?>