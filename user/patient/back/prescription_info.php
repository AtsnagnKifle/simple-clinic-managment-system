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

            $pre_id =$row['prescription_id']; 
            $qu_pre_id="SELECT * FROM prescription where prescription_id = '".$pre_id."'";
            $result_pre_id = mysqli_query($con,$qu_pre_id);
            //$check_pre_id = mysqli_num_rows($result);
            $data_pre_id = mysqli_fetch_assoc($result_pre_id);

            $med_id = $data_pre_id['medicine_id'];
            $qu_med_id="SELECT * FROM medicine where medicine_id = '".$med_id."'";
            $result_med_id = mysqli_query($con,$qu_med_id);
            //$check_pre_id = mysqli_num_rows($result);
            $data_med_id = mysqli_fetch_assoc($result_med_id);
            
            echo'<tr>'.
                    '<th>'.$data_med_id['name'].'</th>'.

                    
                    '<td><b>'.$data_med_id['usage_detail'].'</b></td>'.
                    
                '</tr>';
               
        }

           }
    else{
        echo '<center><p>Not Found</p><center>';
    }  
   
}



?>