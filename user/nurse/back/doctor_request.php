<?php

if(!isset($_SESSION['id']) || $_SESSION['role']!="nurse")
{
    header("Location: ../../index.php");
    exit();
}
else{
    include_once '../../back/db.php';
    $qu="SELECT * FROM queue where nurse_id ='0'";
    $result = mysqli_query($con,$qu);
    $check = mysqli_num_rows($result);
    if ($check >= 1){
        while( $row = mysqli_fetch_assoc($result))
        {

            echo'<tr>'.
                    '<td>'.$row['doctor_id'].'</td>'.
                    '<td>'.$row['room_no'].'</td>'.
                    '<td>      
                        <form action="back/assist_doctor.php" method="POST">
                            <input name="patientId" type="hidden" value="'.$row['patient_id'].'">
                            <button type="submit" name="submit" class="button is-success is-small">Assist</button></form>
                    </td>'.
                    
                '</tr>';
               
        }

           }
    else{
        echo '<center><p>Not Found</p><center>';
    }  
   
}



?>