<?php 
	$id_name = $_POST['Idd'];
	//$fi_name = $_POST['firstN'];
	//$la_name = $_POST['lastN'];


 $conn = mysqli_connect("localhost","root","","ajax2nd")or die("conn fail");
 $sql = "SELECT * FROM ajaxtable WHERE id={$id_name}";
 $result = mysqli_query($conn,$sql)or die("sql fail");
 $output = "";
 if(mysqli_num_rows($result)>0){
 	while($row=mysqli_fetch_assoc($result)){
				$output.="<tr>
					<td style='font-size: 20px;'>First-Name</td>
					<td style='font-size: 20px;'><input type='text' id='Fname' value='{$row['first_name']}'><input type='hidden'id='idname' value='{$row['id']}'></td>
				</tr>
				<tr>
					<td style='font-size: 20px;'>Last-Name</td>
					<td style='font-size: 20px;'><input type='text' id='Lname' value='{$row['last_name']}' ></td>
				</tr>
				<tr>
					<td></td>
					<td style='font-size: 20px;'><input type='submit' id='Save' ></td>
				</tr>";
			};
			mysqli_close($conn);
			echo $output;
 }else{
 	echo "fffffffail";
 }
 ?>