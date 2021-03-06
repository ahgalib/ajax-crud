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

			$("#submit").on("click",function(e){
				e.preventDefault();
				let fName = $("#f-name").val();
				let lName = $("#l-name").val();
				if(fName == "" || lName == ""){
					$("#err-msg").html("please fill the full form").slideDown();
					$("#succ-msg").slideUp();
					setTimeout(function(){
					$("#err-msg").slideUp();
					},2000);
				}
				else{
					$.ajax({
					url:"ajax-page-insert.php",
					type:"POST",
					data:{Fname:fName,Lname:lName},
					success:function(data){
						if(data == 1){
							loadtable();
							$("#form").trigger("reset");
							$("#succ-msg").html("insert data successfull").slideDown();
							$("#err-msg").slideUp();
							setTimeout(function(){
								$("#succ-msg").slideUp();
							},2000);
						}else{
							$("#err-msg").html("insert data NOT successfull").slideDown();
							$("#succ-msg").slideUp();
							setTimeout(function(){
								$("#err-msg").slideUp();
							},2000);
						}
					}
				})
				}
			});

			$(document).on("click",".edit-btn",function(){
				$("#model-div").show();
				let eId = $(this).data("eid");
				$.ajax({
					url:"edit-ajax2.php",
					type: "POST",
					data:{Idd:eId},
					success:function(data){
						$("#model-form table").html(data);
					}
				})
			})
			$("#close-btn").on("click",function(){
				$("#model-div").hide();
			})
			$(document).on("click","#Save",function(){
					let fid = $("#idname").val();
					let fN = $("#Fname").val();
					let lN = $("#Lname").val();
					$.ajax({
					url:"edit-save-ajax2.php",
					type: "POST",
					data:{Id:fid,firstN:fN,lastN:lN},
					success:function(data){
						if(data == 1){
							loadtable();
							$("#model-div").hide();
						}else{
							alert("fail");
						}
					}
				})
			});

			$(document).on("click",".del-btn",function(){
				let bt = $(this).data("did");
				let element = this;
				$.ajax({
					url:"delet-ajax2.php",
					type: "POST",
					data:{delBut:bt},
					success:function(data){
						if(data == 1){
							//loadtable();
							$(element).closest("tr").fadeOut();
						}else{
							alert("falil faila kag al");
						}
					}
				})
			});

			$("#search").on('keyup',function(){
				let searchTerm = $(this).val();
				$.ajax({
					url: "live-search-data.php",
					type:"POST",
					data: {search:searchTerm},
					success:function(data){
						$("#table-div").html(data);
					}
				})
			});

			//Multipart delete
			$("#multi-delet").on("click",function(){
				var arr = [];
				$(":checkbox:checked").each(function(key){
					arr[key] = $(this).val();
				})
				//console.log(arr);
				if(arr.length ==0){
					$("#err-msg").html("data delet unsuccessfull").slideDown();
					$("#succ-msg").slideUp();
					setTimeout(function(){
						$("#err-msg").slideUp();
					},2000);
				}else{
					$.ajax({
					url:"delet-multi.php",
					type:"POST",
					data:{did:arr},
					success:function(data){
						//console.log(data);
						if(data == 1){
							loadtable();
							$("#succ-msg").html("delete success").slideDown();
							$("#err-msg").slideUp();
							setTimeout(function(){
								$("#succ-msg").slideUp();
							},3000);
						}else{
							$("#err-msg").html("data delet unnnnnsuccessfull").slideDown(3000);
							$("#succ-msg").slideUp();
						}
					}
					})
				}	
			});
		});
	</script>
</body>
</html>