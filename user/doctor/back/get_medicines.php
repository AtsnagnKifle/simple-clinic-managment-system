<?php

    $query = "SELECT * FROM `medicine` WHERE 1";
    $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result))
    {     
        echo "<option value=".$row["id"].">".$row["name"]."</option>";
    }