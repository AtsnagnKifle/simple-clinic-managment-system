<?php

if(!isset($_SESSION['id']) || $_SESSION['role']!="doctor")
{
    header("Location: ../../index.php");
    exit();
}
else{
    include_once '../../back/db.php';
    $qu="SELECT * FROM queue where doctor_id ='".$_SESSION['id']."' AND is_treated IS NOT NULL";
    $result = mysqli_query($con,$qu);
    $check = mysqli_num_rows($result);
    if ($check >= 1){
        while( $row = mysqli_fetch_assoc($result))
        {

            echo'<tr>'.
                    '<td>'.$row['patient_id'].'</td>'.
                    '<td>'.$row['doctor_id'].'</td>'.
                    '<td>'.$row['room_no'].'</td>'.
                    '<td>      
                        <a href="open.php"><button class="button is-success is-small">open</button></a>
                    </td>'.
                    
                '</tr>';
               
        }

           }
    else{
        echo '<center><p>Not Found</p><center>';
    }  
   
}



?>