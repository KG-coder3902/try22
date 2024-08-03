<?php
require '..\connection.php';

session_start();

if ($_SESSION['status'] != "Active") {
    header("location:..\login.php");
}

$delId = $_REQUEST['dId'];

$sql = "DELETE FROM profile WHERE user_id = $delId ";
if (mysqli_query($conn, $sql)) {
    echo "<script> alert('Record deleted successfully'); </script>";
} else {
    echo "<script> alert('Error deleting record:'); </script>" . mysqli_error($conn);
}
if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}

/*<?php deleter($data['ID']); ?>*/
