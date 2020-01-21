<?php
    session_start();

    if(isset($_SESSION['id']) && $_SESSION['role']=="doctor"){

        header("Location: queue.php");
        exit();

    }


?>