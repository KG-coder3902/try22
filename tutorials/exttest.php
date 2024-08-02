<?php
//$servername = "localhost";


// Create connection
$conn = mysqli_connect("localhost","root","","data");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$updId = 10;

$query = mysqli_query($conn,"SELECT * FROM `registration` WHERE ID = '$updId'");
$row = mysqli_fetch_array($query);
echo $row['Name'];
print_r($row);

?>
<table border ="1" cellspacing="0" cellpadding="10">
<tr>
<th>hello</th>
<td>hi</td>
</tr>

</table>

