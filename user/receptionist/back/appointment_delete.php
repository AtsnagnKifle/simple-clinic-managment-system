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
            
            
            $qu = "DELETE FROM `appointment_request` WHERE patient_id='".$_POST['delpatientId']."'";
            mysqli_query($con,$qu);
            
            
            header("Location: ../appointment.php");
            exit();
        
       
        
    }
        
    }

    
?>