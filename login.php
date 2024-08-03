<?php
require '.\connection.php';

if ($_REQUEST) {
    $email = $_REQUEST['EMail'];
    $password = $_REQUEST['Password'];


    $query = "SELECT * FROM profile WHERE email='$email' AND password='$password'";
    $row = mysqli_fetch_array(mysqli_query($conn, $query));
    if ($row) {
        print_r($row);
        session_start();
        $_SESSION['userID'] = $row['user_id'];
        $_SESSION['status'] = "Active";
        header("Location: .\users-profile.php");
    } else {
        //header("Location: .\login2.html");
        //trigger_error("Error");
        echo "<script> alert('Incorrect email or password or captcha please renter correctly.'); window.location.href='pages-login.html';</script>";
    }
}
