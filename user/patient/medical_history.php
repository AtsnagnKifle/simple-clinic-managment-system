<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Medical History</title>
    <link rel="stylesheet" href="../../statics/css/bulma.css">
</head>

<body class="has-text-weight-light">

    <div class="columns">
        <?php include_once 'nav.php';?>
        <div class="column">
        <div class="columns">
            <div class="column">
                
                <nav class="panel is-shadowless">
                    <p class="panel-tabs content">
                        
                        <a class="is-active has-text-weight-bold is-6 has-text-color-black" id="his-activator">View Medical History</a>
                        
                    </p>
                    <div class="panel-block">
                            <div id="his" class="column is-12 has-text-centered" style="margin: auto;">
                                <div class="title ">Medical History</div>
                                
                                    <div class="column is-12 section" style="margin: auto;">

                                            <!--button class="button is-left-aligned">Export as pdf</button-->
                                            <table class="table is-fullwidth is-success">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Doctor</th>
                                                        <th>Symptoms</th>
                                                        <th><abbr title="Lab Result">Lab Result</abbr></th>
                                                        <th>Diagnosis</th>
                                                        <th>Prescriptions</th>
                                                        <th>Doctor's Notes</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                
                                                    <?php include_once 'back/medical_history.php';?>
                                                    
                                                </tbody>
                                            </table>
                                    </div>
                                
                            </div>
                        
                    </div>
                </nav>
            
        </div>
    </div>
    </div>
    <script src="../../statics/js/panel.js"></script>

</body>


</html>

