<?php 
	$f_name = $_POST['Fname'];
	$l_name = $_POST['Lname'];

	$conn = mysqli_connect("localhost","root","","ajax2nd")or die("conn fail");
 	$sql = "INSERT INTO ajaxtable(first_name,last_name) VALUES('{$f_name}','{$l_name}')";
 	if(mysqli_query($conn,$sql)){
 		echo 1;
 	}else{
 		echo 0;
 	} 

 ?>