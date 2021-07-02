<!DOCTYPE html>
<html>
<head>
	<title>Ajax</title>
	<link rel="stylesheet" type="text/css" href="ajax3.css">
</head>
<body>
	<div id = "header">
		<tr>
			<td><h1>PHP WITH AJAX(2nd)</h1>
			<div id="search-bar">
				<label>Search</label>
				<input type="text" id="search" autocomplete="off">
			</div>
			</td>
		</tr>
	</div>
	<div id="button-div">
		<table id="table-form">
			<tr id="form-tr">
				<form id="form">
					<td style="font-size: 22px;">First-Name</td>
					<td style="font-size: 22px;"><input type="text" id="f-name" name=""></td>
					<td style="font-size: 22px;">Last-Name</td>
					<td style="font-size: 22px;"><input type="text"id="l-name" name=""></td>
					<td style="font-size: 22px;"><input type="submit"id="submit" name=""></td>
				</form>
			</tr>
		</table>
	</div>
	<button id="multi-delet" style="margin-left:500px;padding:6px;margin-top:10px;" class="btn btn-primary">Delete</button>
	<div style="background: green;color:gold;display: none;font-size:25px;width:300px;text-align:center;position:absolute;top:90px;left:200px;padding:10px;"id="succ-msg"></div>
	<div style="background: red;color:black;display: none;font-size:25px;width:300px;text-align:center;position:absolute;top:90px;left:200px;padding:10px;" id="err-msg"></div>
	
	<div id="table-div">

	</div>
	<div id="model-div">
		<div id="model-form">
			<h1>Edit Information</h1>
			<table id="edit-table" width="100%">
				<tr>
					<td></td>
					<td style='font-size: 20px;'><input type='submit' id='Save' ></td>
				</tr>
			</table>
			<div id="close-btn">X</div>
		</div>
	</div>

	<script type="text/javascript" src="jquery-3.5.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			function loadtable(){
				$.ajax({
					url:"show-ajax-page.php",
					type:"POST",
					success:function(data){
						$("#table-div").html(data);
					}
				})
			}
			loadtable();
		});
	</script>
</body>
</html>