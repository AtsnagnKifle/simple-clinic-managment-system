<?php

include_once("../../../back/db.php");
$q="UPDATE `queue` SET `nurse_id`='0' WHERE `patient_id`='".$_POST['patientId']."'";
$result = mysqli_query($con,$q);
echo "<script>window.history.back();</script>";
