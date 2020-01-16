<?php
    include_once("../../../back/db.php");
    $q = "INSERT INTO `referal`(`doctor_id`, `patient_id`, `referal_to`, `referal_reason`) VALUES ('".$_POST['doc_id']."','".$_POST['pat_id']."','".$_POST['select_hospital']."','".$_POST['referral_reason']."')";
    mysqli_query($con,$q);
    echo "<script>window.history.back();</script>";
    