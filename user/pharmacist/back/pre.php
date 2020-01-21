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
            
           //whene doc prescr insert into labortory and take id and put in queue laboratory_id 
            $qu1 = "INSERT INTO `laboratory`(`doctor_id`, `patient_id`, `requested_tests`) VALUES ('".$_SESSION['id']."','".$_POST['patientId']."','".$_POST['selector']."')"; 
            mysqli_query($con,$qu1);
            $last_id = mysqli_insert_id($con);

            $qu="UPDATE `queue` SET `laboratory_id`='".$last_id."' WHERE `patient_id`='".$_POST['patientId']."'";
            mysqli_query($con,$qu);
            
            
            header("Location: ../open.php?id=".$_POST['patientId']."&submit=");
            exit();
        
       
        
    }
        
    }

    
?>