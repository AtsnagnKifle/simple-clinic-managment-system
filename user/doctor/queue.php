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
                        <a class="is-active has-text-weight-bold is-6 has-text-color-black" id="his-activator">Queue </a>
                    </p>
                    
                    <div class="panel-block">
                            <div id="his" class="column is-5 has-text-centered" style="margin: auto;">
                                <div class="title ">Patient Queue</div>
                                <div class="table-container">
                                    <table class="table is-success" style="margin:auto;">
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
    <script src="../../statics/js/panel.js"></script>

</body>


</html>