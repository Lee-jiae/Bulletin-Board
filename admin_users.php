<html>
<body>
<head>
	<title> 사용자 관리 </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
th {
    text-align: center;
}
</style>
<br>
<h2 align="center"> <사용자 관리> </h2>
<div class="container">
<form action="admin_users.php" method="POST">
<table border="2" class="table table-hover">
	<tr bgcolor="#00BBFF" align="center">
		<th> 순번 </th> <th> ID </th> <th> 비밀번호 </th> <th> 닉네임 </th> <th> 자기소개 </th> <th> 삭제 </th> <th> 비밀번호변경 </th> <!--<th> 비밀번호변경2 </th> -->
	</tr>
	<?php
	
	$con = mysqli_connect('localhost', 'root', 'lee0406', 'jiae_db');
	$query = "SELECT * FROM users";
	$result = mysqli_query($con, $query);
	
	while($row=mysqli_fetch_array($result)){  //한줄한줄씩 가져오는 거임
		$pid=$row[0];
		$id=$row[1];
		$password=$row[3];
		$nickname=$row[4];
		$intro=$row[11];
	?>
	
	<tr>
		<td align="center"> <?=$pid ?> </td>
		<td> <?=$id ?> </td>
		<td> <?=$password ?> </td>
		<td> <?=$nickname ?> </td>
		<td><?=$intro?></td>
		<td align="center"> <a href="delete.php?del=<?=$pid?>">삭제</a> </td>
		<td align="center"> <a href="password.php?trans=<?=$pid?>">변경 </a> </td>
	</tr>
	<?php
	}
	?>
</table>
</form>
</div>
	<ul class="pager">
		<li><a href="index.php"> 홈으로~ </a></li>
	</ul><br><br>
</body>
</html>