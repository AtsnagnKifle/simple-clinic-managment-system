<?php
    session_start();
    if(!isset($_SESSION['id']) || $_SESSION['role']!="pharmacist")
    {
        header("Location: ../../index.php");
        exit();
    }
    else{
        
        include_once '../../../back/db.php';
        $qu="INSERT INTO `medicine_request`(`medicine_id`, `amount`) VALUES ('".$_POST['medicineId']."','".$_POST['medicineAmount']."')";
        $result = mysqli_query($con,$qu);
        header("Location: ../request.php");
        exit();
    }



?>