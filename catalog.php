<?php
    
    include("db_connect.php");
    //session_start();
    ?>

<!DOCTYPE html>
<html lang="en">

    <head>
    <title>Raindrop Pop Catalog</title>
    <meta charset="utf-8">
    <meta name="description" content="Store">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src=“https://www.googletagmanager.com/gtag/js?id=UA-129061865-1“></script>
    <script>
     window.dataLayer = window.dataLayer || [];
     function gtag(){dataLayer.push(arguments);}
     gtag(‘js’, new Date());

     gtag(‘config’, ‘UA-129061865-1’);
    </script>
    </head>
    
    <body>
         
        <?php include 'navmenu.php'; ?>
 

 <!-- Hero Image -->

<div class="parallax-container">
  <div class="parallax"><img src="img/products.jpg"></div>
</div>


            <div class="row">
                <div class="col s12">
                    <div class="row teal lighten-2">
                        <div class="container white-text">
                            <center><h4>View our Selections</h4></center>
                            <div class="section">
                                <div class="row center">
                                    <p>Here at Raindrop Pop we offer a huge selection of the latest and greatest flavors! Select by flavor or scroll down to view all products. Our warehouses are constantly being stocked with the newest and freshest sodas from around the world!</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="row center-align">
                <div class="col s2">
                    <?php include("sidebar.php"); ?>
                </div>
                <div class="col s10">
                    <?php include("itemgrab.php");?>
                </div>
            </div>
        </div>

<?php include 'footer.php'; ?>


    <!-- Javascript -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="js/init.js"></script>
        
    </body>

</html>

