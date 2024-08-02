<?php

require '..\connection.php';

$email = $_POST['email'];
$password = $_POST['password'];
$email = mysqli_real_escape_string($conn, $email);


//$hashed_password = md5($password);

$sql = "SELECT * FROM profile WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  $_POST['email'] = $email;
  header("Location: ..\studentProfiletry2\p2index.php");
  exit();
} else {
  echo "Invalid email or password. Please try again.";
}

$conn->close();
?>
