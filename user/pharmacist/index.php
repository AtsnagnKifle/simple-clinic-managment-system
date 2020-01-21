<?php
    session_start();

    if(isset($_SESSION['id']) && $_SESSION['role']=="pharmacist"){

        header("Location: doctor_request.php");
        exit();
    }

?>