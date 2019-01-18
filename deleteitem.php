<?php 
/*This file delets the selected item (in the cart), or empties the whole cart, depending on what button was clicked. */
    
    $cartstring = $_SESSION['cartstring']; //What user is making the request
    //Delete all item in cart
    if (isset($_POST['clearcart'])) {
        $sql = "DELETE FROM carts WHERE cart_hash = '$cartstring'";
        mysqli_query($connection,$sql);

        echo '<script type="text/javascript">window.location = "cart.php"</script>'; //This refreshes the page w/ JS
    }

    //This deletes the item entirely
    if (isset($_POST['productId'])) {
        $productId = $_POST['productId'];
        $sql = "DELETE FROM carts WHERE cart_hash = '$cartstring' AND products = '$productId'";
        mysqli_query($connection,$sql);

        echo '<script type="text/javascript">window.location = "cart.php"</script>'; //This refreshes the page w/ JS
    }
    
    //This is adds 1 more of the item
    if (isset($_POST['addproduct'])) {

        $productId = $_POST['addproduct'];

        $sql1 = "SELECT * FROM carts WHERE cart_hash = '$cartstring' AND products = '$productId'"; //Check to see if cart already exists
        $result1 = mysqli_query($connection, $sql1); //store results of query in $result var
        $cart_row = mysqli_fetch_assoc($result1);
        $quantity = $cart_row['quantities'];

        $sql = "UPDATE carts SET quantities = '$quantity'+1 WHERE cart_hash = '$cartstring' AND products = '$productId'";

        mysqli_query($connection,$sql);

        echo '<script type="text/javascript">window.location = "cart.php"</script>'; //This refreshes the page w/ JS
    }

    //This is subtracts 1 of the item
    if (isset($_POST['subproduct'])) {

        $productId = $_POST['subproduct'];

        $sql1 = "SELECT * FROM carts WHERE cart_hash = '$cartstring' AND products = '$productId'"; //Check to see if cart already exists
        $result1 = mysqli_query($connection, $sql1); //store results of query in $result var
        $cart_row = mysqli_fetch_assoc($result1);
        $quantity = $cart_row['quantities'];

        if($quantity < 2){
            $sql = "DELETE FROM carts WHERE cart_hash = '$cartstring' AND products = '$productId'";
            mysqli_query($connection,$sql);
        }else{

        $sql = "UPDATE carts SET quantities = '$quantity'-1 WHERE cart_hash = '$cartstring' AND products = '$productId'";
        mysqli_query($connection,$sql);
        }

        echo '<script type="text/javascript">window.location = "cart.php"</script>'; //This refreshes the page w/ JS
    }
?>