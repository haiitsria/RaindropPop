<?php
    include("db_connect.php");
    
    $category = $_GET['category'];

    $sql = "SELECT * FROM products WHERE category='$category'";         //select from items table
    $result = mysqli_query($connection,$sql);      //Run the query 


?>



<?php
while ($row = mysqli_fetch_array($result)){ //Loops through every result that was returned
    ?>
    <!--    <div class="row">-->
    <div class="item col s3" id="<?php echo $row['category'];?>">
        <center>
            <a href="item.php?flavor=<?php echo $row['ID']; ?>">
                <img class="responsive-img" <?php echo "src=img/".$row['image'];?> alt="pic"></a>
            <h6 class="name"><?php echo $row['product'];?></h6>
            <p class="price"><?php echo "$" . $row['price'];?></p>
            <a class="ctgry" href="category.php?category=<?php echo $row['category']; ?>">
                <p><?php echo "Category: " . $row['category'] . " " . "Sodas";?></p></a>
        </center>
        <!--<p class="price"><?php if ($row['stock'] > 0) {
            echo "IN STOCK";
        }
        else{
            echo "SOLD OUT";
        }
        ?>
                </p>-->

        <!--<p class="descrip"><?php echo $row['description'];?></p>-->
        <!--            <div class="item2">-->

        <!--                <button id="-->
        <!--                --><?php //echo $row['ID']; ?><!--" -->
        <!--                        class="view" onclick="window.location.href='item.php?flavor=-->
        <!--                --><?php //echo $row['ID']; ?><!--'">View Info-->
        <!--                </button>-->

        <!--<form action="" method="POST">
            <input type="submit" name="addtocart" value="Add to cart">
        </form>-->

        <!--            </div>-->
    </div>

    <?php
}
?>
</div>