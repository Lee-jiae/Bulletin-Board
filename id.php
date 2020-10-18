<!DOCTYPE html>
<?php
session_start(); //누가 들어왓는지 알기위해서

if(!isset($_SESSION['login'])){  //로그인했는지 여부
	header("Location: login.php");
}

?>
<html>
<head>
	<title> 아이디 </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php  //닉네임 받아옴
$name=$_SESSION['login'];
$con = mysqli_connect('localhost', 'root', 'lee0406', 'jiae_db');
$query = "SELECT * FROM users WHERE Email='$name'";
$result = mysqli_query($con, $query);

while($row=mysqli_fetch_array($result)){  //한줄한줄씩 가져오는 거임
$id=$row[1];
$nickname=$row[4];
}
?><br>
	<h2 align='center'><?=$nickname?> 님의 아이디입니다~ </h2>
	
	<h3 align="center" style="color:blue;"> "<?=$id?>" </h3>

<hr>
	<ul class="pager">
		<li><a href="find.php"> 이전으로 </a></li>&nbsp;
		<li><a href="index.php"> 로그인 하러가기 </a></li>
	</ul>


</body>
</html>