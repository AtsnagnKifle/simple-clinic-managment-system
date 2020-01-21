<?php
    include_once("../../../back/db.php");
    $q = "INSERT INTO `special_food_request`(`doctor_id`, `patient_id`, `reason`) VALUES ('".$_POST['doc_id']."','".$_POST['pat_id']."','".$_POST['special_food_request_reason']."')";
    mysqli_query($con,$q);
    echo "<script>window.history.back();</script>";