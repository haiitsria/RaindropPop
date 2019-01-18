<?php
/* This file displays the navigation menu, and prints different ones depending on the user access level. It also contains the login modal, and associated processing code. In that modal it links to the account creation page as well. */
	session_start();

	include("db_connect.php"); //connect to database
	
	if((isset($_POST['submit'])) && (!isset($_SESSION['logged_in']))) {//if not already logged in and form has been submitted

		$username = $_POST['username'];
		$password = $_POST['password'];
		$phash = sha1(sha1($password."salt")."salt");
		$sql = "SELECT * FROM raindrop_users WHERE username='$username' AND password='$phash'"; //Check entered credentials against database, using encrypted password
		$result = mysqli_query($connection, $sql); //Execute the sql query and store result in $result
		if (mysqli_num_rows($result) == 1){		//if account exists

			$row = mysqli_fetch_assoc($result);
			
			$_SESSION['logged_in'] = true;
			$_SESSION['logged_in_user'] = $username;
			$_SESSION['hascart'] = 1;
			$_SESSION['cartstring'] = $row['cart_hash'];

			/*$message = $row['admin'];
			echo "<script type='text/javascript'>alert('$message');</script>";*/ //DEBUG FOR ADMIN STATUS

			if($row['admin'] == 2){
				$_SESSION['isAdmin'] = 2;
			}
			else if($row['admin'] == 1){
				$_SESSION['isAdmin'] = 1;
			}
			else{
				$_SESSION['isAdmin'] = 0;
			}
			
			//echo "You are now logged in " . $_SESSION['logged_in_user'] . ". You will be redirected to the homepage.";
		}else{
			echo "Invalid username and password"; // PUT AN ALERT HERE, DONT ECHO!
		}
	} 
	else {
		//do nothing
	}
	
	//CART SYSTEM===========================================================================


    if(!isset($_SESSION['hascart'])) {

        $_SESSION['cartstring'] = sha1(sha1(rand(1, 9999)."salt")."salt");

        $_SESSION['hascart'] = 1;
    }
    else{
    	//$_SESSION['cartstring'] = 44;
    }


?>

