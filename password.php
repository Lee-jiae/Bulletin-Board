<?php
$con = mysqli_connect('localhost', 'root', 'lee0406', 'jiae_db');
$trans_id = $_GET['trans'];
$query = "UPDATE users SET Password='321321' WHERE PID='$trans_id'";


if(mysqli_query($con, $query)){
	header("Location: admin_users.php");
}
?>