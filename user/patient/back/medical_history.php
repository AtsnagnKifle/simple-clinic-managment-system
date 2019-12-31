<?php

if(!isset($_SESSION['id']) || $_SESSION['role']!="patient")
{
    header("Location: ../../../index.php");
    exit();
}
else{
    include_once '../../back/db.php';
    $qu="SELECT * FROM medical_history where patient_id = '".$_SESSION['id']."'";
    $result = mysqli_query($con,$qu);
    $check = mysqli_num_rows($result);
    if ($check >= 1){
        while( $row = mysqli_fetch_assoc($result))
        {

            $lab_id =$row['labratory_id']; 
            $qu_lab_id="SELECT * FROM laboratory where laboratory_id = '".$lab_id."'";
            $result_lab_id = mysqli_query($con,$qu_lab_id);
            //$check_pre_id = mysqli_num_rows($result);
            $data_lab_id = mysqli_fetch_assoc($result_lab_id);

            //$med_id = $data_pre_id['medicine_id'];
            //$qu_med_id="SELECT * FROM medicine where medicine_id = '".$med_id."'";
            //$result_med_id = mysqli_query($con,$qu_med_id);
            //$check_pre_id = mysqli_num_rows($result);
            //$data_med_id = mysqli_fetch_assoc($result_med_id);
            
            echo'<tr>'.
                    '<td>'.$row['date'].'</td>'.
                    '<td>'.$row['doctor_id'].'</td>'.
                    '<td>'.$row['symptoms'].'</td>'.
                    '<td>'.$data_lab_id['requested_tests'].' => '.$data_lab_id['lab_results'].'</td>'.
                    '<td>'.$row['diagnosis'].'</td>'.
                    '<td>'.'pre'.'</td>'.
                    '<td>'.$row['additional_note'].'</td>'.
                    '<td>'.$row['receptionist_id'].'</td>'.
                '</tr>';
               
        }

           }
    else{
        echo '<center><p>Not Found</p><center>';
    }  
   
}



?>