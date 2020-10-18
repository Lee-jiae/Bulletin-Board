<?php
$con=mysqli_connect("localhost","root","lee0406");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Create database
$sql="CREATE DATABASE jiae_db";
if (mysqli_query($con,$sql))
  {
  echo "Database jiae_db created successfully";
  }
else
  {
  echo "Error creating database: " . mysqli_error($con);
  }
?>