<?php
    include("db_connect.php");


    $sql = "SELECT * FROM products";         //select from items table
    $result = mysqli_query($connection,$sql);      //Run the query 

    $row = mysqli_fetch_assoc($result);

?>     

<?php 
    while ($row = mysqli_fetch_assoc($result)){ //Loops through every result that was returned
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
?>





