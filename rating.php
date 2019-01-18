<?php
/* This file displays a number of stars for the individual and averaged ratings of the given item. */

	$item = $row['ID'];
	$whatuser = $_SESSION['cartstring'];

	$totalrating_sql = "SELECT * FROM ratings WHERE item_id = '$item'";  //select from items table
	$total_result = mysqli_query($connection,$totalrating_sql);//Run the query
    
    $myrating_sql = "SELECT * FROM ratings WHERE user_id = '$whatuser' AND item_id = '$item'";  //select from items table
    $result = mysqli_query($connection,$myrating_sql);//Run the query 
    $myrating_row = mysqli_fetch_assoc($result);

	$total = 0;
	$numvotes = 0;   

	while($totalrating_row = mysqli_fetch_array($total_result)){
		$total += $totalrating_row['rating'];
		$numvotes++;
	}
	
	//echo $total;
	//echo $numvotes;s

	if($numvotes != 0){ //prevents division by 0
	    $stars = $total/$numvotes;
	}else{
		$stars = 0;
	}
	
	$c = 0;
	//echo $stars;
    
	$stars2 = $myrating_row['rating'];
	$i = 0;

	echo "<p>Rating:";

    while($c < $stars){ //Prints out stars
    	$c++;
    	echo "&#x2605";
    }
    echo "</p>";

	echo "<p>My Rating:";

	if($stars2 < 1){

		echo " You have not rated this product yet.";
	}else{

	    while($i < $stars2){ //Prints out stars
	    	$i++;
	    	echo "&#x2605";
	    }
	}
	echo "</p>";

?>