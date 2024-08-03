<?php

require '..\connection.php';
session_start();

if ($_SESSION['status'] != "Active") {
    header("location:..\login.php");
}

if ($_REQUEST) {
    //print_r($_REQUEST);
    $ID = $_REQUEST['user_id_'];
    $name = $_REQUEST['Name'];
    $address = $_REQUEST['Address'];
    mysqli_query($conn, "UPDATE profile SET email= '' WHERE user_id = '$ID' ");
    $email = emailcheck($_REQUEST['EMail'], $ID);
    $password = $_REQUEST['Password'];
    $phone = $_REQUEST['phone'];
    //$eligible = $_REQUEST['myEligibility'];
    $gender = $_REQUEST['Gender'];
    $isteacher = $_REQUEST['isteacher'];
    $profimg = $_REQUEST['profimg'];


    $sql = "UPDATE profile SET name= '$name' , address= '$address' ,email= '$email' ,password= '$password' ,phone= '$phone',isteacher='$isteacher',
    gender= '$gender',profimg='$profimg' WHERE user_id = '$ID' ";
    if (mysqli_query($conn, $sql)) {
        echo "<script> window.location.href='.\users-profile.php';
            alert('Record updated successfully');
            </script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn) . "window.history.go(-1);";
    }
    //header("Location: ..\login2\login2.html");

}

function emailcheck($cemail, $ID)
{
    require '..\connection.php';
    if ($cemail != "") {
        $sql = mysqli_query($conn, "select * from `profile` where email='" . $cemail . "'");
        $fetch = mysqli_num_rows($sql);
        if ($fetch > 0) {
            echo
            "
            <script> window.location.href='student-reg-update.php?userid=$ID';
            alert('Email already exists please enter a new unique email.');
            </script>
            ";
        } else {
            return $cemail;
        }
    }
}
