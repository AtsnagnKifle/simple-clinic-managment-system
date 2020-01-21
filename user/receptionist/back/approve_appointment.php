<?php

    if( isset( $_POST['request_id'] ))
    {
        // update requests list to remove is_active
        // add a new appointment record to database
        echo $_POST["request_id"];
        echo $_POST["status"];
    }