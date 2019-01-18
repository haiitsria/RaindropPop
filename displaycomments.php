<?php
/* This file displays the comments and ratings of all users who have rated a product, if there are any ratings. It does this in the form of a 'read more' button that opens a modal. */

	$totalrating_sql = "SELECT * FROM ratings WHERE item_id = '$item'";//select from items table
	$total_result = mysqli_query($connection,$totalrating_sql);//Run the query

	if (mysqli_num_rows($total_result) == 1){	
	?>
	
	<button onclick="document.getElementById('readmore').style.display='block'">User reviews</button>
	<div id="readmore" class="readmore">

	<span onclick="document.getElementById('readmore').style.display='none'" class="close" title="Close">&times;</span>

	<?php
	}

	while($totalrating_row = mysqli_fetch_array($total_result)){

		$user = $totalrating_row['user_id'];

		$sql = "SELECT * FROM raindrop_users WHERE cart_hash='$user'"; 
		$result = mysqli_query($connection, $sql); //Execute the sql query and store result in $result

		$row = mysqli_fetch_assoc($result);
		
		echo "User: " . $row['username'] . " rated this product: ";

		$stars3 = $totalrating_row['rating'];
		$j = 0;

		while($j < $stars3){ //Prints out stars
	    	
	    	$j++;
	    	echo "&#x2605";
	    }
	    echo "<br>";
	    echo $totalrating_row['comment'];
	    echo "<br>";
	}
?>

</div>

<script>
// Get the modal
var modal = document.getElementById('readmore');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>