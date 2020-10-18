<?php
$con = mysqli_connect('localhost', 'root', 'lee0406', 'jiae_db') or die(mysqli_connect_error);
$id = $_REQUEST['name'];
$image = mysqli_query($con, "SELECT * FROM users WHERE ID='$id'");
$image = mysqli_fetch_assoc($image);
$image = $image['Profile'];
// header("Content_type: image/jpeg"); => 원래는 햇어야햇는데 요즘엔 안해도됌
echo $image;
?>