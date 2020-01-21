<?php
    
    $id = $_GET['id'];

    $query = "SELECT * FROM `laboratory` WHERE `patient_id` = '".$id."'";
    $result = mysqli_query($con,$query);
    $check = mysqli_num_rows($result);

    if($check)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $req = $row["requested_tests"];
            $res = $row["lab_results"];
            echo "<li>".$req."=>".$res."</li>";
        }
    }