<?php

if(!isset($_SESSION['id']) || $_SESSION['role']!="receptionist")
{
    echo "dsd";
    exit();
    header("Location: ../../../index.php");
    exit();
}
else{
    include_once '../../back/db.php';
    $qu="SELECT * FROM queue";
    $result = mysqli_query($con,$qu);
    $check = mysqli_num_rows($result);
    if ($check >= 1){
        while( $row = mysqli_fetch_assoc($result))
        {

            echo'<tr>'.
                    '<td>'.$row['patient_id'].'</td>'.

                    '<td>'.$row['doctor_id'].'</td>'.
                    '<td>'.$row['room_no'].'</td>'.
                    
                '</tr>';
               
        }

           }
    else{
        echo '<center><p>Not Found</p><center>';
    }  
   
}



?>