<?php

if(!isset($_SESSION['id']) || $_SESSION['role']!="manager")
{
    header("Location: ../../../index.php");
    exit();
}
else{
    include_once '../../back/db.php';
    $qu="SELECT * FROM medical_history";
    $result = mysqli_query($con,$qu);
    $check = mysqli_num_rows($result);
    if ($check >= 1){
        while( $row = mysqli_fetch_assoc($result))
        {

            $d_query = "SELECT * FROM `user` WHERE `id`='".$row["doctor_id"]."'";
            $res = mysqli_query($con,$d_query);
            $doctor_name = mysqli_fetch_assoc($res)['full_name'];
            $lab_result = '----- ----- ----------- ------------- -----------';
            $medicines = ["-"];
            $medicines_list = "";
            foreach ($medicines as $med) {
                $medicines_list .= $med . "<br>";
            }
            echo '
            <tr>
                <th>'.$row['patient_id'].'</th>
                <td><b>Dr. '.$doctor_name.'</b></a></td>
                <td>'.$row['symptoms'].'</td>
                <td>'.$lab_result.'</td>
                <td>'.$row["diagnosis"].'</td>
                <td>'. $medicines_list .'</td>
                <td>'.$row["additional_note"] .'</td>
                <td>'.$row["nurse_id"] .'</td>
                <td>'.$row["receptionist_id"] .'</td>
                <td>'.$row["date"] .'</td>
                <td><button class="button is-info is-small">Print</buttom></td>
            </tr>
            ';
               
        }

           }
    else{
        echo '<center><p>Not Found</p><center>';
    }  
   
}



?>