<?php

include_once("../../../back/db.php");

$q = "INSERT INTO `nurse_request`(`doctor_id`) VALUES ('".$_POST["doc_id"]."')";
$result = mysqli_query($con,$q);
var_dump($q);
echo "<script>window.history.back();</script>";
