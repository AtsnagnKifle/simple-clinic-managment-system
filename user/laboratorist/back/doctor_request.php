<?php

if(!isset($_SESSION['id']) || $_SESSION['role']!="laboratorist")
{
    header("Location: ../../index.php");
    exit();
}
else{
    include_once '../../back/db.php';
    $qu="SELECT * FROM laboratory where laboratorist_id IS NULL";
    $result = mysqli_query($con,$qu);
    $check = mysqli_num_rows($result);
    if ($check >= 1){
        while( $row = mysqli_fetch_assoc($result))
        {

            echo'<tr>'.
                    '<td>'.$row['doctor_id'].'</td>'.
                    '<td>'.$row['patient_id'].'</td>'.
                    '<td>'.$row['requested_tests'].'</td>'.
                    '<td>      
                        <form action="back/acc_test.php" method="POST">
                            <input name="labId" type="hidden" value="'.$row['laboratory_id'].'">
                            <button type="submit" name="submit" class="button is-success is-small">take</button></form>
                    </td>'.
                    
                '</tr>';
               
        }

           }
    else{
        echo '<center><p>Not Found</p><center>';
    }  
   
}



?>