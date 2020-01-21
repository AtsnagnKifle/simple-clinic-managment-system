<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Taken Test</title>
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
                        <a class="is-active has-text-weight-bold is-6 has-text-color-black" id="his-activator">Taken Test</a>
                    </p>
                    
                    <div class="panel-block">
                            <div id="his" class="column is-5 has-text-centered" style="margin: auto;">
                                <div class="title ">Taken Test</div>
                                <div class="table-container">
                                    <table class="table is-success" style="margin:auto;">
                                        <thead>
                                            <tr>
                                                <th>Doctor</th>
                                                <th>Patient</th>
                                                <th>test</th>
                                                <th>Result</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php include_once 'back/taken.php';?>
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
                                   Labratory Result's
                                </div>
                                <form action="back/result.php" method="POST">
                                    
                                    <strong class="title has-text-weight-bold">Result</strong>
                                    <br><br>

                                    <input type="text" class="input" name="result">
                                    <input type="hidden" name="labId" id="labId" value="">
                                    
                                    <br><br>
                                    <button type="submit" name="submit" class="button is-success" onclick='document.getElementById("delete_modal").setAttribute("class","modal")'>submit</button>
                                </form>
                                <br>
                                <button class="button is-danger" onclick='document.getElementById("delete_modal").setAttribute("class","modal")'>Cancel</button>
                            </div>
                        </div>

                    </div>
                    <div class="column"><br><br></div>
                </div>
                <div class="column"></div>
            </div>
        </div>
    </div>
    

    

    <script>

        function labModal(i){
            setId(i);
            document.getElementById("delete_modal").setAttribute("class","modal is-active");
        }
        function setId(s) {
            var x = document.getElementById("labId");
            x.value = s;
        } 
        
    </script>
    <script src="../../statics/js/panel.js"></script>

</body>


</html>