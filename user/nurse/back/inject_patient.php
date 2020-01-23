<?php
session_start();
if(!isset($_SESSION['id']) || $_SESSION['role']!="nurse")
{
    header("Location: ../../index.php");
    exit();
}
else{
    include_once("../../../back/db.php");
    $q="UPDATE `prescription` SET `inject_nurse_id`='".$_SESSION['id']."' WHERE `patient_id`='".$_POST['patientId']."'";
    $result = mysqli_query($con,$q);
    echo "<script>window.history.back();</script>";
}