<?php
			
	if (!isset($_SESSION['logged_in_user'])) {     //If not logged in, only show basic nav

		?>

<nav>
<div class="nav-wrapper">
   
  <a href="#" data-target="mobile-navbasic" class="sidenav-trigger"><i class="material-icons">menu</i></a>
  <ul id="nav-mobile" class="right hide-on-med-and-down">
  	<li>
  		<form action="search.php" method="POST">
    		<div class="input-field">
		      <input id="search" type="search" name="search" required>
		      <label class="label-icon" for="search"><i class="material-icons">search</i></label>
		      <i class="material-icons">close</i>
    		</div>
  		</form>
	</li>
    <li><a href="home.php">Home</a></li>
    <li><a href="catalog.php">Shop</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="contact.php">Contact</a></li>
	<li><a onclick="document.getElementById('login_modal').style.display='block'">Login</a></li>
  	<li><a href="cart.php"><i class="material-icons">shopping_cart</i></a></li>
  </ul>
</div>
</nav>


<!-- Mobile Nav -->

  <ul class="sidenav" id="mobile-navbasic">
    <li>
  		<form action="search.php" method="POST">
    		<div class="input-field">
		      <input id="search" type="search" name="search" required>
		      <label class="label-icon" for="search"><i class="material-icons">search</i></label>
		      <i class="material-icons">close</i>
    		</div>
  		</form>
	</li>
    <li><a href="home.php">Home</a></li>
    <li><a href="catalog.php">Shop</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="contact.php">Contact</a></li>
	<li><a onclick="document.getElementById('login_modal').style.display='block'">Login</a></li>
  	<li><a href="cart.php"><i class="material-icons">shopping_cart</i></a></li>
  </ul>

	
<?php
	} 
	else {
		if ($_SESSION['isAdmin'] == 2) {    //Display bar for Admins
			
			?>

<nav>
<div class="nav-wrapper">

  <a href="#" data-target="mobile-navadmin" class="sidenav-trigger"><i class="material-icons">menu</i></a>
  <ul id="nav-mobile" class="right hide-on-med-and-down">
  	<li>
  	<form action="search.php" method="POST">
    <div class="input-field">
      <input id="search" type="search" name="search" required>
      <label class="label-icon" for="search"><i class="material-icons">search</i></label>
      <i class="material-icons">close</i>
    </div>
  	</form>
	</li>
    <li><a href="home.php">Home</a></li>
    <li><a href="catalog.php">Shop</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="contact.php">Contact</a></li>
    <li><a class="dropdown-trigger" href="#!" data-target="dropdown">My Account<i class="material-icons right">arrow_drop_down</i></a></li>

  	<li><a href="cart.php"><i class="material-icons">shopping_cart</i></a></li>
  </ul>
</div>
</nav>


<!-- NavBar Dropdown -->
<ul id="dropdown" class="dropdown-content">
	<li><a href="profile.php">My Profile</a></li>
  <li class="divider"></li>	
	<li><a href="admin.php">Administrative</a></li>
  <li class="divider"></li>	
	<li><a href="logout.php">Logout</a></li>
  <li class="divider"></li>
</ul>




<!-- Mobile Nav -->

  <ul class="sidenav" id="mobile-navadmin">
    <li>
  		<form action="search.php" method="POST">
    		<div class="input-field">
		      <input id="search" type="search" name="search" required>
		      <label class="label-icon" for="search"><i class="material-icons">search</i></label>
		      <i class="material-icons">close</i>
    		</div>
  		</form>
	</li>
    <li><a href="home.php">Home</a></li>
    <li><a href="catalog.php">Shop</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="contact.php">Contact</a></li>
	<li><a href="profile.php">My Profile</a></li>
	<li><a href="admin.php">Administrative</a></li>
	<li><a href="logout.php">Logout</a></li>
  	<li><a href="cart.php"><i class="material-icons">shopping_cart</i></a></li>
  </ul>



			<?php
		}
		else if ($_SESSION['isAdmin'] == 1) {    //Display bar for advanced users (super)
			
			?>

<nav>
<div class="nav-wrapper">
 
  <a href="#" data-target="mobile-navsuper" class="sidenav-trigger"><i class="material-icons">menu</i></a>
  <ul id="nav-mobile" class="right hide-on-med-and-down">
  	<li>
  	<form action="search.php" method="POST">
    <div class="input-field">
      <input id="search" type="search" name="search" required>
      <label class="label-icon" for="search"><i class="material-icons">search</i></label>
      <i class="material-icons">close</i>
    </div>
  	</form>
	</li>
    <li><a href="home.php">Home</a></li>
    <li><a href="catalog.php">Shop</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="contact.php">Contact</a></li>
	<li><a href="profile.php">My Account</a></li>
	<li><a href="admin.php">Advanced</a></li>
	<li><a href="logout.php">Logout</a></li>
  	<li><a href="cart.php"><i class="material-icons">shopping_cart</i></a></li>
  </ul>
</div>
</nav>



<!-- Mobile Nav -->

  <ul class="sidenav" id="mobile-navsuper">
    <li>
  		<form action="search.php" method="POST">
    		<div class="input-field">
		      <input id="search" type="search" name="search" required>
		      <label class="label-icon" for="search"><i class="material-icons">search</i></label>
		      <i class="material-icons">close</i>
    		</div>
  		</form>
	</li>
    <li><a href="home.php">Home</a></li>
    <li><a href="catalog.php">Shop</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="contact.php">Contact</a></li>
	<li><a href="profile.php">My Profile</a></li>
	<li><a href="admin.php">Advanced</a></li>
	<li><a href="logout.php">Logout</a></li>
  	<li><a href="cart.php"><i class="material-icons">shopping_cart</i></a></li>
  </ul>


	
			<?php
		}

		else {    //Display regular user nav here
			
			?>


<nav>
<div class="nav-wrapper">
 
  <a href="#" data-target="mobile-navreg" class="sidenav-trigger"><i class="material-icons">menu</i></a>
  <ul id="nav-mobile" class="right hide-on-med-and-down">
  	<li>
  	<form action="search.php" method="POST">
    <div class="input-field">
      <input id="search" type="search" name="search" required>
      <label class="label-icon" for="search"><i class="material-icons">search</i></label>
      <i class="material-icons">close</i>
    </div>
  	</form>
	</li>
    <li><a href="home.php">Home</a></li>
    <li><a href="catalog.php">Shop</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="contact.php">Contact</a></li>
	<li><a href="profile.php">My Account</a></li>
	<li><a href="logout.php">Logout</a></li>
  	<li><a href="cart.php"><i class="material-icons">shopping_cart</i></a></li>
  </ul>
</div>
</nav>



<!-- Mobile Nav -->

  <ul class="sidenav" id="mobile-navreg">
    <li>
  		<form action="search.php" method="POST">
    		<div class="input-field">
		      <input id="search" type="search" name="search" required>
		      <label class="label-icon" for="search"><i class="material-icons">search</i></label>
		      <i class="material-icons">close</i>
    		</div>
  		</form>
	</li>
    <li><a href="home.php">Home</a></li>
    <li><a href="catalog.php">Shop</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="contact.php">Contact</a></li>
	<li><a href="profile.php">My Account</a></li>
	<li><a href="logout.php">Logout</a></li>
  	<li><a href="cart.php"><i class="material-icons">shopping_cart</i></a></li>
  </ul>



	
			<?php			
		}
	}
?>

<div id="login_modal" class="modal">

	<form action="" method="POST">

		<div class="container">
			<BR>
			<span onclick="document.getElementById('login_modal').style.display='none'" class="close right-align" title="Close">&times;</span>
			<BR>
			<center>
				<img src="img/RaindropPopLogoBadge.png" width=40%>
				<h4>Log In</h4>
				<h6> or <a href="newuser.php">create an account</a>.</h6>
			</center>
			<BR>    
			<div class="card">
				<div class="card-content">

					<div class="row">
						<form class="col s12" action="" method="POST">

							<div class="row">
								<div class="input-field col s12">
									<input type="text" placeholder="Enter Username" name="username" required>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12">
									<input type="password" placeholder="Enter Password" name="password" required>
								</div>
							</div>

							<div class="row col s6">
								<label>
									<input type="checkbox" class="filled-in" checked="checked" id="rmbr" name="remember"/>
									<span>Remember Me</span>
								</label>
							</div>

							<div class="row col s3 right">
								<button class="btn waves-effect waves-light right" type="submit" name="submit">Log In</button>
							</div>

						</form>
						<div class="row">
								<div class="col s12">
									Forgot username or password? Click <a href="#">here</a>.
								</div>
							</div>
						
					</div>


				</div>
			</div>
		</div>
	</form>
</div>


    <!-- Javascript -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="js/init.js"></script>
    
    


<script>
// Get the modal
var modal = document.getElementById('login_modal');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>