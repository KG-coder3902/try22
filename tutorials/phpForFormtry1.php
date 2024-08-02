<?php

require 'connection.php';

if ($_REQUEST) {
    $name = $_REQUEST['myName'];
    $role = $_REQUEST['myRole'];
    $email = $_REQUEST['myEmail'];
    $date = $_REQUEST['myDate'];
    $bonus = $_REQUEST['myBonus'];
    $eligible = $_REQUEST['myEligibility'];
    $gender = $_REQUEST['myGender'];
    $desciption = $_REQUEST['mydesciption'];
    $skills = $_REQUEST['myskills'];
    $car = $_REQUEST['myCar'];
    
    $skill = "";
    foreach($skills as $row){
        $skill .= $row . ",";
    }


    $query = "INSERT INTO registration VALUES('','$name', '$role', '$email', '$date', '$bonus','$eligible','$gender','$desciption','$skill','$car')";
    mysqli_query($conn,$query);
    header("Location: .\getform.php");
    echo
    "
    <script> alert('Data Inserted Successfully');
    </script>
    ";
    
}

?>
