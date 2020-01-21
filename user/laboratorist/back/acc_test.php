<?php
session_start();
if(!isset($_SESSION['id']) || $_SESSION['role']!="laboratorist")
{
    header("Location: ../../index.php");
    exit();
}
else{
    include_once("../../../back/db.php");
    $q="UPDATE `laboratory` SET `laboratorist_id`='".$_SESSION['id']."' WHERE `laboratory_id`='".$_POST['labId']."'";
    $result = mysqli_query($con,$q);
    echo "<script>window.history.back();</script>";
}
