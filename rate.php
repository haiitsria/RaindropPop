<?php
/* This file displays the rating and comment box. It also processes rating information and places it into the appropriate fields in the 'ratings' database. */

    if (isset($_SESSION['logged_in_user'])) { 

        $item_sql = "SELECT * FROM ratings WHERE item_id = '$item'";  //Select $item (this var comes from ealier in the container file) from database
        $result1 = mysqli_query($connection,$item_sql);  //Run the query 

        if (mysqli_num_rows($result1) != 1){  //If you did not rate the item, this displays the rating stuff, otherwise nothing shows because the system does not currently support changing ratings
    
    ?> 
    <form action="" method="POST">
        <select name="ratingchoice">
            <option value="">Select...</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <p>Leave a comment:</p>
        <textarea name="comment"></textarea>
        <input type="submit" name="rate" value="Rate">
    </form>

<?php 
        }   
    }
    
    $product = $row['ID'];
    $cartstring = $_SESSION['cartstring'];

    //Rating stuff

    if (isset($_POST['rate'])) {
        
        $myrating_sql = "SELECT * FROM ratings WHERE user_id = '$cartstring' AND item_id = '$item'";
        $result2 = mysqli_query($connection,$myrating_sql);//Run the query 

        if (mysqli_num_rows($result2) == 1){ //If you already rated it
    
            echo "You already rated this product.";

        }else{

            $rating = $_POST['ratingchoice'];
            $comment = $_POST['comment'];
        
            $sql = "INSERT INTO ratings (ID, user_id, item_id, rating, comment) VALUES (NULL, '$cartstring', '$product', '$rating', '$comment')";
            mysqli_query($connection, $sql);
        
        }
    }
?>