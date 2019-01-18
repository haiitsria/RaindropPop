<?php
	include("db_connect.php");

   $flavor = $_GET['flavor'];

	$sql = "SELECT * FROM products WHERE ID='$flavor'"; 		   //select from items table
	$result = mysqli_query($connection,$sql); 	   //Run the query 

	$row = mysqli_fetch_assoc($result);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Raindrop Pop Select Item</title>
    <meta charset="utf-8">
    <meta name="description" content="Store">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>




    <div class="row">

      <div class="col s5">
        <div class="section center">
          <img <?php echo "src=img/".$row['image'];?> alt="pic">
        </div>
        <!-- Add to Cart -->
        <div class="section center">  
        <form action="" method="POST">
            <button class="btn waves-effect waves-light " type="submit" name="addtocart">Add to Cart</button>
        </form>
        </div>
      </div>
      <!-- Item Description -->
      <div class="col s7">
        <h5><?php echo $row['product'];?></h5><BR>
        <p class=""><?php print $row['description'];?></p><BR>
        <p class="spec"><?php echo "Price: $" . $row['price'];?></p>
        <p class="spec"><?php echo "Quantity: " . $row['quantity'];?></p>
        <p class="spec"><?php echo "Size: " . $row['size'];?></p>
        <p class="spec"><a href="category.php?category=<?php echo $row['category']; ?>"><?php echo "Category: " . $row['category'] . " " . "Sodas";?></a></p>
        <BR>
        <p class="spec"><?php if ($row['stock'] > 0) {
        echo "IN STOCK";
        }
        else{
        echo "SOLD OUT";
        }
        ?>
        </p>

        <BR>

        <?php include("rating.php"); ?>

        <?php include("rate.php");  ?><BR>

        <?php include("displaycomments.php"); ?>

      </div>

    </div>



<div class="divider"></div>
<BR>


<?php


    //$cartstring = sha1(sha1(rand(1, 9999)."salt")."salt");


    //echo $_SESSION['hascart']."<br>";
    //echo $_SESSION['cartstring'];

    $cartstring = $_SESSION['cartstring'];

    if (isset($_POST['addtocart'])) {

        $sql = "SELECT * FROM carts WHERE cart_hash = '$cartstring' AND products = '$product'"; //Check to see if cart already exists
        $result = mysqli_query($connection, $sql); //store results of query in $result var

        $cart_row = mysqli_fetch_assoc($result);
        
                if (mysqli_num_rows($result) == 1){ //If a cart is in the database
                    
                    $quantity = $cart_row['quantities'];

                    $sql = "UPDATE carts SET quantities = '$quantity'+1 WHERE cart_hash = '$cartstring' AND products = '$product'";
                    mysqli_query($connection, $sql);

                    echo "<center>The item was already in the cart. Quantity updated.</center>";

                    //header("Refresh: 0; url=cart.php");
            
                }else{  //If new cart

                    $quantity = 1;
                    
                    $sql = "INSERT INTO carts (ID, cart_hash, products, quantities) VALUES (NULL, '$cartstring', '$product', '$quantity')";
                    mysqli_query($connection, $sql);

                    echo "<center>Added a new item to cart!</center>";

                    //header("Refresh: 0; url=cart.php");
                }
    } 
?>




    <!-- Javascript -->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="js/init.js"></script>
    
    </body>

</html>