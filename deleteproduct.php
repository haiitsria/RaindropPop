<?php 
/*This file creates a list of all products in the database and also allows the admin to delete them.*/
    $sql = "SELECT * FROM products";  //select all from items table
    $result = mysqli_query($connection,$sql);  //Run the query 
    $i = 0;

    while($row = mysqli_fetch_array($result)){ //Loops through every result that was returned
    	
    	$i++;
        $itemToDelete = $row['ID'];

    	if($i % 2 == 0){
        	?>



  <div class="divider"></div>
  <BR>

    <div class="row">

        <div class="col s12 m6 l2">
          <a class="name_cell" href="item.php?flavor=<?php echo $row['ID']; ?>"><?php echo $row['product'];?></a>
        </div>
        <div class="col s12 m6 l2">
          $<?php echo $row['cost']; ?>
        </div>
        <div class="col s12 m6 l2">
          $<?php echo $row['price']; ?>
        </div>
        <div class="col s12 m6 l2">
          <?php echo $row['stock']; ?>
        </div>
        <div class="col s12 m6 l1">
          <?php echo $row['size']; ?>
        </div>
        <div class="col s12 m6 l1">
         <?php echo $row['quantity']; ?>
        </div>
        <div class="col s12 m6 l2">
          <form class="admindelete" action="" method="POST">
              <button class="btn waves-effect waves-light btn-small orange lighten-1" type="submit" name="deleteproduct">Remove</button>
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
          <a class="name_cell" href="item.php?flavor=<?php echo $row['ID']; ?>"><?php echo $row['product'];?></a>
        </div>
        <div class="col s12 m6 l2">
          $<?php echo $row['cost']; ?>
        </div>
        <div class="col s12 m6 l2">
          $<?php echo $row['price']; ?>
        </div>
        <div class="col s12 m6 l2">
          <?php echo $row['stock']; ?>
        </div>
        <div class="col s12 m6 l1">
          <?php echo $row['size']; ?>
        </div>
        <div class="col s12 m6 l1">
         <?php echo $row['quantity']; ?>
        </div>
        <div class="col s12 m6 l2">
          <form class="admindelete" action="" method="POST">
              <button class="btn waves-effect waves-light btn-small orange lighten-1" type="submit" name="deleteproduct">Remove</button>
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
        $sql = "DELETE FROM products WHERE ID = '$productId'";
        mysqli_query($connection,$sql);

        echo '<script type="text/javascript">window.location = "admin.php"</script>'; //This refreshes the page w/ JS
    }

?>