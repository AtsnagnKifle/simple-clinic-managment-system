<?php
    session_start();

    if(isset($_SESSION['id']) && $_SESSION['role']=="patient"){

        echo "patient";

    }


?>