<?php

if(!isset($_SESSION['id']) || $_SESSION['role']!="manager")
{
    header("Location: ../../../index.php");
    exit();
}
else{
    include_once '../../back/db.php';
    $qu="SELECT * FROM referal";
    $result = mysqli_query($con,$qu);
    $check = mysqli_num_rows($result);
    if ($check >= 1){
        while( $row = mysqli_fetch_assoc($result))
        {
 
            echo '
            <tr>
                <th>'.$row['patient_id'].'</th>
                <td>'.$row['doctor_id'].'</td>
                <td>'.$row["referal_reason"] .'</td>
                <td>'.$row["referal_to"] .'</td>
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