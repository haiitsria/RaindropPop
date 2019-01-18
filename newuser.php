<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Raindrop Pop New User</title>
        <meta charset="utf-8">
        <meta name="description" content="Store">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    
    <body>


<!-- Navigation -->      
         
<?php include 'navmenu.php'; ?>    

  <!-- New User Form -->      
<div class="container">
<BR>
<center>
<img src="img/RaindropPopLogoBadge.png" width=40%>
<h4>Create an Account</h4>
<h6>Already have an account? Login <a href="login.php">here</a>.</h6>
</center>
<BR>    
<div class="card">
<div class="card-content">
<div class="row">
<form id="signup" method="post" name="myform" >
			
			<div class="userInfo">
				<div class="input-field col s12">
				<input id="username" type="text" name="username" value="" placeholder="Username" onblur="validateUser()"><div id="checkimg"></div>
				<span class="hints" id="userHint">Username cannot contain special characters.</span>
				<br>
				</div>
				<div class="input-field col s12">
				<input id="password" type="password" name="password" value="" placeholder="Password" onblur="validatePass()"><div id="checkimg2"></div>
				<span class="hints" id="passHint">Password must be at least 8 characters</span>
				<br>
				</div>
				<div class="input-field col s12">
				<input id="verify" type="password" name="verify" value="" placeholder="Verify Password"onblur="validateVerify()"><div id="checkimg3"></div>
				<span class="hints" id="verifyHint">Passwords do not match.</span>
				<br>
				</div>
				<div class="input-field col s12">
				<input id="phonenum" type="text" name="phone" value="" placeholder="Phone number"onblur="validatePhone()"><div id="checkimg4"></div>
				<span class="hints" id="phoneHint">Must be 10 digits and use dashes.</span>
				<br>
				</div>
				<div class="input-field col s12">
				<input id="emailAdr" type="text" name="email" value="" placeholder="Email address" onblur="validateEmail()"><div id="checkimg5"></div>
				<span class="hints" id="emailHint">Must follow the format X@X.XXX.</span>
				<br>
				</div>
				<div class="input-field col s12">
				<input id="address" type="text" name="address" value="" placeholder="Street address" onblur="validateAddress()"><div id="checkimg6"></div>
				<span class="hints" id="addressHint">Address cannot contain special characters.</span>
				<br>
				</div>

				<button class="btn waves-effect waves-light right" id="createbtn" type="submit" name="submit">Submit
        		</button>

			</div>
		</form>
  </div>
</div>
</div>
</div>

<BR><BR>


<?php include 'footer.php'; ?>

    <!-- Javascript -->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="js/init.js"></script>
    <script src="js/process_form.js"></script>
       
    </body>

</html>



<?php
	include("db_connect.php"); //Connects to database

	$cartId = $_SESSION['cartstring'];
	
	if(isset($_POST['submit'])){
		
		$username = $_POST["username"];
		$password = $_POST["password"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$address = $_POST["address"];

		$phash = sha1(sha1($password."salt")."salt");
		$sql = "SELECT * FROM raindrop_users WHERE username='$username' AND password='$phash'"; //Check to see if account already exists
		$result = mysqli_query($connection, $sql); //store results of query in $result var
		
			if (mysqli_num_rows($result) == 1){	//If at least one result
				echo "Account already exists. Please try a new username."; //account already exists
		
			}else{	//If new account
				
				$sql = "INSERT INTO raindrop_users (id, username, password, email, admin, phone, address, cart_hash) VALUES (NULL, '$username', '$phash', '$email', '0', '$phone', '$address', '$cartId')"; //prepare to add stats to database table
				mysqli_query($connection, $sql); //run the query

				$_SESSION['logged_in'] = true;
				$_SESSION['logged_in_user'] = $username;
				$_SESSION['isAdmin'] = 0;

				//echo "Account successfully created. Log in to get started! You will be redirected to the login page in 5 seconds.";
				echo '<script type="text/javascript">window.location = "home.php"</script>';
			}
	}

?>