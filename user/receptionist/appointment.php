<?php
    session_start();
    include_once("back/approve_appointment.php");


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Appointments</title>
    <link rel="stylesheet" href="../../statics/css/bulma.css">
</head>

<body class="has-text-weight-light">

    <div class="columns">
        <?php include_once 'nav.php';?>
        <div class="column">
        <div class="columns"><br>
            <div class="column">
                <br>
                <nav class="panel is-shadowless">
                    <p class="panel-tabs content">
                        <a class="has-text-weight-bold is-6 has-text-color-black" id="med-activator" style="display: none;"></a>
                        <a class="has-text-weight-bold is-6 has-text-color-black" id="lab-activator" style="display: none;"></a>
                        <a class="is-active has-text-weight-bold is-6 has-text-color-black" id="his-activator">View Appointments</a>
                        <a class="has-text-weight-bold is-6 has-text-color-black" id="ref-activator" style="display: none;"></a>
                    </p>
                    <div class="container" style="margin:auto">
                        <button class="button">Create New Appointment</button>
                    </div>
                    <div class="panel-block">
                            <div id="his" class="column is-10 has-text-centered" style="margin: auto;">
                                <div class="title ">Approved</div>
                                <div class="table-container">
                                    <table class="table is-success" >
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Doctor</th>
                                                <th>Patient</th>
                                                <th>Reason</th>
                                                <th>Room No</th>
                                                <th>Emergency</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php include_once 'back/appointment_approve.php';?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="title ">Pending</div>
                                <div class="table-container" >
                                    <table class="table is-success" style="margin:auto">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Doctor</th>
                                                <th>Patient</th>
                                                <th>Reason</th>
                                                <th>Emergency</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php include_once 'back/appointment_request.php'?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    </div>
    <script src="../../statics/js/panel.js"></script>

</body>


</html>




<!-- 
    lab result
<div class="has-text-centered" id="lab_reports">
    <p class="title has-text-weight-light">Create Lab Request</p>
    <div id="selected" class="is-narrow has-addons is-gapless">
    </div>
    <br>
    <div class="field has-addons ">

        <div class="control is-expanded" style="margin: auto;">
            <select name="selector" id="selector" class="input is-expanded">
            </select>
        </div>
        <div class="control">
            <a class="button is-info" onclick=selected(event)
                id="add_button">Add</a>
        </div>
    </div>
    <div class="field"><input type="button" class="button is-success"
            value="Submit"></div>
</div>

-->