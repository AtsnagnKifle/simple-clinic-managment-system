<?php
session_start();
if(!isset($_SESSION['id']) || $_SESSION['role']!="doctor")
{
    header("Location: ../../index.php");
    exit();
}
else{

    
    if(isset($_POST['app_id'])){
        
        include_once '../../../back/db.php';
        //$qu="SELECT * FROM queue where doctor_id ='".$_SESSION['id']."' AND is_treated = 'NULL'";
        //$qu="SELECT * FROM queue where pa ='".$_SESSION['id']."' AND is_treated IS NULL";
        $qu = "UPDATE queue SET is_treated='1' WHERE patient_id='".$_POST['id']."'";

        mysqli_query($con,$qu);
        //$check = mysqli_num_rows($result);
        header("Location: ../queue.php");
        exit();

    }

    
}
?>