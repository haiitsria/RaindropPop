<?php
    include("db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">

    <head>
    <title>Raindrop Pop Search</title>
    <meta charset="utf-8">
    <meta name="description" content="Store">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    
    <body>
         
        <?php include 'navmenu.php'; ?>

 <!-- Hero Image -->

<div class="parallax-container">
  <div class="parallax"><img src="img/products.jpg"></div>
</div>

<!-- Banner -->

<div class="row teal lighten-2">
  <div class="container white-text">
    <center><h4>Product Search Results</h4></center>
    </div>
  </div>
</div>

        <div class="container">

        <?php
		include("db_connect.php");
		
		mysqli_select_db($connection, "products");

		$output = "";

		if (isset($_POST['search'])) {
			$searchq = $_POST['search'];
			$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

			$min_length = 3;
			$query = mysqli_query($connection, "SELECT * FROM products WHERE product LIKE '%$searchq%' OR category LIKE '%$searchq%' OR description LIKE '%$searchq%'") or die ("could not search.");
			$count = mysqli_num_rows($query);
			if ($count == 0 || strlen($searchq) < $min_length) { //If nothing was found or the search was not at least 3 characters:
				$output = "There were no search results. Please try something else.";

				?><p class="searchresult"><?php echo $output;?> </p>
			<?php	
			}

			else{ //IF there ARE results, they get printed out here.
				?><div class="wrapper"><?php

				while($row = mysqli_fetch_array($query)){
					?>


       <div class="item col s2" id="<?php echo $row['category'];?>">
            <center>
            <a href="item.php?flavor=<?php echo $row['ID']; ?>">
                <img class="preview" <?php echo "src=img/".$row['image'];?> alt="pic"></a>
            <p><?php echo $row['product'];?></p>
            <p><?php echo "$" . $row['price'];?></p>
            <a href="category.php?category=<?php echo $row['category']; ?>">
            <p><?php echo "Category: " . $row['category'] . " " . "Sodas";?></p></a>
            </center>

        </div>

			        <?php
	    		}
			}
		}
	 	?>
        </div>

    </div>

		<?php include 'footer.php'; ?>
        
    </body>
</html>