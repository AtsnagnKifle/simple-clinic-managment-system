<?php
    session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
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
                    
                    
                    <div class="panel-block">
                            <div id="his" class="column is-10 has-text-centered" style="margin: auto;">
                               
                                <section class="hero">

                                    <div class="hero-body">

                                        <div class="columns">
                                            <div class="column is-centered has-text-centered">
                                                <br>
                                                <div class="columns">
                                                    <div class="column">
                                                        <div class="content has-text-left" style="padding-left: 30%;">
                                                            <?php include_once 'back/profile.php';?>
                                                        </div>
                                                    </div>
                                                    <div class="column">
                                                        <figure class="image profile-img is-128x128">
                                                            <?php echo $pro;?>
                                                        </figure>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </section>
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



