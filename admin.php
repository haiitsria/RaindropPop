<!DOCTYPE html>
<html lang="en">
<!-- this file is the container page for the administrative tools of the site. -->

    <head>
    <title>Raindrop Pop Administrative</title>
    <meta charset="utf-8">
    <meta name="description" content="Store">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    
    <body>
         
        <?php include 'navmenu.php'; ?>


        <?php
			include("db_connect.php");

			$currentUser = $_SESSION['logged_in_user'];

			$sql = "SELECT * FROM raindrop_users WHERE username='$currentUser'";	//select from items table
			$result = mysqli_query($connection,$sql); 	   //Run the query

			$row = mysqli_fetch_assoc($result);

			if ($row['admin'] < 2) {
				header("Location: home.php");
			}
		?>

  <div class="container">
    <center><h4>Administrative Tools</h4></center><BR>

  <div class="divider"></div>
  <div class="section center">
    <div class="row">
    <div class="col s12 m6 l4">
        <a class="btn waves-effect waves-light btn-small" href="vieworders.php">View Orders</a>
    </div>
    <div class="col s12 m6 l4">
        <button class="btn waves-effect waves-light btn-small">Manage Users</button>
    </div>
    <div class="col s12 m6 l4">
        <?php include 'createitem.php'; ?>
    </div>
    </div>
  </div>

        

<div class="card">
<div class="card-content">
<center><h4>Warehouse Inventory</h4></center><BR>

<div class="divider"></div>
 <div class="section">
    <div class="row">
        <div class="col s12 m6 l2">
          <h6>Product</h6>
        </div>
        <div class="col s12 m6 l2">
          <h6>Cost</h6>
        </div>
        <div class="col s12 m6 l2">
          <h6>Price</h6>
        </div>
        <div class="col s12 m6 l2">
          <h6>Stock</h6>
        </div>
        <div class="col s12 m6 l2">
          <h6>Size</h6>
        </div>
        <div class="col s12 m6 l1">
         <h6>QTY</h6>
        </div>
        <div class="col s12 m6 l1">
        </div>
    </div>
</div>

<div class="row">
    <?php include 'deleteproduct.php'; ?>
</div>

</div>
</div>
</div>
	
	<?php include 'footer.php'; ?>   
    
    </body>
</html>