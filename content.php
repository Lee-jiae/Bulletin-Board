<!DOCTYPE html>
<?php
session_start(); //누가 들어왓는지 알기위해서

if(!isset($_SESSION['login'])){  //로그인했는지 여부
	header("Location: login.php");
}

?>
<html>
<head>
	<title> 첫 페이지 </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php  //닉네임 받아옴
$name=$_SESSION['login'];
$con = mysqli_connect('localhost', 'root', 'lee0406', 'jiae_db');
$query = "SELECT * FROM users WHERE ID='$name'";
$result = mysqli_query($con, $query);

while($row=mysqli_fetch_array($result)){  //한줄한줄씩 가져오는 거임
$nickname=$row[4];
}
?><br>
	<h1> <?php 
	if(isset($_GET['regi'])){
		echo "<h2 align='center'>$nickname 님 가입축하드립니다!!~</h2>"; 
	}
	else{
		echo "<h2 align='center'>$nickname 님 오늘도 방문해 주셔서 감사합니다~~</h2>"; 
	}
	?> </h1>
	<h4 align="center" style="color:blue;"> 여기서 마음맞는 사람과 함께 취미활동 즐겨보세요~ </h4>

<hr>

	<ul class="pager">
		<li><a href="play.php"> 광장가기 </a></li>&nbsp;
		<li><a href="logout.php"> 로그아웃 </a></li>&nbsp;
		<li><a href="contextinsert.php"> 개인정보입력 </a></li>
	</ul>

</body>
</html>