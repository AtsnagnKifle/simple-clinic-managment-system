<?php
    session_start();
    if(isset($_SESSION['id'])){
        header("Location: user/index.php");
        exit();

    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMS</title>
    <link rel="stylesheet" href="statics/css/bulma.css">
</head>

<body>


    <form action="back/login.php" name="loginForm" method="POST">
        <div class="hero is-medium">
            <div class="hero-body">
                <div class="columns is-centered">
                    <div class="column is-3">
                        <div class="container">
                            <div class="title has-text-centered">
                                Login
                            </div>
                            <br>
                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">
                                        <p class="control is-expanded has-icons-left">
                                            <input class="input" name="username" type="text" placeholder="Username" required>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">
                                        <p class="control is-expanded has-icons-left">
                                            <input class="input" type="password" name="password" placeholder="Password" required>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="has-text-centered">
                                <button class="button is-success" type="submit" name="submit" onclick=validateForm()>Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

<div class="panel-block has-text-centered">

<div id="his" class="column is-10 has-text-centered" style="margin: auto;">
    
    <div class="modal" id='error'>
        <div class="modal-background">
            <div class="columns">
                <div class="column"></div>
                <div class="column is-6 is-vcentered ">
                    <div class="column">
                        <br><br>
                    </div>
                    
                        <div class="hero is-black">
                            <div class="column" style="padding:5%;">
                            
                                <div class="container has-text-centered content">
                                    <div class="title has-text-weight-light" style="color:red;">
                                        Login Error
                                    </div>
                                    
                                    <p style="color:red;">
                                        incorrect user name or password
                                    </p>
                                 
                                </div>
                            </div>
                        </div>
                        <button class="modal-close is-large" aria-label="close"
            onclick="document.getElementById('error').setAttribute('class','modal')"></button>
                </div>
                <div class="column"></div>
            </div>
            
        </div>

        
    </div>
    <?php
        if(isset($_SESSION['errorLogin'])){
            if($_SESSION['errorLogin']=="Y"){
                
                echo '<script>document.getElementById("error").setAttribute("class","modal is-active");</script>';

            }
            $_SESSION['errorLogin']="";


            }
        ?>

    
    <script>
        
        function validateForm() {
            var user = document.forms["loginForm"]["username"].value;
            var pass = document.forms["loginForm"]["password"].value;
            if (user == "" || pass == "") {
                //document.getElementById("approve_appointment").setAttribute("class","modal is-active");
                //document.getElementById("error").setAttribute("class","modal is-active");
                //return false;
            }
            
        }
    </script>
</body>

</html>
