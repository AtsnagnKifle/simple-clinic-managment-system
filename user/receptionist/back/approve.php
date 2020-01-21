<?php

    session_start();
    if($_SESSION['role']!="receptionist" || !isset($_SESSION['role']))
    {
        header("Location: ../../index.php");
        exit();
    }
    else{
       
        include_once '../../../back/db.php';
        if(isset($_POST['submit'])){
            /*$datetime = $_POST['datetime'];
            $split = strtok($datetime, " ");
            $date = $split;
            $split = strtok(" ");
            $time = $split;
            */
            $qu="SELECT * FROM medical_history where patient_id = '".$_SESSION['id']."'";
            $result = mysqli_query($con,$qu);
            $check = mysqli_num_rows($result);
            if ($check >= 1){
                while( $row = mysqli_fetch_assoc($result))
                {
                    
                }
            $qu="DELETE FROM appointment_request WHERE username='".$_POST['username']."'";
            $qu2="INSERT INTO appointment_approve(username,doctor,receptionist,room,date,time) VALUES ('".$_POST['username']."','".$_POST['doctor']."','".$_SESSION['username']."','".$_POST['room']."','".$date."','".$time."')";
           
            mysqli_query($con,$qu);
            
            mysqli_query($con,$qu2);
            header("Location: ../appointment_list.php");
            exit();
        
       
        
    }
        //$_SESSION['now']=true;
    }

    
?>