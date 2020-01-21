<?php
    session_start();
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
                        <a class="is-active has-text-weight-bold is-6 has-text-color-black" id="his-activator">View Queue</a>
                        <a class="has-text-weight-bold is-6 has-text-color-black" id="ref-activator" style="display: none;"></a>
                    </p>
                    <button class="button is-primary" style="margin-left: 0px;"
        onclick="document.getElementById('new_patient').setAttribute('class','modal is-active')">
        New Patient</button>
                    <div class="panel-block">
                            <div id="his" class="column is-3 has-text-centered" style="margin: auto;">
                                <div class="title ">Queue</div>
                                <div class="table-container">
                                    <table class="table is-success" >
                                        <thead>
                                            <tr>
                                                
                                                <th>Patient</th>
                                                <th>Doctor</th>
                                                <th>Room No</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php include_once 'back/queue_list.php';?>
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
            
            <div class="modal" id='new_patient'>
                <div class="modal-background">
                    <div class="columns">
                        <div class="column"></div>
                        <div class="column is-6 is-vcentered ">
                            <div class="column">
                                <br><br>
                            </div>
                            
                                <div class="hero is-white">
                                    <div class="column" style="padding:5%;">
                                    <form action="back/new_patient.php" method="POST">
                                        <div class="container has-text-centered content">
                                            <div class="title has-text-weight-light">
                                                New Patient
                                            </div>
                                            <br>
                                            <p>
                                                Patient id
                                            </p>
                                        
                                            <input type="text" class="input" name="patientId">
                                            <br><br>
                                            <p>
                                                Doctor id
                                            </p>
                                        
                                            <input type="text" class="input" name="doctorId">
                                            <br><br>
                                            <p>
                                                Enter Room Number
                                            </p>
                                            
                                            <input type="text" class="input" name="room">
                                            <div class="column">
                                        <button type="submit" name="submit" class="button is-success is-large">SET</button>
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
                    onclick="document.getElementById('new_patient').setAttribute('class','modal')"></button>
    </div>
    
    <script src="../../statics/js/panel.js"></script>

</body>


</html>
