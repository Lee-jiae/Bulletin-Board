<?php
session_start();  //자격여부


$con = mysqli_connect('localhost', 'root', 'lee0406', 'users_db');
if(isset($_POST['submit'])){
	$admin_username=$_POST['admin_username'];
	$admin_password=$_POST['admin_password'];
	
	if(empty($_POST['admin_username'])){
		echo "<script> alert('Please enter Admin Username !') </script>";
	}
	if(empty($_POST['admin_password'])){
		echo "<script> alert('Please enter Admin Password') </script>";
	}
	
	$query = "SELECT admin_name, admin_pass FROM admin 
			  WHERE admin_name='$admin_username' AND admin_pass='$admin_password'";
	
	$result = mysqli_query($con, $query);
	
	if(mysqli_num_rows($result)>0){  //0보다 크면 해당되는 것이 있다는 뜻
		$_SESSION['admin_login']=$admin_username;
		header("Location: admin_users.php");
	}
	else{
		echo "<script> alert('ID나 비밀번호가 틀리셨습니다!!!') </script>";
	}
}

?>
<html>
<head>
	<title> 관리자 로그인 </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
th {
    text-align: center;
}
</style>
<body>
<?php
?>
<div class="container"><br><br>
	<form action="admin_login.php" method="POST">
		<table border="2" class="table table-hover">
			<tr>
				<th colspan="2" align="center"> 관리자 로그인 </th>
			</tr>
			<tr>
				<td> ID </td>
				<td> <div class="col-xs-4"><input class="form-control" type="text" name="admin_username"></div> </td>
			</tr>
			<tr>
				<td> 비밀번호 </td>
				<td> <div class="col-xs-4"><input class="form-control" type="password" name="admin_password"></div> </td>
			</tr>
			<tr>
				<td colspan="2" align="center"> <input type="submit" class="btn btn-primary" name="submit" value="관리자 로그인"> </td>
			</tr>
		
		</table>
	
	
	</form>
</div>


</body>
</html>