<?php
require '..\connection.php';
// Decrypt email from URL parameter
if (isset($_POST['email'])) {
  $encrypted_email = $_GET['email'];
  $email = base64_decode($encrypted_email); // Decrypt email
  //$email = $_POST['email'];
  echo $email;
} else {
  die("Email parameter is missing.");
}

// SQL query to fetch user profile data based on decrypted email
$sql = "SELECT name, email, contact_number, gender, type FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Fetch user data
  $row = $result->fetch_assoc();
  $name = $row['name'];
  $contactNumber = $row['contact_number'];
  $gender = $row['gender'];
  $type = $row['type'];
} else {
  echo "User profile not found.";
  // Redirect or handle error as needed
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="profile-container">
        <h2>User Profile</h2>
        <div class="profile-details">
            <p><strong>Name:</strong>
                <?php echo $name; ?>
            </p>
            <p><strong>Email:</strong>
                <?php echo $email; ?>
            </p>
            <p><strong>Contact Number:</strong>
                <?php echo $contactNumber; ?>
            </p>
            <p><strong>Gender:</strong>
                <?php echo $gender; ?>
            </p>
            <p><strong>Type:</strong>
                <?php echo $type; ?>
            </p>
        </div>
        <a href="logout.php">Logout</a>
    </div>
</body>

</html>