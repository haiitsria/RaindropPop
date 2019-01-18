<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Raindrop Pop Contact</title>
        <meta charset="utf-8">
        <meta name="description" content="Store">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    
    <body>


<!-- Navigation -->      
         
<?php include 'navmenu.php'; ?>
    


<!-- Hero Image -->

<div class="parallax-container">
  <div class="parallax"><img src="img/contact.jpg"></div>
</div>




  <!-- Contact Form -->      
<div class="container">
<BR>
<center>
<h4>Contact Us</h4>
<h6>Have a question or comment? Leave us a message below!</h6>
</center>
<BR>    
<div class="card">
<div class="card-content">
<div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="First Name" id="first_name" type="text" class="validate">
        </div>
        <div class="input-field col s6">
          <input placeholder="Last Name" id="last_name" type="text" class="validate">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input placeholder="Email Address" id="email" type="email" class="validate">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <select>
            <option value="" disabled selected>Type of Question</option>
            <option value="1">Customer Service</option>
            <option value="2">Where is my order?</option>
            <option value="3">I want a job!</option>
            <option value="4">Quality Complaints/Issues with Soda</option>
            <option value="5">Webmaster</option>
          </select>
        </div>
      </div>
        <div class="row">
        <div class="input-field col s12">
          <textarea placeholder="Message" id="textarea1" class="materialize-textarea"></textarea>
        </div>
      </div>
        <button class="btn waves-effect waves-light right" type="submit" name="action">Submit
        </button>
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
        
    </body>

</html>