<?php

    $query = "SELECT * FROM `medicine` WHERE size > 0";
    $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result))
    {     
        echo "<option value=".$row["medicine_id"].'>'.$row["name"]."</option>";
    }