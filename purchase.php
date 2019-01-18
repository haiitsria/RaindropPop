<!DOCTYPE html>
<html lang="en">
<!-- this file is the container page for the cart code. -->

    <head>
    <title>Raindrop Pop Purchase</title>
    <meta charset="utf-8">
    <meta name="description" content="Store">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    
    <body>      
    <?php include 'navmenu.php'; 
    	  include 'deleteitem2.php';
    	  include 'orders.php';
   	?>





    <div class="container">
  <center><h4>Review Order</h4></center><BR>

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
      $cart_result = mysqli_query($connection, $sqlQuery);   
      $count =  mysqli_num_rows($cart_result); //See if there are items in the table
      $total = 0; //sets initial cart total to 0

//=========================================================THIS PART LOOPS THROUGH ALL ITEMS IN CART AND DISPLAYS THEM, + BUTTONS TO EDIT QUANTITY/REMOVE=================================// 
      
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
      	?>


      	<?php 
      	}else{ 
      	?>


<div class="container">
  <center><h4>Review Order</h4></center><BR>

<div class="card">
<div class="card-content">

<div class="row">

  <div class="divider"></div><BR>
  <div class="section">
    <div class="row">
    <div class="col s12 m6 l12">
        <center><img src="img/RaindropPopLogoBadge.png" width=40%></center><BR>
      		<p class="noitems"><center>There are no items in your cart. Visit the store to get started!</center></p>
     </div>
    </div>
  </div>
  
  </div>

    </div>

  </div>
  </div>


      	<?php    }	





//=========================================================THIS PART GETS THE SHIPPING INFORMATION FROM THE USERS DB AND ALLOWS EDITING================================================//

    if(isset($_SESSION['logged_in'])){

			$user_sql = "SELECT * FROM raindrop_users WHERE cart_hash = '$cartstring'";
	        $user_result = mysqli_query($connection,$user_sql); //Run the query 
	        $user_row = mysqli_fetch_assoc($user_result);
	        ?>

<div class="divider"></div>
<div class="section">

    <div class="row">
    <div class="col s12 m6 l4">
      <p>Your purchase will be shipped to the following address:</p><BR>
    </div>

    <div class="col s12 m6 l3">
      <p><?php echo $user_row['address'];?></p><BR>
      <button class="btn waves-effect waves-light btn-small" id="edit_info_btn" onclick="document.getElementById('edituser_modal').style.display='block'">Edit Shipping Info</button>
    </div>
    <div class="col s12 m6 l1">
      
    </div>

  </div>
</div>
</div>

	<?php 
		}
	?>
  
<!--===================================================THIS IS THE SHIPPING UPDATE MODAL=================================================-->
<?php
        if(isset($_POST['changeshipping'])) {//if not already logged in and form has been submitted
			$whatUser = $_SESSION['logged_in_user'];

			$sql = "SELECT * FROM raindrop_users WHERE username='$whatUser'"; //Check entered credentials against database, using encrypted password
			$result = mysqli_query($connection, $sql); //Execute the sql query and store result in $result
			if (mysqli_num_rows($result) == 1){		//if account exists

				$row = mysqli_fetch_assoc($result);
			
				if($_POST['shipping'] != ''){ 
					$address = $_POST['shipping'];
					$sql = "UPDATE raindrop_users SET address = '$address' WHERE username = '$whatUser'";
					mysqli_query($connection, $sql); //run the query
					
					echo '<script type="text/javascript">window.location = "purchase.php"</script>'; //This refreshes the page w/ JS
				}
			}		
		} 
?>


<div id="edituser_modal" class="modal">

  <form action="" method="POST">

    <div class="container">
      <BR>
      <span onclick="document.getElementById('edituser_modal').style.display='none'" class="close right-align" title="Close">&times;</span>
      <BR>
      <center>
        <h4>Edit Shipping Information</h4>
      </center>
      <BR>    
      <div class="card">
        <div class="card-content">

          <div class="row">
            <form class="col s12" action="" method="POST">

              <div class="row">
                <div class="input-field col s12">
                  <input type="text" placeholder="Shipping Address" name="shipping">
                </div>
              </div>
          
          </div>


        </div>
      </div>

      <div class="row col s3 right">
        <button class="btn waves-effect waves-light right" type="submit" name="changeshipping">Save</button>
      </div>

    </div>
  </form>
</div>


		<script>
			// Get the modal
			var modal = document.getElementById('edituser_modal');

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
			    if (event.target == modal) {
			        modal.style.display = "none";
			    }
			}
		</script>
<!--===================================================THIS IS THE CHECKOUT MODAL=====================================================-->

<div class="divider"></div>
<div class="section">
    <div class="row">
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
    <div class="col s12 m6 l4">
        <?php include 'paypal.php'; ?>

               <input type="hidden" name="item_name_{$item_name}" value="{$row['product']}">
               <input type="hidden" name="item_number_{$item_number}" value="{$row['ID']}">
               <input type="hidden" name="amount_{$amount}" value="{$row['productPrice']}">
               <input type="hidden" name="quantity_{$quantity}" value="{$value}">
    </div>

</div>
</div>
</div>
</div>
</div>
<!--=====================================================================================================================================-->
        <?php include 'footer.php'; ?>
        
    </body>
</html>