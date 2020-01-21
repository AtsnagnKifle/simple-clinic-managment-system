<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doctor Request</title>
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
                        <a class="is-active has-text-weight-bold is-6 has-text-color-black" id="his-activator">Medicine Store</a>
                    </p>
                    <button class="button is-primary" style="margin-left: 0px;"
        onclick="document.getElementById('request_medicine').setAttribute('class','modal is-active')">
        Request Medicine</button>
                    <div class="panel-block">
                            <div id="his" class="column is-10 has-text-centered" style="margin: auto;">
                                <div class="title ">Requested Medicine</div>
                                <div class="table-container">
                                    <table class="table is-success" style="margin:auto;">
                                        <thead>
                                            <tr>
                                                <th>Medicine Id</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php include_once 'back/list_requested_medicine.php';?>
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
            
            <div class="modal" id='request_medicine'>
                <div class="modal-background">
                    <div class="columns">
                        <div class="column"></div>
                        <div class="column is-6 is-vcentered ">
                            <div class="column">
                                <br><br>
                            </div>
                            
                                <div class="hero is-white">
                                    <div class="column" style="padding:5%;">
                                    <form action="back/request_medicine.php" method="POST">
                                        <div class="container has-text-centered content">
                                            <div class="title has-text-weight-light">
                                                Request Medicine
                                            </div>
                                            <br>
                                            <p>
                                                Medicine id
                                            </p>
                                            <input type="text" class="input" name="medicineId">
                                            <br><br>
                                            <p>
                                                Amount  
                                            </p>
                                            <input type="text" class="input" name="medicineAmount">
                                        <div class="column">
                                        <button type="submit" name="submit" class="button is-success is-large">Request</button>
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
                    onclick="document.getElementById('request_medicine').setAttribute('class','modal')"></button>
    </div>


    <script src="../../statics/js/panel.js"></script>

</body>


</html>