<!DOCTYPE html>
<?php
session_start(); //누가 들어왓는지 알기위해서
?>
<html>
<head>
	<title> 내정보 </title>
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

<?php  //닉네임 받아옴
$name=$_SESSION['login'];
$con = mysqli_connect('localhost', 'root', 'lee0406', 'jiae_db');
$query = "SELECT * FROM users WHERE ID='$name'";
$result = mysqli_query($con, $query);
	
while($row=mysqli_fetch_array($result)){  //한줄한줄씩 가져오는 거임
$id=$row[1];
$profile=$row[2];
$nickname=$row[4];
$email=$row[5];
$movie=$row[6];
$hobby=$row[7];
$food=$row[8];
$music=$row[9];
$day=$row[10];
$intro=$row[11];
}		
?><br>
	<h2 align="center"> <?php echo $nickname. "님 프로필이 수정되셨습니다~~"; ?> </h2>
	<div class="container">
	<form action="check.php" method="POST">
		<table border="2" class="table">
		<tr bgcolor="99BBFF" align="center">
			<th> 프로필 </th> <th> ID </th> <th> 닉네임 </th> <th> 이메일 </th> <th> 영화 장르 </th> <th> 취미 </th> <th> 음식 </th> <th> 음악 장르 </th> <th> 시간 비는 날 </th> <th> 자기소개 </th>
		</tr>	
		<tr>
			<td> <?php
			if(!isset($profile)){echo "<p>&nbsp;사진없음</p>";	}
			else{echo "<img width='100' height='100' src='get.php?name=$id'>"; }?> </td>
			<td> <?=$id ?> </td>
			<td> <?=$nickname ?> </td>
			<td> <?=$email ?> </td>
			<td> <?=$movie ?> </td>
			<td> <?=$hobby ?> </td>
			<td> <?=$food ?> </td>
			<td> <?=$music ?> </td>
			<td> <?=$day ?> </td>
			<td> <?=$intro ?> </td>
	</tr>
</table>
</form>
</div>
	<ul class="pager">
		<li><a href="play.php"> 광장가기 </a></li>
		<li><a href="logout.php"> 로그아웃 </a></li>
	</ul>

</body>
</html>