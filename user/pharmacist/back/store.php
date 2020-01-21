<?php

if(!isset($_SESSION['id']) || $_SESSION['role']!="pharmacist")
{
    header("Location: ../../index.php");
    exit();
}
else{
    include_once '../../back/db.php';
    $qu="SELECT * FROM medicine";
    $result = mysqli_query($con,$qu);
    $check = mysqli_num_rows($result);
    if ($check >= 1){
        while( $row = mysqli_fetch_assoc($result))
        {

            
            echo'<tr>'.
                    '<td>'.$row['medicine_id'].'</td>'.
                    '<td>'.$row['name'].'</td>'.
                    '<td>'.$row['usage_detail'].'</td>'.
                    '<td>'.$row['is_injection'].'</td>'.
                    '<td>'.$row['size'].'</td>'.
                    
                '</tr>';
               
        }

           }
    else{
        echo '<center><p>Not Found</p><center>';
    }  
   
}



?>