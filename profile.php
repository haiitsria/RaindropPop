<!DOCTYPE html>
<html lang="en">

    <head>
    <title>Raindrop Pop My Account</title>
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
		?>


<div class="container">
<BR>
<center>
<h4>My Account</h4>
</center>
<BR>    
<div class="card">
<div class="card-content">
<div class="row">
      <div class="row">
        <div class="input-field col s6">
			<img id="avatar" src="img/avatar.png"><BR>
        </div>
        <div class="input-field col s6">
        	<h5><?php echo $row['username'];?></h5>
        	<div class="divider"></div><BR>
	        <p class="myinfo_text"><?php echo "E-mail:" . " " . $row['email'];?></p><BR>
	        <p class="myinfo_text"><?php echo "Shipping address: " . $row['address'];?></p><BR>
	        <p class="myinfo_text"><?php echo "Phone number: " . $row['phone'];?></p><BR>

	        <p class=""><?php if ($row['admin'] > 0) {
	            echo "ADMINISTRATOR";
	        }
	        ?></p><BR>

        <button class="btn waves-effect waves-light btn-small orange lighten-1" tid="edit_info_btn" onclick="document.getElementById('edituser_modal').style.display='block'">Edit Info</button>


        </div>
      </div>


  </div>
</div>
</div>
</div>


<?php
	include("db_connect.php");
	
	if(isset($_POST['submit'])) {//if not already logged in and form has been submitted
		$whatUser = $_SESSION['logged_in_user'];
		//$username = $_POST['username'];

		$sql = "SELECT * FROM raindrop_users WHERE username='$whatUser'"; //Check entered credentials against database, using encrypted password
		$result = mysqli_query($connection, $sql); //Execute the sql query and store result in $result
		if (mysqli_num_rows($result) == 1){		//if account exists

			$row = mysqli_fetch_assoc($result);

			if($_POST['email'] != ''){ 
				$email = $_POST['email'];
				$sql = "UPDATE raindrop_users SET email = '$email' WHERE username = '$whatUser'";
				mysqli_query($connection, $sql); //run the query
			}

			if($_POST['phone'] != ''){ 
				$phone = $_POST['phone'];
				$sql = "UPDATE raindrop_users SET phone = '$phone' WHERE username = '$whatUser'";
				mysqli_query($connection, $sql); //run the query

			}	
			
			if($_POST['shipping'] != ''){ 
				$address = $_POST['shipping'];
				$sql = "UPDATE raindrop_users SET address = '$address' WHERE username = '$whatUser'";
				mysqli_query($connection, $sql); //run the query
			}

			echo '<script type="text/javascript">window.location = "profile.php"</script>'; //Takes user to login page in 5 secs
		}		
	} 
?>

    <div id="edituser_modal" class="modal">

  		<form action="" method="POST">

	  		<div class="container">
			<BR>
			<span onclick="document.getElementById('edituser_modal').style.display='none'" class="close" title="Close">&times;</span>
			<BR>
			<center><h5>Edit Profile Information</h5></center>
			<BR>    
			<div class="card">
			<div class="card-content">
		      
		      <div class="row">
			  <div class="input-field col s12">
		      <input type="text" placeholder="Email Address" name="email">
		      </div>
			  </div>

		      <div class="row">
			  <div class="input-field col s12">
		      <input type="text" placeholder="Phone number" name="phone">
		      </div>
			  </div>

		      <div class="row">
			  <div class="input-field col s12">
		      <input type="text" placeholder="Shipping info" name="shipping">
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
	
	<?php include 'footer.php'; ?>   
    
    </body>

</html>