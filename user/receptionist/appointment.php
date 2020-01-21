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
                    
                    <button class="button is-primary" style="margin-left: 0px;"
        onclick="document.getElementById('new_appointment').setAttribute('class','modal is-active')">Create
        New Appointment</button>
                    <div class="panel-block">
                            <div id="his" class="column is-10 has-text-centered" style="margin: auto;">
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
                                
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    </div>
    
    
    <div class="panel-block has-text-centered">

<div id="his" class="column is-10 has-text-centered" style="margin: auto;">
    
    <div class="modal" id='new_appointment'>
        <div class="modal-background">
            <div class="columns">
                <div class="column"></div>
                <div class="column is-6 is-vcentered ">
                    <div class="column">
                        <br><br>
                    </div>
                    <div class="hero is-white">
                        <div class="column" style="padding:5%;">

                            <div class="container has-text-centered content">
                                <div class="title has-text-weight-light">
                                    New Appointment
                                </div>
                                <p>
                                    Select Doctor
                                </p>
                                <select class='input' name="doctors" id="docs">

                                    <option value="doctor1" class="input">doctor1</option>
                                    <option value="doctor2" class="input">doctor2</option>
                                    <option value="doctor3" class="input">doctor3</option>
                                    <option value="doctor4" class="input">doctor4</option>
                                    <option value="doctor5" class="input">doctor5</option>
                                </select>
                                <p>
                                    Enter Date
                                </p>
                                <input type="text" class="input">
                                <br>
                                <p>
                                    Enter Room Number
                                </p>
                                <input type="text" class="input">
                                <p>
                                    Enter Reason
                                </p>
                                <input type="text" class="input">
                            </div>

                        </div>

                        <div class="column">
                            <button class="button is-success is-large">Add</button>
                        </div>

                    </div>
                </div>
                <div class="column"></div>
            </div>
        </div>

        <button class="modal-close is-large" aria-label="close"
            onclick="document.getElementById('new_appointment').setAttribute('class','modal')"></button>
    </div>
    
    <!--approve-->

    <div class="panel-block has-text-centered">

<div id="his" class="column is-10 has-text-centered" style="margin: auto;">
    
    <div class="modal" id='approve_appointment'>
        <div class="modal-background">
            <div class="columns">
                <div class="column"></div>
                <div class="column is-6 is-vcentered ">
                    <div class="column">
                        <br><br>
                    </div>
                    
                        <div class="hero is-white">
                            <div class="column" style="padding:5%;">
                            <form action="back/approve.php" method="GET">
                                <div class="container has-text-centered content">
                                    <div class="title has-text-weight-light">
                                        Approve Appointment
                                    </div>
                                    
                                    <p>
                                        Enter Date
                                    </p>
                                
                                    <input type="text" class="input" name="datetime">
                                    <br>
                                    <p>
                                        Enter Room Number
                                    </p>
                                    <input type="text" class="sr-only" name="username" value="pa001">
                                    <input type="text" class="input" name="room">
                                    <div class="column">
                                <button type="submit" name="submit" class="button is-success is-large">Approve</button>
                            </div>
                                    
                                </div>
                                </form>

                            </div>

                            

                        </div>
                    
                </div>
                <div class="column"></div>
            </div>
        </div>

        <button class="modal-close is-large" aria-label="close"
            onclick="document.getElementById('approve_appointment').setAttribute('class','modal')"></button>
    </div>
    

    <!-- delete -->

    <div class="modal" id="delete_modal">
       <div class="modal-background">
            <div class="columns">
                <div class="column"></div>
                <div class="column is-6 is-vcentered ">
                    <div class="column">
                        <br><br>
                    </div>
                <div class="hero is-white">
                                                                <div class="column" style="padding:5%;">
                                                                    <div class="container has-text-centered content">
                                                                        <!--div class="title">delete</div-->

                                                                        <div class="title has-text-weight-bold">
                                                                            Are you sure you want to Delete?
                                                                        </div>
                                                                        <form action="back/appointment_delete.php" method="POST">
                                                                            <button type="submit" name="submit" class="button is-success is-large" onclick="document.getElementById('delete_modal').setAttribute('class','modal')">Yes</button>
                                                                        </form>
                                                                        <br>
                                                                        <button class="button is-danger has-text-weight-bold" onclick="document.getElementById('delete_modal').setAttribute('class','modal')">No</button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="column"><br><br></div>
                                                        </div>
                                                        <div class="column"></div>
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