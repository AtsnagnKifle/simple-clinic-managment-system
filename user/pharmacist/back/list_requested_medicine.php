<?php

if(!isset($_SESSION['id']) || $_SESSION['role']!="pharmacist")
{
    header("Location: ../../index.php");
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
                    '<td>'.$row['medicine_id'].'</td>'.
                    '<td>'.$row['amount'].'</td>'.
                    '<td>'.$row['date'].'</td>'.
                    
                    
                '</tr>';
               
        }

           }
    else{
        echo '<center><p>Not Found</p><center>';
    }  
   
}



?>