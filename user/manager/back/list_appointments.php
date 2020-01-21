<?php

if(!isset($_SESSION['id']) || $_SESSION['role']!="manager")
{
    header("Location: ../../../index.php");
    exit();
}
else{
    include_once '../../back/db.php';
    $qu="SELECT * FROM appointment";
    $result = mysqli_query($con,$qu);
    $check = mysqli_num_rows($result);
    if ($check >= 1){
        while( $row = mysqli_fetch_assoc($result))
        {

            echo'<tr>'.
                    '<th>'.$row['date'].'</th>'.
                    '<th>'.$row['time'].'</th>'.
                    '<td>'.$row['doctor_id'].'</td>'.
                    '<td>'.$row['patient_id'].'</td>'.
                    '<td>'.$row['reason'].'</td>'.
                    '<td>'.$row['room_no'].'</td>'.
                    '<td>'.$row['is_emergency'].'</td>'.
                    
                '</tr>';
         
        }

    
    }
    else{
        echo '<center><p>Not Found</p><center>';
    }  
   
}



?>