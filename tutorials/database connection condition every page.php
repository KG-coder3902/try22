database connection condition every page
delete the record
update the record(form a new page to update record(i.e. copy form page and modify it) and form a function)

















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
        
    </tr>
     <?php
        require 'connection.php';

        $updId = $_REQUEST['upId'];

        $query = "SELECT * FROM `registration` WHERE ID = '$updId'";
        echo $updId;
        $result = mysqli_query($conn, $query);
        echo $result['Name'];
    ?>
    <tr>
        <td><?php echo $result['ID']; ?> </td>
        <td><?php echo $result['Name']; ?> </td>
        <td><?php echo $result['Role']; ?> </td>
        <td><?php echo $result['Email']; ?> </td>
        <td><?php echo $result['Date']; ?> </td>
        <td><?php echo $result['Bonus']; ?> </td>
        <td><?php echo $result['eligible']; ?> </td>
        <td><?php echo $result['Gender']; ?> </td>
        <td><?php echo $result['Write about yourself']; ?> </td>
        <td><?php echo $result['Skills'] ??  'NULL' ; ?> </td>
        <td><?php echo $result['Car']; ?> </td>
    <tr>
    </table>