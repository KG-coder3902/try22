<?php
//$servername = "localhost";


// Create connection
$conn = mysqli_connect("localhost","root","","data");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>

