<!DOCTYPE html>
<html lang="en">

<head>
    <title>Raindrop Pop Home</title>
    <meta charset="utf-8">
    <meta name="description" content="Store">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src=“https://www.googletagmanager.com/gtag/js?id=UA-129061865-1“></script>
    <script>
     window.dataLayer = window.dataLayer || [];
     function gtag(){dataLayer.push(arguments);}
     gtag(‘js’, new Date());

     gtag(‘config’, ‘UA-129061865-1’);
    </script>
</head>

<body>

<!-- Navigation Menus -->

<?php include 'navmenu.php'; ?>




<!-- Hero Image -->

<div class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="section">
        <div class="row center">
          <img src="img/RaindropPopLogoBadge.png" width=60%>
        </div>
        </div>
      </div>
      <br><br>
    </div>
  <div class="parallax"><img src="img/sodashelves.jpg"></div>
</div>


<!-- Welcome Banner -->

<div class="row teal lighten-2">
  <div class="container white-text">
    <center><h4>Welcome to Raindrop Pop!</h4></center>
    <div class="section">

        <div class="row">
            <center><p class="light">Raindrop Pop is the leading online retailer for craft soda, root beer, and other bubbly refreshments! The company was founded in 2018 by five soda enthusiasts in Orlando, Florida. The vision was to bring all of the finest flavors from around the world under one roof. Since then we have expanded to an online store that ships worldwide! We offer a dazzling variety of handcrafted carbonated beverages served in bottles of every shape and size. We strive to offer the latest and greatest brands, but never forget the classics. If you’re looking for quality and unique flavor, look no further than Raindrop Pop!</p></center>
          </div>
        </div>

    </div>
  </div>
</div>


<!-- Featured Products -->

<div class="row white">
    <div class="container">
        <center><h4>Featured Products</h4></center><BR>

<?php
//session_start();

include("db_connect.php");

?>


                <?php
    
                include("db_connect.php");

                $flavor1 = rand(1,55);
                $flavor2 = rand(1,55);
                $flavor3 = rand(1,55);
                $flavor4 = rand(1,55);
                
                $sql = "SELECT * FROM products WHERE ID = '$flavor1' OR ID = '$flavor2' OR ID = '$flavor3' OR ID = '$flavor4'";  //select from items table
                $cart_result = mysqli_query($connection, $sql); 

                while($row = mysqli_fetch_array($cart_result)){
            
                ?>

                <!-- Product -->
                <div class="col s3 l3">
                <a href="item.php?flavor=<?php echo $row['ID']; ?>"><img class="home_item_img" <?php echo "src=img/".$row['image'];?> alt="pic"></a>
                <center><h6><?php echo $row['product'];?></h6></center>  
                <center><p><?php echo "$" .$row['price'];?></p></center><BR>
                </div>


                <!-- Quick View Button Modal -->
            

            <?php    
            } //ends while loop
            ?>

</div>
<BR><BR>
</div>





<!-- What's Your Flavor? -->
  <div class="row orange lighten-2">
    <div class="container">
    <center><h4>What's Your Flavor?</h4></center>
    <div class="section">
      <div class="row">

        <div class="col s12 m4 l4">
            <div class="card">
                <div class="card-image">
                    <img src="img/classic_t.jpg">
                </div>
                <div class="card-action">
                    <a href="category.php?category=Classic">Classic</a>
                </div>
            </div>
        </div>

        <div class="col s12 m4 l4">
            <div class="card">
                <div class="card-image">
                    <img src="img/citrus_t.jpg">
                </div>
                <div class="card-action">
                    <a href="category.php?category=Citrus">Citrus</a>
                </div>
            </div>
        </div>

        <div class="col s12 m4 l4">
            <div class="card">
                <div class="card-image">
                    <img src="img/fruity_t.jpg">
                </div>
                <div class="card-action">
                    <a href="category.php?category=Fruity">Fruity</a>
                </div>
            </div>
        </div>

        <div class="col s12 m4 l4">
            <div class="card">
                <div class="card-image">
                    <img src="img/rootbeer_t.jpg">
                </div>
                <div class="card-action">
                    <a href="category.php?category=Root Beer">Root Beer</a>
                </div>
            </div>
        </div>

        <div class="col s12 m4 l4">
            <div class="card">
                <div class="card-image">
                    <img src="img/ginger_t.jpg">
                </div>
                <div class="card-action">
                    <a href="category.php?category=Ginger">Ginger Ale</a>
                </div>
            </div>
        </div>

        <div class="col s12 m4 l4">
            <div class="card">
                <div class="card-image">
                    <img src="img/cream_t.jpg">
                </div>
                <div class="card-action">
                    <a href="category.php?category=Cream">Cream</a>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
  </div>



<!-- Quality Matters -->
<div class="row white">
  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 m4">
          <center><img src="img/soda-icon.png">
          <h5 class="center">One with Nature</h5>
          <p class="light">Our products are naturally brewed with pure cane sugar and natural flavors.</p></center>
        </div>


        <div class="col s12 m4">
          <center><img src="img/truck.png">
          <h5 class="center">Speedy Delivery</h5>
          <p class="light">We ship our craft sodas in small batches to ensure our sodas are always delivered fresh to your door.</p></center>
        </div>   


        <div class="col s12 m4">
          <center><img src="img/charity.png">
          <h5 class="center">Giving Back</h5>
          <p class="light">With every flavor of the month purchase we donate $1 to local charities.</p></center>
        </div>      
      </div>

    </div>
  </div>
</div>

<?php include 'footer.php'; ?>

    <!-- Javascript -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="js/init.js"></script>
    
    <script>
    // Modal for Featured Items
    // Get the modal
    var modal = document.getElementById('featured_modal');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }



    </script>
    
    </body>

</html>