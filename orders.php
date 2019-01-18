<?php
/* This file */
    //Cart stuff
    if (isset($_POST['checkout'])) {

    	$cartstring = $_SESSION['cartstring']; //Transfers the Session var to a regualr var

	    $sqlQuery = "SELECT * FROM carts WHERE cart_hash = '$cartstring'"; //Get the items that are assigned to the session of the user
	    $cart_result = mysqli_query($connection, $sqlQuery); 

        $sql = "SELECT * FROM orders WHERE user_id = '$cartstring'"; //Check to see if order already exists
        $result = mysqli_query($connection, $sql); //store results of query in $result var

        //==========================================THIS SECTION GETS THE SHIPPING ADDRESS======================================

        if(isset($_SESSION['logged_in'])){
		    
            $currentUser = $_SESSION['logged_in_user'];
            $sql_u = "SELECT * FROM raindrop_users WHERE username='$currentUser'";  //select from items table
            $result_u = mysqli_query($connection,$sql_u);  //Run the query
            $row_u = mysqli_fetch_assoc($result_u);

            $shipping = $row_u['address'];
        }else{
            $shipping = $_POST['address'] . " " . $_POST['city'] . ", " . $_POST['state'];
        }

        //==========================================THIS SECTION CHECKS IF THE ORDER ID EXISTS======================================
        
        if (mysqli_num_rows($result) == 1){ //If a cart is in the database
            echo "Error, ID is = to an existing order.";
            
        }else{  //If its a new cart

        //=========================================IF ORDER ID IS NEW, INSERT ITEMS=================================================

            $orderId = sha1(sha1(rand(1, 9999)."salt")."salt");

            $type = $_POST['cardtype'];
            $name = $_POST['cardname'];
            $card_num = $_POST['cardnumber'];
            $cvv = $_POST['cvv'];
            $expiry = $_POST['expiry'];

			while($cart_row = mysqli_fetch_array($cart_result)){

				$product = $cart_row['products'];
				$quantity = $cart_row['quantities'];
				$orderDate = date("F j, Y, g:i a");

                $sql = "SELECT * FROM products WHERE ID = '$product'"; //select from items table
                $result = mysqli_query($connection,$sql); //Run the query 
                $row = mysqli_fetch_assoc($result);

                $subtotal = $row['price'] * $cart_row['quantities'];
		
	            $sql = "INSERT INTO orders (ID, user_id, order_id, products, quantities, total, shipping, order_date, card_name, card_type, card_num, cvv, expdate) VALUES (NULL, '$cartstring', '$orderId', '$product', '$quantity', '$subtotal', '$shipping', '$orderDate', '$name', '$type', '$card_num', '$cvv', '$expiry')";
	               mysqli_query($connection, $sql);
	           }
        }

        $sql = "DELETE FROM carts WHERE cart_hash = '$cartstring'";
        mysqli_query($connection,$sql);

        echo '<script type="text/javascript">window.location = "cart.php"</script>'; //This refreshes the page w/ JS
    } 
?>