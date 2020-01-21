<?php
    session_start();

    if(isset($_SESSION['id']) && $_SESSION['role']=="receptionist"){

        header("Location: appointment.php");
        exit();
    
    }

?>