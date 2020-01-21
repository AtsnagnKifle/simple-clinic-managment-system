<?php

    session_start();
    if(isset($_POST['submit']))
    {
        //include_once 'error.php';
        include_once 'db.php';
        $user = mysqli_real_escape_string($con,$_POST['username']);
        $pass = mysqli_real_escape_string($con,$_POST['password']);

        /*if(empty($user) || empty($pass))
        {
            $_SESSION['error']="empty";
            header("Location: ../index.php?empty");
            exit();
        }
        else{*/
            $qu = "SELECT * FROM user WHERE id = '$user'";
            $result = mysqli_query($con,$qu);
            $check = mysqli_num_rows($result);
            if($check<1)
            {    
                header("Location: ../index.php?invalid");
                exit();
            }
            else
            {
                
                $data = mysqli_fetch_assoc($result);
                if($data['password'] == $pass){
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['role'] = $data['role'];
                    if($_SESSION['role']=="doctor")
                    {
                        header("Location: ../user/doctor/index.php");
                        exit();
                    }
                    else if($_SESSION['role']=="laboratorist")
                    {
                        header("Location: ../user/laboratorist/index.php");
                        exit();
                    }
                    else if($_SESSION['role']=="manager"){
                        header("Location: ../user/manager/index.php");
                        exit();
                    }
                    else if($_SESSION['role']=="nurse"){
                        header("Location: ../user/nurse/index.php");
                        exit();
                    }
                    else if($_SESSION['role']=="patient")
                    {
                        header("Location: ../user/patient/index.php");
                        exit();
                    }
                    else if($_SESSION['role']=="pharmacist"){
                        header("Location: ../user/pharmacist/index.php");
                        exit();
                    }
                    else if($_SESSION['role']=="receptionist"){
                        header("Location: ../user/receptionist/index.php");
                        exit();
                    }
                   
                }
                else{
                    
                    header("Location: ../index.php?password");
                    exit();
                }
            
        }
    
    }
    else{
        header("Location: ../index.php?iio");

    }



?>