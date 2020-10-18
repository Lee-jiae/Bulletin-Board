<!DOCTYPE html>
<html>
<head>
	<title> 광장 </title>
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
session_start(); //누가 들어왓는지 알기위해서

$name=$_SESSION['login'];
$con = mysqli_connect('localhost', 'root', 'lee0406', 'jiae_db');
$query1 = "SELECT * FROM users WHERE ID='$name'";
$result1 = mysqli_query($con, $query1);
	
while($row=mysqli_fetch_array($result1)){  //한줄한줄씩 가져오는 거임
	$nickname1=$row[4];
}		
?>


<br>
<h2 align="center"> <?php echo $nickname1."의 광장*^^*"; ?> </h2><br>

<div class="inform" align="center">
<form action="play.php" method="POST" enctype="multipart/form-data">
<table >
	<tr><td><select name="info" class="form-control">
		<option> --검색 선택-- </option>
		<option value="영화장르"> <?php echo "영화장르"; ?> </option>
		<option value="취미"> <?php echo "취미"; ?> </option>
		<option value="음악장르"> <?php echo "음악장르"; ?> </option>
	</select></td>
	
	<td><input type="text" name="search" class="form-control"></td>
	<td><input type="submit" class="btn btn-info" name="submit" value="검색"></td></tr>
</table>
</form>	
</div>


<h3 align="center"> <다른 분들의 정보> </h3>

<div class="container">
<form action="play.php" method="POST" enctype="multipart/form-data">
		<table border="2" width="100%" class="table table-hover">
		<tr bgcolor="powderblue">
			<th> 프로필 </th> <th> ID </th> <th> 닉네임 </th> <th> 이메일 </th> <th> 영화 장르 </th> <th> 취미 </th> <th> 음식 </th> <th> 음악 장르 </th> <th> 시간 비는 날 </th> <th> 자기소개 </th>
		</tr>
<?php
$num=0;
if(isset($_POST['submit'])){
	$info = $_POST['info'];
	$search = $_POST['search'];
	
	if($info=="영화장르"){
		$query2 = "SELECT * FROM users WHERE Movie='$search'";
		$result2 = mysqli_query($con, $query2);
	}
	else if($info=="취미"){
		$query2 = "SELECT * FROM users WHERE Hobby='$search'";
		$result2 = mysqli_query($con, $query2);
	}
	else if($info=="음악장르"){
		$query2 = "SELECT * FROM users WHERE Music='$search'";
		$result2 = mysqli_query($con, $query2);
	}
}	
else{
	$query2 = "SELECT * FROM users";
	$result2 = mysqli_query($con, $query2);
}
if(isset($result2)){
while($row=mysqli_fetch_array($result2)){  //한줄한줄씩 가져오는 거임
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
	if($nickname==$nickname1){
		continue;
	}
?>	
		<tr>
			
			<td> <?php 
			if(!isset($profile)){
				echo "<p align='center'>사진없음</p>";
			}
			else{
				echo "<img width='100' height='100' class='img-rounded' src='get.php?name=$id'>";
			}	?> </td>
			<td> <?=$id ?> </td>
			<td> <?=$nickname ?> </td>
			<td> <?=$email ?> </td>
			<td> <?=$movie ?> </td>
			<td> <?=$hobby ?> </td>
			<td> <?=$food ?> </td>
			<td> <?=$music ?> </td>
			<td> <?=$day ?> </td>
			<td> <?=$intro ?> </td>
			<?php
			++$num;
			?>
		</tr>
<?php
	}
	if($num==0){
	echo "<tr align='center'><td colspan='10'> 검색결과없음 </td></tr>";
	}
}
?>

</table>
</form>

</div>
	<ul class="pager">
		<li><a href="content.php"> 첫 페이지로 </a></li>&nbsp;
		<li><a href="logout.php"> 로그아웃 </a></li>
	</ul>
	<br><br>



</body>
</html>