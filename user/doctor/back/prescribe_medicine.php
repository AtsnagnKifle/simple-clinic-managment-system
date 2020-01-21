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
            //check medicine amount

            $qu_check = "SELECT size FROM medicine'".$_POST['selector']."'"; 
            $resul_check=mysqli_query($con,$qu_check);
            $data_check = mysqli_fetch_assoc($result_check);
            if($data_check['size']>0){

                //$qu="INSERT INTO queue(symptoms,diagnosis,additional_note) VALUES ('".$_POST['symptons']."','".$_SESSION['diagnosis']."','".$_POST['additionalNote']."') WHERE patient_id='".$_POST['patientId']."'";
                $qu1 = "INSERT INTO `prescription`(`doctor_id`, `patient_id`, `medicine_id`) VALUES ('".$_SESSION['id']."','".$_POST['patientId']."','".$_POST['selector']."')"; 
                mysqli_query($con,$qu1);
                $last_id = mysqli_insert_id($con);

                //prescription id into queue
                $qu="UPDATE `queue` SET `prescription_id`='".$last_id."' WHERE `patient_id`='".$_POST['patientId']."'";
                mysqli_query($con,$qu);

                //decrement amount of medicine
                $qu2="UPDATE `medicine` SET `size`=(SELECT size FROM medicine WHERE `medicine_id`='".$_POST['selector']."')-1 WHERE `medicine_id`='".$_POST['selector']."'";
                mysqli_query($con,$qu2);
                
                
                header("Location: ../open.php?id=".$_POST['patientId']."&submit=");
                exit();
        
            }
            
           
            
       
        
    }
        
    }

    
?>