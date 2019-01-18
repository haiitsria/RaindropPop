<?php
    
    include("db_connect.php");
    //session_start();
    ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Raindrop Pop Product Detail</title>
        <meta charset="utf-8">
        <meta name="description" content="Store">
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    
    <body>
         
        <?php include 'navmenu.php'; ?>



<div class="container">
<BR>
<center>
<h4>Product Details</h4>
</center>
<BR>    
<div class="card">
<div class="card-content">
<div class="row">
      <div class="row">
        <?php 
        include("select_item.php");
        ?>
      </div>
</div>
</div>
</div>
</div>
<BR>


<?php include 'footer.php'; ?>
        
    </body>

</html>