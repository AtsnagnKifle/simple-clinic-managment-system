<?php

//INSERT INTO `queue`(`id`, `patient_id`, `doctor_id`,`receptionist_id`,`room_no`) VALUES ('10','123545','doc','reec','5')


    session_start();
    if($_SESSION['role']!="doctor" || !isset($_SESSION['role']))
    {
        header("Location: ../../index.php");
        exit();
    }
    else{
       
        include_once '../../../back/db.php';
        if(isset($_POST['submit'])){
           

           // $qu="INSERT INTO queue(symptoms,diagnosis,additional_note) VALUES ('".$_POST['symptons']."','".$_SESSION['diagnosis']."','".$_POST['additionalNote']."') WHERE patient_id='".$_POST['patientId']."'";
            $qu = "INSERT INTO `medical_history`(`patient_id`, `doctor_id`, `symptoms`, `laboratory_id`, `diagnosis`, `prescription_id`, `additional_note`, `nurse_id`, `receptionist_id`, `room_no`, `date`) SELECT `patient_id`, `doctor_id`, `symptoms`, `laboratory_id`, `diagnosis`, `prescription_id`, `additional_note`, `nurse_id`, `receptionist_id`, `room_no`, `date` FROM `queue` WHERE patient_id='".$_POST['patientId']."'";
            mysqli_query($con,$qu); 
            $qu1="DELETE FROM `queue` WHERE `patient_id`='".$_POST['patientId']."'";
            mysqli_query($con,$qu1);
            header("Location: ../queue.php");
           
        
       
        
    }
        
    }

    
?>