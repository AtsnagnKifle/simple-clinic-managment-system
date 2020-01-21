<?php

if(!isset($_SESSION['id']) || $_SESSION['role']!="manager")
{
    header("Location: ../../index.php");
    exit();
}
else{
    include_once '../../back/db.php';
    //$qu="SELECT * FROM queue where doctor_id ='".$_SESSION['id']."' AND is_treated = 'NULL'";
    $qu="SELECT * FROM user where id ='".$_SESSION['id']."'";

    $result = mysqli_query($con,$qu);
    $check = mysqli_num_rows($result);
    if ($check >= 1){
        $row = mysqli_fetch_assoc($result);
        echo  '<h6>Name:'.$row['full_name'].'</h6>'.
              '<h6>ID:'.$row['id'].'</h6>'.
              '<h6>Age:'.$row['age'].'</h6>'.
              '<h6>Gender:'.$row['gender'].'</h6>'.
              '<h6>Email:'.$row['email'].'</h6>'.
              '<h6>Phone Number:'.$row['phone_number'].'</h6>'.
              '<h6>Address:'.$row['address'].'</h6>';
        
        if($row['gender']=="F"){
            $pro = '<img class="is-rounded" src="../../images/man.png">';

        }
        else{
            $pro = '<img class="is-rounded" src="../../images/man.png">';

        }
           
               
    }

}



?>