<?php
$con = mysqli_connect('localhost', 'root', 'lee0406', 'jiae_db');
$delete_id = $_GET['del'];
$query = "DELETE FROM users WHERE PID='$delete_id'";

if(mysqli_query($con, $query)){
	header("Location: admin_users.php");
}

?>