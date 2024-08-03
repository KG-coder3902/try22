<?php
require 'connection.php';

if ($_REQUEST) {
    $name = $_REQUEST['Name'];
    $address = $_REQUEST['Address'];
    $email = $_REQUEST['EMail'];
    $password = $_REQUEST['Password'];
    $phone = $_REQUEST['phone'];
    $gender = $_REQUEST['Gender'];
    $isteacher = $_REQUEST['isteacher'];
    $profimg = $_REQUEST['profimg'];


    if ($email != "") {
        $sql = mysqli_query($conn, "select * from `profile` where email='" . $email . "'");
        $fetch = mysqli_num_rows($sql);
        if ($fetch > 0) {
            echo "email already inserted";
            //header("Location: .\student-reg.html");
            echo
            "
            <script> alert('Email already exists please enter a new unique email.');
            window.location.href='student-reg.html';
            </script>
            ";
        } else {
            $query = "INSERT INTO profile VALUES('','$name', '$address', '$email', '$password', '$phone','$gender','$isteacher','$profimg')";
            mysqli_query($conn, $query);
            header("Location: .\pages-login.html");
            echo
            "
            <script> alert('Data Inserted Successfully');
            </script>
            ";
        }
    }
}
