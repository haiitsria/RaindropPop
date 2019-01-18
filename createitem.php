<!--This file makes an item creation modal and provides the code to upload an image, then places the relevant information and image name into the products database.-->

    <button class="btn waves-effect waves-light btn-small" id="edit_info_btn" onclick="document.getElementById('edituser_modal').style.display='block'">Add a Product</button>



    <div id="edituser_modal" class="modal">

  		<form action="" method="POST">

	  		<div class="container">
			<BR>
			<span onclick="document.getElementById('edituser_modal').style.display='none'" class="close" title="Close">&times;</span>
			<BR>
			<center><h5>Add an Item to the Store</h5></center>
			<BR>    
			<div class="card">
			<div class="card-content">
		      
		      <div class="row">
			  <div class="input-field col s12">
		      <input type="text" placeholder="Product Name" name="name">
		      </div>
			  </div>

		      <div class="row">
			  <div class="input-field col s12">
		      <input type="text" placeholder="Product Description" name="description">
		      </div>
			  </div>

		      <div class="row">
			  <div class="input-field col s12">
		      <input type="text" placeholder="Category" name="category">
		      </div>
			  </div>

			  <div class="row">
			  <div class="input-field col s12">
		      <input type="text" placeholder="Our Cost" name="cost">
		      </div>
			  </div>

			  <div class="row">
			  <div class="input-field col s12">
		      <input type="text" placeholder="Price per Unit" name="price">
		      </div>
			  </div>

			  <div class="row">
			  <div class="input-field col s12">
		      <input type="text" placeholder="Number of Items in Stock" name="stock">
		      </div>
			  </div>

			  <div class="row">
			  <div class="input-field col s12">
		      <input type="text" placeholder="Size in Ounces" name="size">
		      </div>
			  </div>

			  <div class="row">
			  <div class="input-field col s12">
		      <input type="text" placeholder="Quantity per Order" name="quantity">
		      </div>
			  </div>

			  <div class="row">
			  <div class="input-field col s12">
    		  <input type="file" name="myimage">
		      </div>
			  </div>

			</div>  
		    </div>

			  <div class="row right">
			  <button class="btn waves-effect waves-light right" type="submit" name="submit">Save</button>
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

<?php
include("db_connect.php");
	
	if(isset($_POST['submit'])){

		$file = $_FILES['myimage'];

		$fileName = $_FILES['myimage']['name'];
		$fileTmpName = $_FILES['myimage']['tmp_name'];
		$fileSize = $_FILES['myimage']['size'];
		$fileError = $_FILES['myimage']['error'];
		$fileType = $_FILES['myimage']['type'];

		$fileExt = explode('.', $fileName);
		$FileActualExt = strtolower(end($fileExt));

		$allowed = array('jpg', 'jpeg', 'png');
		if (in_array($FileActualExt, $allowed)) {
			if ($fileError === 0) {
				if ($fileSize < 500000) {
					$fileNameNew = uniqid('', true) . "." . $FileActualExt;
					$fileDestination = 'img/' . $fileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);

					//header("Refresh: 1; url=admin.php");
				}else{
					echo "The file was to large. Select a smaller one.";
				}
			}else{
				echo "There was a problem with the file.";
			}
		}else{
			echo "Not a valid file type. Please use jpg or png.";
		}

		
		$productname = $_POST["name"];
		$description = $_POST["description"];
		$category = $_POST["category"];
		$cost = $_POST["cost"];
		$price = $_POST["price"];
		$stock = $_POST["stock"];
		$size = $_POST["size"];
		$quantity = $_POST["quantity"];

		$image = $fileNameNew;

		$sql2 = "SELECT * FROM products WHERE product='$productname'"; //Check to see if product already exists
		$result = mysqli_query($connection, $sql2); //store results of query in $result var
		
			if (mysqli_num_rows($result) == 1){	//If at least one result
				echo "Item is already in the database."; //if product is already there
		
			}else{	//If new product
				$sql2 = "INSERT INTO products (ID, product, description, category, stock, cost, price, image, size, quantity) VALUES (NULL, '$productname', '$description', '$category', '$cost', '$price', '$stock', '$image', '$size', '$quantity')";  //prepare to add stats to database table
				mysqli_query($connection, $sql2); //run the query
				
			echo '<script type="text/javascript">window.location = "admin.php"</script>'; //This refreshes the page w/ JS
			}

	}
?>