<?php
    session_start();

    if(isset($_SESSION['id']) && $_SESSION['role']=="patient"){

        header("Location: medical_history.php");
        exit();

    }


?>