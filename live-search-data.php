<?php 
	$conn = mysqli_connect("localhost","root","","ajax2nd")or die("conn fail");
	$search_value = $_POST['search'];
 	$sql = "SELECT * FROM ajaxtable WHERE first_name LIKE '{$search_value}%' OR last_name LIKE '{$search_value}%'";
 $result = mysqli_query($conn,$sql)or die("sql fail");
 $output = "";
 if(mysqli_num_rows($result)>0){
 	$output = "<table id='table' border='1' cellpadding='10px' width='50%' style='margin-left:230px;background:silver;'>
			<tr style='font-size:20px'>
				<th>ID</th>
				<th>Name</th>
				<th>Edit</th>
				<th>Delet</th>
			</tr>";
			while($row=mysqli_fetch_assoc($result)){
				$output.="<tr style='font-size:20px;background:orange;'>
				<td>{$row['id']}</td>
				<td>{$row['first_name']} {$row['last_name']}</td>
				<td><button Class='edit-btn' data-eid='{$row['id']}'>Edit</button></td>
				<td><button Class='del-btn' data-did='{$row['id']}'>Delet</button></td>
			</tr>";
			};
			$output.="</table>";
			mysqli_close($conn);
			echo $output;
 }else{
 	echo "<h1 style='color:red;'>NO RESULT FOUND</h1>";
 }
 ?>