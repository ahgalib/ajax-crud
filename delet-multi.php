<?php 
	$conn = mysqli_connect("localhost","root","","ajax2nd")or die("conn fail");
 	$del_id = $_POST['did'];
 	$del_str = implode($del_id,", ");
 	//echo $del_str;

 	$sql = "DELETE FROM ajaxtable WHERE id IN ({$del_str})";
 	if(mysqli_query($conn,$sql)){
 		echo 1;
 	}else{
 		echo 0;
 	}
 ?>