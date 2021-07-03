<?php 
	$del_but = $_POST['delBut'];
	$conn = mysqli_connect("localhost","root","","ajax2nd")or die("conn fail");
 	$sql = "DELETE FROM ajaxtable WHERE id = {$del_but}";
 	if(mysqli_query($conn,$sql)){
 		echo 1;
 	}else{
 		echo 0;
 	} 
 ?>