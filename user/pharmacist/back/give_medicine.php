<?php
    session_start();
    if(!isset($_SESSION['id']) || $_SESSION['role']!="pharmacist")
    {
        header("Location: ../../index.php");
        exit();
    }
    else{
        include_once("../../../back/db.php");
        $q="UPDATE `prescription` SET `pharmacist_id`='".$_SESSION['id']."' WHERE `prescription_id`='".$_POST['prescriptionId']."'";
        $result = mysqli_query($con,$q);
        echo "<script>window.history.back();</script>";
    }
