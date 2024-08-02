<?php
require 'connection.php';


//$upId = $_REQUEST['myID'];
//echo $upId;

if ($_REQUEST) {
    print_r($_REQUEST);
    $ID = $_REQUEST['myID'];
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


    $updId = $_REQUEST['myID'];
    echo $updId;

    $sql = "UPDATE registration SET Name= '$name' , Role= '$role' ,email= '$email' ,Date= '$date' ,Bonus= '$bonus',eligible= '$eligible',
    Gender= '$gender',Skills= '$skill',Car= '$car', description='$desciption' WHERE ID = '$updId' ";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {     
        echo "Error deleting record: " . mysqli_error($conn);
    } 
    header("Location: .\getform.php");
}
/*<?php deleter($data['ID']); ?>*/

?>

