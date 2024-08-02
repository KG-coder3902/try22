<?php

require '..\connection.php';
session_start();

if ($_SESSION['status'] != "Active") {
    header("location:..\login2\login2.html");
}

if ($_REQUEST) {
    //print_r($_REQUEST);
    $ID = $_SESSION['userID'];
    $password = $_REQUEST['password1'];


    $sql = "UPDATE profile SET password= '$password' WHERE user_id = '$ID' ";
    if (mysqli_query($conn, $sql)) {
        echo "<script> window.location.href='profileindex.php?user_id=$ID';
            alert('Record updated successfully');
            </script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn) . "window.history.go(-1);";
    }
    //header("Location: ..\login2\login2.html");

}
