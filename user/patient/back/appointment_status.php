<?php

    if($_SESSION['role']!="patient" || !isset($_SESSION['id']))
    {
        header("Location: ../index.php");
        exit();
    }
    else{
        include_once '../../back/db.php';
        $qu="SELECT * FROM appointment_request WHERE patient_id = '".$_SESSION['id']."'";
        $result = mysqli_query($con,$qu);
        $check = mysqli_num_rows($result);
        
        
       
        $qu1="SELECT * FROM appointment WHERE patient_id = '".$_SESSION['id']."'";
        $result1 = mysqli_query($con,$qu1);
        $check1 = mysqli_num_rows($result1);
        
        if($check == 1 ){
            $data = mysqli_fetch_assoc($result);
            $_SESSION['request']="Pending";
        }
        else if($check1 == 1)
        {
            $_SESSION['request']="Approved";
            $data = mysqli_fetch_assoc($result1);
            
        }
        else{
            $_SESSION['request']="";
        }
        //$_SESSION['now']=true;
        
        
    }

    
?>


