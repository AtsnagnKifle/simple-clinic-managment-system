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
                echo '
                <tr>
                    <th>'.$row['date'].'</th>
                    <td><b> Dr. '.$doctor_name.'</b></td>
                    <td>'.$row['symptoms'].'
                    </td>
                    <td>'.$lab_result.'
                    </td>
                    <td>'.$row["diagnosis"].'</td>
                    <td>'. $medicineName .'</td>
                    <td>'.$row["additional_note"] .'</td>
                    <td>
                        <form action="../../back/print.php" method="POST">
                            <button class="button is-info is-small" type="submit" name="submit">Print</buttom>
                            <input name="historyId"type="hidden" value="'.$row['id'].'">
                        </form>
                    </td>
                </tr>
                ';
            }
        }
        else
        {
            echo "NO MEDICAL RECORDS FOR USER";
        }


    }