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
                                            <?php include_once 'back/list_appointment_approve.php';?>
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
                                

                                <form action="back/new_appointment.php" method="POST">
                                
                                    
                                    <div class="control">
                                        <p>
                                            Select Doctor
                                        </p>
                                        <select class='input' name="doctorId" id="docs">

                                            <?php
                                                $qu="SELECT * FROM user where role = 'doctor'";
                                                $result = mysqli_query($con,$qu);
                                                $check = mysqli_num_rows($result);
                                                if ($check >= 1){
                                                    while( $row = mysqli_fetch_assoc($result))
                                                    {
                                                        echo '<option value="'.$row['id'].'" class="input">Dr '.$row['full_name'].'</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                        
                                    </div>
                                    <br>
                                    <div class="field is-grouped is-grouped-multiline">
                                    <div class="control">
                                        <p>
                                            Patient id
                                        </p>
                                        <input type="text" class="input" name="patientId">
                                    </div>
                                    <br>
                                    
                                    <div class="control">
                                        <p>
                                            is emergency
                                        </p>
                                        <select name="isEmergency" id="isEmergency"  class="input">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        
                                    </div>        
                                </div>
                                    <div class="control">
                                            <p>
                                                Enter Reason
                                            </p>
                                            <input type="text" class="input" name="reason">
                                    </div> 
                                    <div class="column">
                                        <button name="submit" type="submit" class="button is-success is-large">Add</button>
                                    </div> 
                                </form>  
                            </div>

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
                            <form action="back/approve.php" method="POST">
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
                                    <input type="hidden" id="patientId" name="patientId" value="">
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
                                                                    <input type="hidden" name="delpatientId" id="delpatientId" value="">
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
    <script>
        function setIdAndActiveModal(id){
            //console.log(id);
            var x = document.getElementById("patientId").setAttribute("value",id);
            document.getElementById("approve_appointment").setAttribute("class","modal is-active");
        }
        function delActiveModal(id){
            //console.log(id);
            var x = document.getElementById("delpatientId").setAttribute("value",id);
            document.getElementById("delete_modal").setAttribute("class","modal is-active");
        }
    </script>
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