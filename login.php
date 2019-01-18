<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Raindrop Pop Contact</title>
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
    

<!-- Login Form -->      
<div class="container">
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
	<div class="row col s3">
  	    <label>
        <input type="checkbox" class="filled-in" checked="checked" id="rmbr" name="remember"/>
        <span>Remember Me</span>
     	</label>
    </div>
    <div class="row col s3 right">
		<button class="btn waves-effect waves-light right" type="submit" name="submit">Log In</button>
	</div>
  	</div>
    </form>
        Forgot username or password? Click <a href="#">here</a>.
  </div>
	
</div>
</div>
</div>

<BR><BR>


<?php include 'footer.php'; ?>

    <!-- Javascript -->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="js/init.js"></script>
        
    </body>

</html>