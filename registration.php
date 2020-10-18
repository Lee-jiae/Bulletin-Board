<!DOCTYPE html>

<?php
session_start();
$con = mysqli_connect('localhost', 'root', 'lee0406', 'jiae_db');

if(isset($_POST['submit'])){
	$id = $_POST['id'];
	$password = $_POST['password'];
	$nickname = $_POST['nickname'];
	$email = $_POST['email'];
	$movie = $_POST['movie'];
	$hobby = $_POST['hobby'];
	$food = $_POST['food'];
	$music = $_POST['music'];
	$day = $_POST['day'];
	$intro = $_POST['intro'];
	$file = $_FILES['file']['tmp_name'];
	
	$_SESSION['key']=$id;
	$_SESSION['value']=1;
	
	if(empty($_POST['id']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['nickname'])){
		echo "<script> alert('필수항목은 전부 입력해주세요 !!!') </script>";
	}
	else{
		$query1 = "SELECT * FROM users WHERE ID='$id'";
		$result1 = mysqli_query($con, $query1);
		$query2 = "SELECT * FROM users WHERE Nickname='$nickname'";
		$result2 = mysqli_query($con, $query2);
		$query3 = "SELECT * FROM users WHERE Email='$email'";
		$result3 = mysqli_query($con, $query3);
		
		if(mysqli_num_rows($result1)>0){  //같은 사람이 한명이상 있다는 것
			header("Location: registration.php?MSG=이미 있는 ID입니다.");
		}
		else if(mysqli_num_rows($result2)>0){  //같은 사람이 한명이상 있다는 것
			header("Location: registration.php?MSG=이미 있는 닉네임입니다.");
		}
		else if(mysqli_num_rows($result3)>0){  //같은 사람이 한명이상 있다는 것
			header("Location: registration.php?MSG=이미 있는 이메일입니다.");
		}
		else{
			if(empty($_FILES['profile']['tmp_name'])){
				$query1 = "INSERT INTO users (ID, Password, Nickname, Email, Movie, Hobby, Food, Music, Day, Introduce)
						VALUES ('$id', '$password', '$nickname', '$email', '$movie', '$hobby', '$food', '$music', '$day', '$intro')";
				if(mysqli_query($con, $query1)){
					$_SESSION['login']=$id;
					header("Location: content.php?regi=<?=$id?>");
				}
			}
	
			else{
				if(isset($file)){
					$image_data = addslashes(file_get_contents($_FILES['profile']['tmp_name']));
					//addcslashes => 보안상한거임
					$image_size = getimagesize($_FILES['profile']['tmp_name']);  // 숫자가 아니면 false로 리턴받음
					if($image_size != FALSE){
						$query2 = "INSERT INTO users (ID, Password, Nickname, Email, Movie, Hobby, Food, Music, Day, Introduce, Profile)
						VALUES ('$id', '$password', '$nickname', '$email', '$movie', '$hobby', '$food', '$music', '$day', '$intro', '$image_data')";
						if(mysqli_query($con, $query2)){
							$_SESSION['login']=$id;
							header("Location: content.php?regi=<?=$id?>");
						}
					}
				}
			}
		}
	}

	
}




?>
<html>
<head>
	<title> 회원가입 </title>
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
.essential {color: #0088FF;}
th {
    text-align: center;
}
</style>
<body>
<?php
if(isset($_GET['MSG'])){
	echo $_GET['MSG'];
}
?>
<br>

<div class="container"><span class="essential"><b>* 필수항목 </b></span>
	<form action="registration.php" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<table border="2" color="#0000FF" class="table table-bordered">
			<tr>
				<th colspan="2" align="center"> 회원가입 </th>
				
			</tr>
			<tr>
				<td> ID <span class="essential">* </span> </td>
				<td> <div class="col-xs-4"><input type="text" name="id" class="form-control"></div> </td>
			</tr>
			<tr>
				<td> 비밀번호 <span class="essential">* </span> </td>
				<td> <div class="col-xs-4"><input type="password" name="password" class="form-control"></div> </td>
			</tr>
			<tr>
				<td> 닉네임 <span class="essential">* </span> </td>
				<td> <div class="col-xs-4"><input type="text" name="nickname" class="form-control"></div> </td>
			</tr>
			<tr>
				<td> 이메일 <span class="essential">* </span> </td>
				<td> <div class="col-xs-6"><input type="text" name="email" class="form-control"></div> </td>
			</tr>
			<tr>
				<td> 좋아하는 영화 장르 </td>
				<td><div class="col-xs-4"><select name="movie" class="form-control">
						<option value="로맨스"> <?php echo "로맨스"; ?> </option>
						<option value="코미디"> <?php echo "코미디"; ?> </option>
						<option value="스릴러"> <?php echo "스릴러"; ?> </option>
						<option value="공포"> <?php echo "공포"; ?> </option>
						<option value="액션"> <?php echo "액션"; ?> </option>
						<option value="느와르"> <?php echo "느와르"; ?> </option>
						<option value="미스터리"> <?php echo "미스터리"; ?> </option>
					</select></div>
				</td>
			</tr>
			
			<tr>
				<td> 취미 </td>
				<td> <div class="col-xs-4"><input type="text" class="form-control" name="hobby" onkeyup="showHint(this.value)"></div> <br> 
				<span class="essential"><p>추천: <span id="txtHint"></span></p></span> </td>
				
			</tr>
			<tr>
				<td> 좋아하는 음식 </td>
				<td> <div class="col-xs-4"><input class="form-control" type="text" name="food"></div> </td>
			</tr>
			<tr>
				<td> 좋아하는 음악 장르 </td>
				<td> <div class="col-xs-4"><select name="music" class="form-control">
						<option value="발라드"> <?php echo "발라드"; ?> </option>
						<option value="댄스"> <?php echo "댄스"; ?> </option>
						<option value="팝"> <?php echo "팝"; ?> </option>
						<option value="어쿠스틱"> <?php echo "어쿠스틱"; ?> </option>
						<option value="힙합"> <?php echo "힙합"; ?> </option>
						<option value="R&B"> <?php echo "R&B"; ?> </option>
						<option value="락"> <?php echo "락"; ?> </option>
						<option value="재즈"> <?php echo "재즈"; ?> </option>
						<option value="트로트"> <?php echo "트로트"; ?> </option>
					</select></div>
				</td>
			</tr>
			<tr>
				<td> 시간되는 요일 </td>
				<td> <div class="col-xs-6"><input type="text" class="form-control" name="day"></div> </td>
			</tr>
			<tr>
				<td> 자기소개 </td>
				<td> <div class="col-xs-10"><textarea name="intro" class="form-control" row="5" cols="40"> </textarea></div> </td>
			</tr>
			<tr>
				<td> 프로필사진 </td>
				<td> <input type="file" name="file" class="btn btn-link"> </td>
			</tr>
			<tr>
				<td colspan="2" align="center"> <input type="submit" name="submit" class="btn btn-primary" value="Registration"> </td>
			</tr>
		
		</table>
	
	</div>
	</form>
</div>
</body>
</html>