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
                        <a class="is-active has-text-weight-bold is-6 has-text-color-black" id="his-activator">Appointments</a>
                        <a class="has-text-weight-bold is-6 has-text-color-black" id="ref-activator" style="display: none;"></a>
                    </p>
                    
                    <div class="panel-block">
                            <div id="his" class="column is-12 has-text-centered" style="margin: auto;">
                                
                                <?php
                                    include_once 'back/appointment_status.php';
                                    if($_SESSION['request']=="Approved" || $_SESSION['request']=="Pending"){
                                            echo "<div class='title'>Appointment Status</div>";
                                            if($_SESSION['request']=="Approved"){
                                                echo '<div class="table-container">
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
                                                            <tbody>';
                                                            
                                                  
                                                echo '<tr>'.

                                                            '<td>'.$data['date'].'</td>'.
                                                            '<td>'.$data['time'].'</td>'.
                                                            '<td>'.$data['doctor_id'].'</td>'.
                                                            '<td>'.$data['patient_id'].'</td>'.
                                                            '<td>'.$data['reason'].'</td>'.
                                                            '<td>'.$data['room_no'].'</td>'.
                                                            '<td>'.$data['is_emergency'].'</td>'.
                                                            '<td>'.'<button class="button is-success is-small is-static">Approved</button>'.'</td>'.
                                                            '<td>
                                                            <div class="level-right">
                                                                <button class="button is-success is-small is-danger" onclick='."'".'document.getElementById("delete_modal").setAttribute("class","modal is-active")'."'".'>Delete</button>
                                                                
                                                            </div>.
                                                            </td>'.

                                                    '</tr>';
                                                
                                                
                                                
                                            }
                                            else if($_SESSION['request']=="Pending")
                                            {
                                                echo '<div class="table-container">
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
                                                            <tbody>';
                                                  
                                                    echo'<tr>'.

                                                            '<th>'.$data['timestamp'].'</th>'.
                                                            '<td>'.$data['doctor_id'].'</td>'.
                                                            '<td>'.$data['patient_id'].'</td>'.
                                                            '<td>'.$data['reason'].'</td>'.
                                                            
                                                            '<td>'.$data['is_emergency'].'</td>'.
                                                            '<td><button class="button is-success is-small">Pending</button></td>'.
                                                            '<td>
                                                            <div class="level-right">
                                                                <button class="button is-success is-small is-danger" onclick='."'".'document.getElementById("delete_modal").setAttribute("class","modal is-active")'."'".'>Delete</button>
                                                                
                                                            </div>.
                                                            </td>'.
                                                        '</tr>';
                                                
                                            }
                                                
                                                echo '
                                                            </tbody>
                                                        </table>
                                                    </div>';

                                                echo '
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
                                                                            <button type="submit" name="submit" class="button is-success is-large" onclick='."'".'document.getElementById("delete_modal").setAttribute("class","modal")'."'".'>Yes</button>
                                                                        </form>
                                                                        <br>
                                                                        <button class="button is-danger has-text-weight-bold" onclick='."'".'document.getElementById("delete_modal").setAttribute("class","modal")'."'".'>No</button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="column"><br><br></div>
                                                        </div>
                                                        <div class="column"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            

                                                    ';
                                            
                                        }
                                    else{
                                        // echo '<div class="container" style="margin:auto">
                                        //         <button class="button">Create New Appointment</button>
                                        //     </div>';
                                        echo '
                                        <div class="columns">
                                                <div class="column"></div>
                                                <div class="column is-6 is-vcentered ">
                                                    
                                                    <div class="hero is-white">
                                                        <form action="back/make_appointment.php" method=POST>
                                                            <input type="hidden" class="hidden" name="pat_id" value='.$_SESSION["id"].'>>>
                                                            <div class="column" style="padding:5%;">
                                                                <div class="container has-text-centered content">
                                                                    <div class="container has-text-centered content">
                                                                        <div class="title has-text-weight-light">
                                                                            New Appointment
                                                                        </div>
                                                                        <p>
                                                                            Select Doctor
                                                                        </p>
                                                                        <select class="input" name="doctors" id="docs">';
                                                                        $qu="SELECT * FROM user where role = 'doctor'";
                                                                        $result = mysqli_query($con,$qu);
                                                                        $check = mysqli_num_rows($result);
                                                                        if ($check >= 1){
                                                                            while( $row = mysqli_fetch_assoc($result))
                                                                            {
                                                                                echo '<option value="'.$row['id'].'" class="input">Dr '.$row['full_name'].'</option>';
                                                                            }
                                                                        }
                                   
                                                echo '</select>
                                            
                                                <br><br>
                                                <p>
                                                    Enter Reason
                                                </p>
                                                <input type="text" class="input" name="reason">
                                                <br><br>
                                                <p>Is Emergency</p>

                                                <select class="input" name="isEmergency">
                                                    <option value="Yes" class="input">Yes</option>
                                                    <option value="No" class="input">No</option>
                                                </select>
                                            </div>
                                            <div class="column">
                                                <button class="button is-success" type="submit" name="submit">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="column"><br><br></div>
                        </div>
                        <div class="column"></div>
                    </div>
                                        ';
                                    }
                                
                                ?>
                                
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



