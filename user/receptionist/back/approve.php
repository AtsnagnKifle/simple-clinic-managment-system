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
            $datetime = $_POST['datetime'];
            $split = strtok($datetime, " ");
            $date = $split;
            $split = strtok(" ");
            $time = $split;
            
            
            $qu="SELECT * FROM appointment_request WHERE patient_id='".$_POST['patientId']."'";
            $result = mysqli_query($con,$qu);
            $data = mysqli_fetch_assoc($result);
            //$qu2="INSERT INTO appointment(doctor_id,patient_id,receptionist_id,room,date,time) VALUES ('".$_POST['patientId']."','".$_POST['doctor']."','".$_SESSION['username']."','".$_POST['room']."','".$date."','".$time."')";
            
            //insert appointment approved   
            $qu1 = "INSERT INTO `appointment`(`doctor_id`, `patient_id`, `receptionist_id`, `is_emergency`, `reason`, `date`, `time`, `room_no`) VALUES ('".$data['doctor_id']."','".$data['patient_id']."','".$_SESSION['id']."','".$data['is_emergency']."','".$data['reason']."','".$date."','".$time."','".$_POST['room']."')";
            mysqli_query($con,$qu1);

            //delete from appointment request
            $qu3="DELETE FROM appointment_request WHERE patient_id ='".$_POST['patientId']."'";
            mysqli_query($con,$qu3);

            header("Location: ../appointment.php");
            exit();
        
       
        
    }
        //$_SESSION['now']=true;
    }

    
?>