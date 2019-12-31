<?php

    session_start();
    if($_SESSION['role']!="patient" || !isset($_SESSION['id']))
    {
        header("Location: ../../index.php");
        exit();
    }
    else{
       
        include_once '../../../back/db.php';
        if(isset($_POST['submit'])){
        if($_SESSION['request']=="Pending"){
            $qu="DELETE FROM appointment_request WHERE patient_id ='".$_SESSION['id']."'";
            mysqli_query($con,$qu);
            header("Location: ../appointment.php");
            exit();
        }
        else if($_SESSION['request']=="Approved"){
            $qu="DELETE FROM appointment WHERE patient_id ='".$_SESSION['id']."'";
            mysqli_query($con,$qu);
            header("Location: ../appointment.php");
            exit();
        }

        
    }
        //$_SESSION['now']=true;
    }

    
?>