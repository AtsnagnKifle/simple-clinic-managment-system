<?php
    session_start();

    if(!isset($_SESSION['id'])){
        header("Location: ../index.php");
        exit();
    }
    else{
        if($_SESSION['role']=="receptionist"){
            header("Location: receptionist/index.php");
            exit();
        }
        else if($_SESSION['role']=="patient"){
            header("Location: patient/index.php");
            exit();
        }
        else if($_SESSION['role']=="doctor"){
            header("Location: doctor/index.php");
            exit();
        }
        else if($_SESSION['role']=="nurse"){
            header("Location: ../user/nurse/index.php");
            exit();
        }
        else if($_SESSION['role']=="laboratorist"){
            header("Location: ../user/laboratorist/index.php");
            exit();
        }
        else if($_SESSION['role']=="pharmacist"){
            header("Location: ../user/pharmacist/index.php");
            exit();
        }
        else if($_SESSION['role']=="manager"){
            header("Location: ../user/manager/index.php");
            exit();
        }

    }


?>