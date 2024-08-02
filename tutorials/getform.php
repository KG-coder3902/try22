<?php
require 'connection.php';

$query = "SELECT * FROM registration";
$result = mysqli_query($conn, $query);

 
?>


<a href=".\formtry1.html">
  <button>Insert Data</button>
</a>

<br/>
<br/>
<table border ="1" cellspacing="0" cellpadding="10">
  <tr>
    <th>ID</th>
    <th>Full Name</th>
    <th>Roll Number</th>
    <th>Email</th>
    <th>Date</th>
    <th>Bonus</th>
    <th>Is Eligible</th>
    <th>Gender</th>
    <th>Description</th>
    <th>Skill</th>
    <th>Car</th>
    <th>Action</th>
    
  </tr>
<?php

function deleter($delID){  
  echo "Hello $delID<br/>";  
  }

if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tr>
   <td><?php echo $data['ID']; ?> </td>
   <td><?php echo $data['Name']; ?> </td>
   <td><?php echo $data['Role']; ?> </td>
   <td><?php echo $data['Email']; ?> </td>
   <td><?php echo $data['Date']; ?> </td>
   <td><?php echo $data['Bonus']; ?> </td>
   <td><?php echo $data['eligible']; ?> </td>
   <td><?php echo $data['Gender']; ?> </td>
   <td><?php echo $data['description']; ?> </td>
   <td><?php echo $data['Skills'] ??  'NULL' ; ?> </td>
   <td><?php echo $data['Car']; ?> </td>
   <td>
    <a href=".\formtry1_update.php?upId=<?php echo $data['ID']; ?>">update</a>
    ,
    <a href=".\delete-data-form-form.php?dId=<?php echo $data['ID']; ?>">delete</a></td>
 <tr>

 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>

 <?php } ?>

 <?php

 
 ?>
  </table>

<br>
<br>





