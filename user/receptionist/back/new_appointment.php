<?php

//INSERT INTO `queue`(`id`, `patient_id`, `doctor_id`,`receptionist_id`,`room_no`) VALUES ('10','123545','doc','reec','5')


    session_start();
    if($_SESSION['role']!="receptionist" || !isset($_SESSION['role']))
    {
        header("Location: ../../index.php");
        exit();
    }
    else{
       
        include_once '../../../back/db.php';
        if(isset($_POST['submit'])){
            
            
            $qu = "INSERT INTO `appointment_request`(`patient_id`, `doctor_id`, `reason`, `is_emergency`) VALUES ('".$_POST['patientId']."','".$_POST['doctorId']."','".$_POST['reason']."','".$_POST['isEmergency']."')";
            mysqli_query($con,$qu);
            
            
            header("Location: ../appointment.php");
            exit();
        
       
        
    }
        
    }

    
?>