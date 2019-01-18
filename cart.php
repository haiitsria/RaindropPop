<!DOCTYPE html>
<html lang="en">
<!-- this file is the container page for the cart code. -->

    <head>
    <title>Raindrop Pop Cart</title>
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
    <center><h4>Shopping Cart</h4></center><BR>

<div class="card">
<div class="card-content">

  <div class="section">
    <div class="row">
    <div class="col s12 m6 l2">
    </div>
    <div class="col s12 m6 l2">
      <h6>Product</h6>
    </div>
    <div class="col s12 m6 l2">
      <h6>Price</h6>
    </div>
    <div class="col s12 m6 l2">
      <h6>Quantity</h6>
    </div>
    <div class="col s12 m6 l2">
      <h6>Total</h6>
    </div>
    <div class="col s12 m6 l2">
      <form class="emptycart" action="" method="POST">
          <button class="btn waves-effect waves-light btn-small red lighten-1" type="submit" name="clearcart" value="Empty Cart">Empty Cart</button>
      </form>
    </div>
    </div>
  </div>
       	
    <?php

      $cartstring = $_SESSION['cartstring']; //Transfers the Session var to a regualr var

      $sqlQuery = "SELECT * FROM carts WHERE cart_hash = '$cartstring'"; //Get the items that are assigned to the session of the user

      $total = 0; //sets initial cart total to 0

      include 'deleteitem.php';

      $cart_result = mysqli_query($connection, $sqlQuery);   
      $count =  mysqli_num_rows($cart_result); //See if there are items in the table
      
      if($count >= 1) { //Only display something IF there is at least 1 item in cart
          while($cart_row = mysqli_fetch_array($cart_result)){ //While there are items in the cart database w/ the matching cart_hash id, print them out in this loop


              $products = $cart_row['products'];
              $sql = "SELECT * FROM products WHERE ID = '$products'"; //select from items table
              $result = mysqli_query($connection,$sql); //Run the query 
              $row = mysqli_fetch_assoc($result);

              $subtotal = $row['price'] * $cart_row['quantities'];
              $total += $subtotal;
            
              ?>


<div class="row">

  <div class="divider"></div><BR>
  <div class="section">
    <div class="row">
    <div class="col s12 m6 l2">
      <a href="item.php?flavor=<?php echo $cart_row['products']; ?>"><img class="preview" <?php echo "src=img/".$cart_row['products'];?> alt="pic"></a> 
      <BR>  
    </div>
    <div class="col s12 m6 l2">
      <h6><?php echo $row['product'];?></h6>
      <p>Size: <?php echo $row['size'];?></p>
    </div>
    <div class="col s12 m6 l2">
      <p>$<?php echo $row['price'];?></p>
    </div>
    <div class="col s12 m6 l2">
      <p><?php echo $cart_row['quantities'];?></p>      
    </div>
    <div class="col s12 m6 l2">
      <p class="subtotal">$<?php echo $subtotal;?></p>
    </div>
    <div class="col s12 m6 l2">
      <form class="plusbtn" action="" method="POST">
          <button class="btn-flat waves-effect waves-light" type="submit" name="additem">
            <i class="material-icons">add</i>
          </button>
          <input type="hidden" name="addproduct" value="<?php echo $products; ?>">
      </form>
      <BR>
      <form class="minusbtn" action="" method="POST">
          <button class="btn-flat waves-effect waves-light" type="submit" name="subitem">
            <i class="material-icons">remove</i>
          </button>
          <input type="hidden" name="subproduct" value="<?php echo $products; ?>">
      </form>
      <BR><BR>
      <form class="deletebtn" action="" method="POST">
          <button class="btn waves-effect waves-light btn-small orange lighten-1" type="submit" name="deleteitem">Delete</button>
          <input type="hidden" name="productId" value="<?php echo $products; ?>">
      </form>  
    </div>
    </div>
  </div>
  
  </div>


      <?php    
          } //ends while loop
      } //ends IF that checks if there items
      else{ 
          ?><p class="noitems center">There are no items in your cart. Visit the store to get started!</p>
          <?php
      }
      ?>  

<div class="divider"></div>
<div class="section">
    <div class="row">
    <div class="col s12 m6 l2">
    </div>
    <div class="col s12 m6 l2">
    </div>
    <div class="col s12 m6 l2">
    </div>
    <div class="col s12 m6 l2">
      <h6>Total:</h6>
    </div>
    <div class="col s12 m6 l2">
     <h6>$<?php echo $total;?></h6>      
    </div>
    <div class="col s12 m6 l2">
      <a class="btn waves-effect waves-light btn-small" href="purchase.php">Checkout</a>
    </div>

</div>
</div>


</div>
</div>




      </div>

        <?php include 'footer.php'; ?>
        
    </body>

</html>