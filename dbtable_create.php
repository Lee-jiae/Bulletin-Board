<?php
$con=mysqli_connect("localhost","root","lee0406","jiae_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Create table
$sql="CREATE TABLE users(PID INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(PID), 
ID CHAR(30), Profile MEDIUMBLOB, Password CHAR(30), Nickname CHAR(30), Email CHAR(30), Movie CHAR(30), 
Hobby CHAR(20), Food CHAR(40), Music CHAR(20), Day CHAR(50), Introduce TEXT)";

// Execute query
if (mysqli_query($con,$sql))
  {
  echo "Table users created successfully";
  }
else
  {
  echo "Error creating table: " . mysqli_error($con);
  }
?>