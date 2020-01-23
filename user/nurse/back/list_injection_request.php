<?php

if(!isset($_SESSION['id']) || $_SESSION['role']!="nurse")
{
    header("Location: ../../index.php");
    exit();
}
else{
    include_once '../../back/db.php';
    $qu="SELECT * FROM prescription where pharmacist_id IS NOT NULL AND inject_nurse_id IS NULL";
    $result = mysqli_query($con,$qu);
    $check = mysqli_num_rows($result);
    if ($check >= 1){
        while( $row = mysqli_fetch_assoc($result))
        {
            $qu1="SELECT * FROM medicine where medicine_id='".$row['medicine_id']."'";
            $result1 = mysqli_query($con,$qu1);
            $row1 = mysqli_fetch_assoc($result1);
            echo'<tr>'.
                    '<td>'.$row['patient_id'].'</td>'.
                    '<td>'.$row1['name'].'</td>'.
                    '<td>'.$row1['usage_detail'].'</td>'.
                    '<td>      
                        <form action="back/inject_patient.php" method="POST">
                            <input name="patientId" type="hidden" value="'.$row['patient_id'].'">
                            <button type="submit" name="submit" class="button is-success is-small">injected</button></form>
                    </td>'.
                    
                '</tr>';
               
        }

           }
    else{
        echo '<center><p>Not Found</p><center>';
    }  
   
}



?>