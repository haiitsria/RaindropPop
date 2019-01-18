<?php
    //session_start();
    include("db_connect.php");
    
    $category = $_GET['category'];

    $sql = "SELECT * FROM products WHERE category='$category'";         //select from items table
    $result = mysqli_query($connection,$sql);      //Run the query 

    $row = mysqli_fetch_assoc($result);


    if ($category == "Classic") {
        $catParagraph = "Raindrop Pop is commited to preserving the legacy of Soda Pop. That's why we offer some of the finest flavors inspired by the classics. From vintage recipes to modern remixes of the greatest flavors of all time, we have it all!";
    }

    else if ($category == "Citrus") {
        $catParagraph = "Citrus-flavored sodas have long been a favorite of customers around the world. The refreshing combination of sweetness, bitterness and bubbly carbonation is irresistable on a hot summer day. Take a look at our extensive collection of marvelous flavors.";
    }

    else if ($category == "Fruity") {
        $catParagraph = "Some of the worlds first sodas, dating back to the 18th century, were fruit flavored. They remain a popular choice around the world to this day. We offer a selection that included nearly every type of fryit you can imagine. And maybe a few you've never even heard of!.";
    }

    else if ($category == "Cream") {
        $catParagraph = "Alexander C. Howell, of Vienna, New Jersey, was granted a patent for 'cream soda-water' on June 27, 1865. Howell's cream soda-water was made with sodium bicarbonate, water, sugar, egg whites, wheat flour, and 'any of the usual flavoring materials—such as oil of lemon, extracts of vanilla, pine-apple, to suit the taste' before drinking, the cream soda water was mixed with water and an acid such as tartaric acid or citric acid. In Canada, James William Black of Berwick, Nova Scotia was granted a U.S. patent on December 8, 1885, and a Canadian patent on July 5, 1886, for 'ice-cream soda'. Black's ice-cream soda, which contained whipped egg whites, sugar, lime juice, lemons, citric acid, flavoring, and bicarbonate of soda, was a concentrated syrup that could be reconstituted into an effervescent beverage by adding ordinary ice water.";
    }
    else if ($category == "Root Beer") {
        $catParagraph = "Root beer is a sweet North American soft drink traditionally made using the sassafras tree Sassafras albidum (sassafras) or the vine Smilax ornata (sarsaparilla) as the primary flavor. Root beer may be alcoholic or non-alcoholic (but it is usually non-alcoholic), come naturally free of caffeine or have caffeine added, and be carbonatedor non-carbonated. It usually has a thick, foamy head when poured. Modern, commercially produced root beer is generally sweet, foamy, carbonated, nonalcoholic, and flavoured using artificial sassafras flavouring.";
    }
    else if ($category == "Ginger") {
        $catParagraph = "Dry ginger ale is recognized as a Canadian creation by John McLaughlin, a chemist and pharmacist. Having established a soda water bottling plant in 1890, McLaughlin began developing flavour extracts to add to the water in 1904. That year, he introduced 'Pale Dry Ginger Ale', the bubbly libation that would be patented in 1907 as 'Canada Dry Ginger Ale'. An instant success, Canada Dry products were accepted by appointment to the Vice-Regal Household of the Governor General of Canada. The dry-style also became popular in the United States during the Prohibition era, when it was used as a mixer for alcoholic beverages.";
    }
    else if ($category == "Special") {
        $catParagraph = "At Raindrop Pop we have a penchant for uniqueness and individuality. The sodas on this page definately fit that description. Here you will find the wildest, the craziest, the most outlandish flavors. We love them all. Try one of these if you really want to step out of your comfort zone! ";
    }
?> 

<!DOCTYPE html>
<html lang="en">

    <head>
    <title>Raindrop Pop Category</title>
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
         
        <?php include 'navmenu.php'; ?>



         <!-- Hero Image -->

<div class="parallax-container">
  <div class="parallax"><img src="img/products.jpg"></div>
</div>


            <div class="row">
                <div class="col s12">
                    <div class="row orange lighten-2">
                        <div class="container">
                            <center><h4><?php echo $row['category'] . " ". "Sodas";?></h4></center>
                            <div class="section">
                                <div class="row center">
                                    <p class="light"><?php print $catParagraph; ?>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>



        <div class="row">
            <div class="col s2">
                <?php include("sidebar.php"); ?>
            </div>
            <div class="col s10">
                <?php include("catgrab.php");?>
            </div>
        </div>


        <?php include 'footer.php'; ?>
        
    </body>

</html>