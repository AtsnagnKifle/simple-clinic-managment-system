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
//down

            $d_query = "SELECT * FROM `user` WHERE `id`='".$row["doctor_id"]."'";
            $res = mysqli_query($con,$d_query);
            $data = mysqli_fetch_assoc($res);
            $doctor_name = $data['full_name'];

            //laboratory 
            $qu2 = "SELECT * FROM `laboratory` WHERE `laboratory_id`='".$row['laboratory_id']."'";
            $result2 = mysqli_query($con,$qu2);
            $lab = mysqli_fetch_assoc($result2);
            $lab_result = $lab['lab_results'];
            
            //prescription medicineId
            $qu2 = "SELECT * FROM `prescription` WHERE `prescription_id`='".$row['prescription_id']."'";
            $result2 = mysqli_query($con,$qu2);
            $pre = mysqli_fetch_assoc($result2);
            $medicineId = $pre['medicine_id'];
            //medicine namea
            $qu2 = "SELECT `name` FROM `medicine` WHERE `medicine_id`='".$medicineId."'";
            $result2 = mysqli_query($con,$qu2);
            $medicineName = mysqli_fetch_assoc($result2)['name'];
            /*foreach ($medicines as $med) {
                $medicines_list .= $med . "<br>";
            }*/
            echo '
            <tr>
                <th>'.$row['date'].'</th>
                <td><b> Dr. '.$doctor_name.'</b></td>
                <td>'.$row['symptoms'].'
                </td>
                <td>'.$lab_result.'
                </td>
                <td>'.$row["diagnosis"].'</td>
                <td>'. $medicineName.'</td>
                <td>'.$row["additional_note"] .'</td>
                <td>
                    <form action="../../back/print.php" method="POST">
                                <button class="button is-info is-small" type="submit" name="submit">Print</buttom>
                                <input name="historyId"type="hidden" value="'.$row['id'].'">
                    <form>
                </td>
            </tr>
            ';
               
        }

           }
    else{
        echo '<center><p>Not Found</p><center>';
    }  
   
}



?>


























<?php
// $lab_id =$row['labratory_id']; 
            // $qu_lab_id="SELECT * FROM laboratory where laboratory_id = '".$lab_id."'";
            // $result_lab_id = mysqli_query($con,$qu_lab_id);
            // //$check_pre_id = mysqli_num_rows($result);
            // $data_lab_id = mysqli_fetch_assoc($result_lab_id);

            // //$med_id = $data_pre_id['medicine_id'];
            // //$qu_med_id="SELECT * FROM medicine where medicine_id = '".$med_id."'";
            // //$result_med_id = mysqli_query($con,$qu_med_id);
            // //$check_pre_id = mysqli_num_rows($result);
            // //$data_med_id = mysqli_fetch_assoc($result_med_id);
            
            // echo'<tr>'.
            //         '<td>'.$row['date'].'</td>'.
            //         '<td>'.$row['doctor_id'].'</td>'.
            //         '<td>'.$row['symptoms'].'</td>'.
            //         '<td>'.$data_lab_id['requested_tests'].' => '.$data_lab_id['lab_results'].'</td>'.
            //         '<td>'.$row['diagnosis'].'</td>'.
            //         '<td>'.'pre'.'</td>'.
            //         '<td>'.$row['additional_note'].'</td>'.
            //         '<td>'.$row['receptionist_id'].'</td>'.
            //     '</tr>';?>