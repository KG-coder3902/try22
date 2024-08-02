<?php
require 'connection.php';


$delId = $_REQUEST['dId'];

$sql = "DELETE FROM registration WHERE ID = $delId ";
if (mysqli_query($conn, $sql)) {
      echo "Record deleted successfully";
} else {     
    echo "Error deleting record: " . mysqli_error($conn);
} 
header("Location: .\getform.php");

/*<?php deleter($data['ID']); ?>*/

?>
