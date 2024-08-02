</*?php
// Example: Connecting to database and fetching user profile data
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentmangement";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Assuming you have a user ID parameter passed via GET or POST
$user_id = $_GET['user_id']; // Adjust as per your application logic

// SQL query to fetch user profile data
$sql = "SELECT name, email, contact_number, gender, type FROM profile WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Fetching data
  $row = $result->fetch_assoc();

  // Outputting JSON response
  header('Content-Type: application/json');
  echo json_encode($row);
} else {
  echo "User not found.";
}

$conn->close();
?>

<?php
// Start session to access session variables
session_start();

// Check if user is logged in (i.e., if email is stored in session)
if (!isset($_SESSION['email'])) {
  die("Unauthorized access. Please login.");
}

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentmangement";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve email from session
$email = $_SESSION['email'];

// SQL query to fetch user profile data based on email
$sql = "SELECT name,address, email, phone, gender FROM profile WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Fetch and return profile data as JSON
  $row = $result->fetch_assoc();
  header('Content-Type: application/json');
  echo json_encode($row);
} else {
  echo "User profile not found.";
}

$conn->close();
?>

