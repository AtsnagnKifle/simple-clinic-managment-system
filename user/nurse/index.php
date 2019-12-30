<?php
    session_start();

    if(isset($_SESSION['id']) && $_SESSION['role']=="nurse"){

        echo "nurse";

    }


?>