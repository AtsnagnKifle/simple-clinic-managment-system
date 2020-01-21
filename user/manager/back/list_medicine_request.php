<?php

if(!isset($_SESSION['id']) || $_SESSION['role']!="manager")
{
    header("Location: ../../../index.php");
    exit();
}
else{
    include_once '../../back/db.php';
    $qu="SELECT * FROM medicine_request";
    $result = mysqli_query($con,$qu);
    $check = mysqli_num_rows($result);
    if ($check >= 1){
        while( $row = mysqli_fetch_assoc($result))
        {

            echo'<tr>'.
                    '<th>'.$row['medicine_id'].'</th>'.
                    '<th>'.$row['amount'].'</th>'.
                    '<td>'.$row['date'].'</td>
                </tr>';
         
        }

    
    }
    else{
        echo '<center><p>Not Found</p><center>';
    }  
   
}



?>