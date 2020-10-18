<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
	<title> 개인정보 </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
function showHint(str)
{
if (str.length==0)
  { 
  document.getElementById("txtHint").innerHTML="";
  return;
  }
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","gethint.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>
<style>
th {
    text-align: center;
}
.hobby {color: #0088FF;}
</style>
<body>
<br><br>
<div class="container">
	<form action="contextinsert.php" method="POST" enctype="multipart/form-data">
		<table border="2" class="table">
			<tr  class="info">
				<th colspan="2" align="center"> 개인정보 </th>
			</tr>
			
<?php
session_start();
$name=$_SESSION['login'];
			
$con = mysqli_connect('localhost', 'root', 'lee0406', 'jiae_db');
$query = "SELECT * FROM users WHERE ID='$name'";
$result = mysqli_query($con, $query);
	
while($row=mysqli_fetch_array($result)){  //한줄한줄씩 가져오는 거임
$id=$row[1];
$profile=$row[2];
$password=$row[3];
$nickname=$row[4];
$email=$row[5];
$movie=$row[6];
$hobby=$row[7];
$food=$row[8];
$music=$row[9];
$day=$row[10];
$intro=$row[11];
}		
?>
			
			<tr>
				<td> ID </td>
				<td> <div class="col-xs-4"><input type="text" name="id" value="<?=$id ?>" class="form-control"></div> </td>
			</tr>
			<tr>
				<td> 비밀번호 </td>
				<td> <div class="col-xs-4"><input type="password" name="password" value="<?=$password ?>" class="form-control"></div> </td>
			</tr>
			<tr>
				<td> 닉네임 </td>
				<td> <div class="col-xs-4"><input type="text" name="nickname" value="<?=$nickname ?>" class="form-control"></div> </td>
			</tr>
			<tr>
				<td> 이메일 </td>
				<td> <div class="col-xs-6"><input type="text" name="email" value="<?=$email ?>" class="form-control"></div> </td>
			</tr>
			<tr>
				<td> 좋아하는 영화 장르 </td>
				<td> <div class="col-xs-4"><select name="movie" class="form-control">
						<option value="로맨스" <?php if($movie=="로맨스"){echo "selected";}?>> <?php echo "로맨스"; ?> </option>
						<option value="코미디" <?php if($movie=="코미디"){echo "selected";}?>> <?php echo "코미디"; ?> </option>
						<option value="스릴러" <?php if($movie=="스릴러"){echo "selected";}?>> <?php echo "스릴러"; ?> </option>
						<option value="공포" <?php if($movie=="공포"){echo "selected";}?>> <?php echo "공포"; ?> </option>
						<option value="액션" <?php if($movie=="액션"){echo "selected";}?>> <?php echo "액션"; ?> </option>
						<option value="느와르" <?php if($movie=="느와르"){echo "selected";}?>> <?php echo "느와르"; ?> </option>
						<option value="미스터리" <?php if($movie=="미스터리"){echo "selected";}?>> <?php echo "미스터리"; ?> </option>
					</select></div>
				</td>
			</tr>
			<tr>
				<td> 취미 </td>
				<td> <div class="col-xs-4"><input type="text" class="form-control" name="hobby" onkeyup="showHint(this.value)" value="<?=$hobby?>"></div><br>
				<span class="hobby"><p>추천: <span id="txtHint"></span></p></span> </td>
			</tr>
			<tr>
				<td> 좋아하는 음식 </td>
				<td> <div class="col-xs-4"><input type="text" class="form-control" name="food" value="<?=$food ?>"></div> </td>
			</tr>
			<tr>
				<td> 좋아하는 음악 장르 </td>
				<td> <div class="col-xs-4"><select name="music" class="form-control">
						<option value="발라드" <?php if($music=="발라드"){echo "selected";}?>> <?php echo "발라드"; ?> </option>
						<option value="댄스" <?php if($music=="댄스"){echo "selected";}?>> <?php echo "댄스"; ?> </option>
						<option value="팝" <?php if($music=="팝"){echo "selected";}?>> <?php echo "팝"; ?> </option>
						<option value="어쿠스틱" <?php if($music=="어쿠스틱"){echo "selected";}?>> <?php echo "어쿠스틱"; ?> </option>
						<option value="힙합" <?php if($music=="힙합"){echo "selected";}?>> <?php echo "힙합"; ?> </option>
						<option value="R&B" <?php if($music=="R&B"){echo "selected";}?>> <?php echo "R&B"; ?> </option>
						<option value="락" <?php if($music=="락"){echo "selected";}?>> <?php echo "락"; ?> </option>
						<option value="재즈" <?php if($music=="재즈"){echo "selected";}?>> <?php echo "재즈"; ?> </option>
						<option value="트로트" <?php if($music=="트로트"){echo "selected";}?>> <?php echo "트로트"; ?> </option>
					</select></div>
				</td>
			</tr>
			<tr>
				<td> 시간되는 요일 </td>
				<td> <div class="col-xs-6"><input type="text" name="day" value="<?=$day ?>" class="form-control"></div> </td>
			</tr>
			<tr>
				<td> 자기소개 </td>
				<td> <div class="col-xs-10"><textarea name="intro" row="5" cols="40" value="<?=$intro ?>" class="form-control"> <?=$intro ?> </textarea></div> </td>
			</tr>
			<tr>
				<td> 프로필사진 </td>
				<td> <?php 
			if(!isset($profile)){
				echo "<p>&nbsp;사진없음</p>";
			}
			else{
				echo "<img width='100' height='100' class='img-rounded' src='get.php?name=$id'>";
			}	?> <br>
				<input type="file" name="profile" > </td>
			</tr>
			<tr class="info">
				<td colspan="2" align="right"> <a href="check.php"><input type="submit" class="btn btn-info" name="submit" value="저장"></a> </td>
			</tr>
		</table>
	</form>
	</div>
	<ul class="pager">
		<li><a href="play.php"> 광장가기 </a></li>&nbsp;
		<li><a href="logout.php"> 로그아웃 </a></li>
	</ul>
	<br>

<?php
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(isset($_POST['submit'])){
	$password1 = $_POST['password'];
	$nickname1 = $_POST['nickname'];
	$email1 = $_POST['email'];
	$movie1 = $_POST['movie'];
	$hobby1 = $_POST['hobby'];
	$food1 = $_POST['food'];
	$music1 = $_POST['music'];
	$day1 = $_POST['day'];
	$intro1=$_POST['intro'];
	$profile1 = $_FILES['profile']['tmp_name'];

	
	if(empty($_FILES['profile']['tmp_name'])){
		$query1 = "UPDATE users SET Password='$password1', Nickname='$nickname1', Email='$email1', Movie='$movie1', 
		Hobby='$hobby1', Food='$food1', Music='$music1', Day='$day1', Introduce='$intro1' WHERE ID='$id'";
		mysqli_query($con, $query1);
		echo "<script>location.href='check.php';</script>";
	}
	
	else{
		if(isset($profile1)){
			$image_data = addslashes(file_get_contents($_FILES['profile']['tmp_name']));
			//addcslashes => 보안상한거임
			$image_size = getimagesize($_FILES['profile']['tmp_name']);  // 숫자가 아니면 false로 리턴받음
			if($image_size != FALSE){
				$query2 = "UPDATE users SET Password='$password1', Nickname='$nickname1', Email='$email1', Movie='$movie1', 
						Hobby='$hobby1', Food='$food1', Music='$music1', Day='$day1', Introduce='$intro1', Profile='$image_data' WHERE ID='$id'";
				mysqli_query($con, $query2);
				echo "<script>location.href='check.php';</script>";
			}
		}
	}
	
}

mysqli_close($con);
?>
	
	
</body>
</html>