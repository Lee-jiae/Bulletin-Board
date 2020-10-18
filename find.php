<!DOCTYPE html>
<html>
<head>
	<title> 아이디/비밀번호찾기 </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
<body>

	<br><br>
	<div class="container" align="center">
	<form action="find.php" method="POST">
		<table>
		<h4><ins> 아이디 찾기 </ins></h4>
		<tr><td>이메일 <input type="text" name="idemail"></td><tr>
		<tr><td align="right"><br><input type="submit" class="btn btn-info" name="idsubmit" value="찾기"></td></tr>
		</table>
		
		<br>
		<table>
		<h4><ins> 비밀번호 찾기 </ins></h4>
		
			<tr><td>아이디 <input type="text" name="id"></td><tr>
			<tr><td>이메일 <input type="text" name="passemail"></td><tr>
			<tr><td align="right"><br><input type="submit" class="btn btn-info" name="passsubmit" value="찾기"></td></tr>
		</table>
	</form>
	</div>

<?php
session_start(); //자격여부

$con = mysqli_connect('localhost', 'root', 'lee0406', 'jiae_db');
if(isset($_POST['idsubmit'])){
	$idemail=$_POST['idemail'];	
	
	$query = "SELECT ID FROM users WHERE Email='$idemail'";
	
	$result = mysqli_query($con, $query);
	
	if(empty($_POST['idemail'])){
		echo "<script> alert('이메일을 입력해주세요!!') </script>";
	}	
	
	else if(mysqli_num_rows($result)>0){  //0보다 크면 해당되는 것이 있다는 뜻
		$_SESSION['login']=$idemail;
		header("Location: id.php");
	}
	else{
		echo "<script> alert('없는 이메일입니다!!') </script>";
	}
}
else if(isset($_POST['passsubmit'])){
	$passemail=$_POST['passemail'];
	$id=$_POST['id'];
	
	$query = "SELECT ID FROM users WHERE Email='$passemail' AND ID='$id'";
	
	$result = mysqli_query($con, $query);
	
	if(empty($_POST['id'])){
		echo "<script> alert('아이디를 입력해주세요!!') </script>";
	}	
	
	else if(empty($_POST['passemail'])){
		echo "<script> alert('이메일을 입력해주세요!!') </script>";
	}	
	
	else if(mysqli_num_rows($result)>0){  //0보다 크면 해당되는 것이 있다는 뜻
		$_SESSION['login']=$passemail;
		header("Location: pass.php");
	}
	else{
		echo "<script> alert('아이디나 이메일이 없습니다!!') </script>";
	}
}
?>
	
	

</body>
</html>