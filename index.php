<!DOCTYPE html>
<html>
<head>
<title> 로그인 </title>
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
<h2 align="center"> <취미 스케치> </h2>
<div class="container">
<form action="index.php" method="POST">
		<table border="2" class="table table-hover">
			<tr>
				<th colspan="2" align="center"> 로그인 </th>
			</tr>
			<tr>
				<td> ID </td>
				<td> <div class="col-xs-4"><input class="form-control" type="text" name="id"></div> </td>
			</tr>
			<tr>
				<td> 비밀번호 </td>
				<td> <div class="col-xs-4"><input class="form-control" type="password" name="password"></div> </td>
			</tr>
			<tr>
				<td colspan="2" align="center"> <input type="submit" class="btn btn-primary" name="submit" value="LOGIN"> </td>
			</tr>
		
		</table>
	
	
	</form>
	</div>
	<ul class="pager">
		<li><a href="registration.php"> 회원가입 </a></li>&nbsp;
		<li><a href="find.php"> 아이디/비밀번호 찾기 </a></li>&nbsp;
		<li><a href="admin_login.php"> 관리자 페이지 </a></li>
	</ul>
	
	
<?php
session_start(); //자격여부

$con = mysqli_connect('localhost', 'root', 'lee0406', 'jiae_db');
if(isset($_POST['submit'])){
	$id=$_POST['id'];
	$password=$_POST['password'];
	
	$query = "SELECT ID, Password FROM users 
			  WHERE ID='$id' AND Password='$password'";
	
	$result = mysqli_query($con, $query);
	
	if(empty($_POST['id'])){
		echo "<script> alert('ID를 입력하세요 !!') </script>";
	}
	else if(empty($_POST['password'])){
		echo "<script> alert('비밀번호를 입력하세요!!') </script>";
	}
	
	else if(mysqli_num_rows($result)>0){  //0보다 크면 해당되는 것이 있다는 뜻
		$_SESSION['login']=$id;
		header("Location: content.php");
	}
	else{
		echo "<script> alert('ID나 비밀번호를 틀렸습니다!!') </script>";
	}
}

?>

</body>
</html>