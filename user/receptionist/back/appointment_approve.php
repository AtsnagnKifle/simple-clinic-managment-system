<?php

if(!isset($_SESSION['id']) || $_SESSION['role']!="receptionist")
{
    header("Location: ../../../index.php");
    exit();
}
else{
    include_once '../../back/db.php';
    $qu="SELECT * FROM appointment";
    $result = mysqli_query($con,$qu);
    $check = mysqli_num_rows($result);
    if ($check >= 1){
        while( $row = mysqli_fetch_assoc($result))
        {

            echo'<tr>'.
                    '<th>'.$row['date'].'</th>'.
                    '<th>'.$row['time'].'</th>'.
                    '<td>'.$row['doctor_id'].'</td>'.
                    '<td>'.$row['patient_id'].'</td>'.
                    '<td>'.$row['reason'].'</td>'.
                    '<td>'.$row['room_no'].'</td>'.
                    '<td>'.$row['is_emergency'].'</td>'.
                    '<td>
                        <button data-toggle="modal" data-target="#approveform" onclick="setId('."'".$row['patient_id']."'".')" class="button is-success is-small">Approved</button>
                    </td>
                </tr>';
            /*echo '<tr>'.
                    '<td>'.$row['username'].'</td>'.
                    '<td>'.$row['date'].'</td>'.
                    '<td><button class="btn btn-danger btn-sm">Pending</button></td>'.
                    '<td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#approveform" onclick="setId('."'".$row['username']."'".')">Approve</button>
                        <!--form action="back/approve.php" method="POST">
                            <input class="sr-only" name="username" value="">
                            <button class="btn btn-warning btn-sm" type="submit" name="submit">Approve</button>
                        </form-->
                    </td>'
                .'</tr>';*/
            
        }

        
        echo '<!--div class="modal fade" id="approveform" role="dialog">
                <div class="modal-dialog">
                
               
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Assign Docotor and Room</h4>
                    </div>
                    <div class="modal-body">
                        <form action="back/approve.php" method="POST">
                            <div class="form-group">
                                <label for="doctor">Doctor</label>
                                <input id="doctor" type="text" class="form-control" name="doctor">
                            </div>
                            <div class="form-group">
                                <label for="room">Room</label>
                                <input id="room" type="text" class="form-control" name="room">
                            </div>
                            <div class="form-group">
                                <label for="datetime">Time</label>
                                <input id="datetime" type="text" class="form-control" name="datetime">
                            </div>
                            <input class="sr-only" id="approveusername" name="username" value="">
                            <button class="btn btn-info" type="submit" name="submit">SET</button>
                        </form>
                      
                    </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  
                </div>
              </div-->';
        
    }
    else{
        echo '<center><p>Not Found</p><center>';
    }  
   
}



?>