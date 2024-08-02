<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form id="loginForm" action="index.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>

</html>


<?php
require 'connection.php';

$query = "SELECT email,password FROM 'profile'";
$result = mysqli_query($conn, $query);

while($data = mysqli_fetch_assoc($result)) {
    $gender = $data['Gender'];
}


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