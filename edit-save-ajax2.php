<?php 
	$id_na = $_POST['Id'];
	$fi_na = $_POST['firstN'];
	$la_na = $_POST['lastN'];
	$conn = mysqli_connect("localhost","root","","ajax2nd")or die("conn fail");
 	$sql = "UPDATE ajaxtable SET first_name = '{$fi_na}',last_name = '{$la_na}'WHERE id = {$id_na}";
 	if(mysqli_query($conn,$sql)){
 		echo 1;
 	}else{
 		echo 0;
 	} 
 ?>