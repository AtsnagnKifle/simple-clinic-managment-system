<?php
    
    if(isset($_GET["id"]))
    {


        $id = $_GET["id"];
        
        $query = "SELECT `id`, `patient_id`, `doctor_id`, `symptoms`, `laboratory_id`, `diagnosis`, `prescription_id`, `receptionist_id`, `additional_note`, `date` FROM `medical_history` WHERE patient_id = '".$id."'";
        $result = mysqli_query($con,$query);
        $check = mysqli_num_rows($result);

        if($check>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                // var_dump($row);
                $d_query = "SELECT * FROM `user` WHERE `id`='".$row["doctor_id"]."'";
                $res = mysqli_query($con,$d_query);
                $doctor_name = mysqli_fetch_assoc($res)['full_name'];
                $lab_result = '-';
                $medicines = ["-"];
                $medicines_list = "";
                foreach ($medicines as $med) {
                    $medicines_list .= $med . "<br>";
                }
                echo '
                <tr>
                    <th>'.$row['date'].'</th>
                    <td><a href="'.$row["doctor_id"].'"><b> Dr. '.$doctor_name.'</b></a></td>
                    <td>'.$row['symptoms'].'
                    </td>
                    <td>'.$lab_result.'
                    </td>
                    <td>'.$row["diagnosis"].'</td>
                    <td><a href=" ' .'">'. $medicines_list .'</a></td>
                    <td>'.$row["additional_note"] .'</td>
                </tr>
                ';
            }
        }
        else
        {
            echo "NO MEDICAL RECORDS FOR USER";
        }


    }