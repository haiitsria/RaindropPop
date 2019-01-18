<!DOCTYPE html>
<html lang="en">
<!-- this file is the container page for the cart code. -->

    <head>
    <title>Raindrop Pop Orders</title>
    <meta charset="utf-8">
    <meta name="description" content="Store">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    
    <body>      
    <?php include 'navmenu.php'; ?>



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
        <a class="btn waves-effect waves-light btn-small" href="admin.php">Warehouse Inventory</a>
    </div>
    </div>
  </div>

        

<div class="card">
<div class="card-content">
<center><h4>Current Orders</h4></center><BR>

<div class="divider"></div>
 <div class="section">
    <div class="row">
        <div class="col s12 m6 l2">
          <h6>Date</h6>
        </div>
        <div class="col s12 m6 l2">
          <h6>Name</h6>
        </div>
        <div class="col s12 m6 l2">
          <h6>Address</h6>
        </div>
        <div class="col s12 m6 l2">
          <h6>Order</h6>
        </div>
        <div class="col s12 m6 l2">
          <h6>QTY</h6>
        </div>
        <div class="col s12 m6 l1">
         <h6>Total</h6>
        </div>
        <div class="col s12 m6 l1">
        </div>
    </div>
</div>







<?php 
/*This file creates a list of all products in the database and also allows the admin to delete them.*/
    $sql = "SELECT * FROM orders";  //select all from items table
    $result = mysqli_query($connection,$sql);  //Run the query 
    $i = 0;

    while($row = mysqli_fetch_array($result)){ //Loops through every result that was returned

        $orderId = $row['order_id'];

        $sqli = "SELECT * FROM orders WHERE order_id = '$orderId'";  //select all from items table
        $resulti = mysqli_query($connection,$sqli);  //Run the query 

        $i++;
        $itemToDelete = $row['ID'];

        $whatuser = $row['user_id'];
        $whatitem = $row['products'];

        $sql2 = "SELECT * FROM raindrop_users WHERE cart_hash='$whatuser'";    //select from items table
        $result2 = mysqli_query($connection,$sql2);      //Run the query
        $row_user = mysqli_fetch_assoc($result2);

        $sql3 = "SELECT * FROM products WHERE ID='$whatitem'";    //select from items table
        $result3 = mysqli_query($connection,$sql3);      //Run the query
        $row_products = mysqli_fetch_assoc($result3);

            if($i % 2 == 0){
                ?>


  <div class="divider"></div>
  <BR>

    <div class="row">

        <div class="col s12 m6 l2">
          <?php echo $row['order_date']; ?>
        </div>
        <div class="col s12 m6 l2">
          <?php echo $row['card_name'];?>
        </div>
        <div class="col s12 m6 l2">
          <?php echo $row['shipping']; ?>
        </div>
        <div class="col s12 m6 l2">
          <?php echo $row_products['product']; ?>
        </div>
        <div class="col s12 m6 l1">
          <?php echo $row['quantities']; ?>
        </div>
        <div class="col s12 m6 l1">
         $<?php echo $row['total']; ?>
        </div>
        <div class="col s12 m6 l2">
          <form class="admindelete" action="" method="POST">
              <button class="btn waves-effect waves-light btn-small orange lighten-1" type="submit" name="deleteproduct">Cancel</button>
              <input type="hidden" name="productId" value="<?php echo $itemToDelete; ?>">
          </form>  
        </div>

    </div>


  
            <?php
            }else{
                ?>


  <div class="divider"></div>
  <BR>

    <div class="row">

        <div class="col s12 m6 l2">
          <?php echo $row['order_date']; ?>
        </div>
        <div class="col s12 m6 l2">
          <?php echo $row['card_name'];?>
        </div>
        <div class="col s12 m6 l2">
          <?php echo $row['shipping']; ?>
        </div>
        <div class="col s12 m6 l2">
          <?php echo $row_products['product']; ?>
        </div>
        <div class="col s12 m6 l1">
          <?php echo $row['quantities']; ?>
        </div>
        <div class="col s12 m6 l1">
         $<?php echo $row['total']; ?>
        </div>
        <div class="col s12 m6 l2">
          <form class="admindelete" action="" method="POST">
              <button class="btn waves-effect waves-light btn-small orange lighten-1" type="submit" name="deleteproduct">Cancel</button>
              <input type="hidden" name="productId" value="<?php echo $itemToDelete; ?>">
          </form>  
        </div>

    </div>



            <?php 
        } 
    }

    //This is supposed to delete the appropriate item, has some issues as of right now...
    if (isset($_POST['productId'])) {

        $productId = $_POST['productId'];
        $sql = "DELETE FROM orders WHERE ID = '$productId'";
        mysqli_query($connection,$sql);

        echo '<script type="text/javascript">window.location = "vieworders.php"</script>'; //This refreshes the page w/ JS
    }
?>


</div>
</div>
</div>

    <?php include 'footer.php'; ?>

    </body>
</html>