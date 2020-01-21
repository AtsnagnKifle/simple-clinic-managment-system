<?php 

    include_once("../../../back/db.php");
    $q = "INSERT INTO `appointment_request`(`patient_id`, `doctor_id`, `reason`,`is_emergency`) VALUES ('".$_POST["pat_id"]."','".$_POST["doctors"]."','".$_POST["reason"]."','".$_POST['isEmergency']."')";
    $result = mysqli_query($con,$q);
    echo "<script>window.history.back();</script>";