<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forms</title>
</head>

<body>
    <h2>This is HTML form for Update</h2>





    <?php

        require 'connection.php';

        $updId = $_REQUEST['upId'];

        $query = "SELECT * FROM `registration` WHERE ID = '$updId'";
        echo $updId;
        $result = mysqli_query($conn, $query);
        //echo $result['Name'];
    ?>


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

        function deleter($delID){  
        echo "Hello $delID<br/>";  
        }

        if (mysqli_num_rows($result) > 0) {
        $sn=1;
        while($data = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
        <td><?php echo $data['ID']; $id = $data['ID'];?> </td>
        <td><?php echo $data['Name']; ?> </td>
        <td><?php echo $data['Role']; ?> </td>
        <td><?php echo $data['Email']; ?> </td>
        <td><?php echo $data['Date']; ?> </td>
        <td><?php echo $data['Bonus']; ?> </td>
        <td><?php echo $data['eligible']; ?> </td>
        <td><?php echo $data['Gender'];  $gender = $data['Gender']?> </td>
        <td><?php echo $data['description']; ?> </td>
        <td><?php echo $data['Skills'] ??  'NULL' ; $skills = $data['Skills']; /*$skill = ""; foreach($skills as $row){ $skill .= $row . ","; }*/?> </td>
        <td><?php echo $data['Car']; $car = $data['Car'];?> </td>
        <tr>

        <?php
        $sn++;}} else { ?>
            <tr>
            <td colspan="8">No data found</td>
            </tr>

        <?php } ?>
    </table>





      <?php
            $result1 = mysqli_query($conn,$query); 
            while ($row = mysqli_fetch_array($result1)) {
                //echo $row['Name'];
                //print_r($row);
                //echo "<br/><br/>";
                //print_r($skills);
                echo "<br/><br/>";
            }
        ?>
    <form action=".\update-data-form.php?myID = <?php echo $id;?>" method="post">
        <label for="name"> Name</label>
        <div>
            <input type="hidden" name="myID" value="<?php $result1 = mysqli_query($conn,$query); while ($row = mysqli_fetch_array($result1)) echo $row['ID']; ?>">
            <input type="text" name="myName" id="name" value="<?php $result1 = mysqli_query($conn,$query); while ($row = mysqli_fetch_array($result1)) echo $row['Name']; ?>">
        </div>
        <br>
        <div>
            Role: <input type="text" name="myRole" value="<?php $result1 = mysqli_query($conn,$query); while ($row = mysqli_fetch_array($result1)) echo $row['Role']; ?>">
        </div>
        <br>
        <div>
            Email: <input type="email" name="myEmail" value="<?php $result1 = mysqli_query($conn,$query); while ($row = mysqli_fetch_array($result1)) echo $row['Email']; ?>">
        </div>

        <br>
        <div>
            Date: <input type="date" name="myDate" value="<?php $result1 = mysqli_query($conn,$query); while ($row = mysqli_fetch_array($result1)) echo $row['Date']; ?>">
        </div>
        <br>
        <div>
            Bonus: <input type="number" name="myBonus" value="<?php $result1 = mysqli_query($conn,$query); while ($row = mysqli_fetch_array($result1)) echo $row['Bonus']; ?>">
        </div>
        <br>
        <div>
            Are you eligible?: <input type="checkbox" name="myEligibility" checked>
        </div>
        <br>
        <div>
            Gender: Male <input type="radio" name="myGender" value="male" <?php if (isset($gender) && $gender=="male") echo "checked";?>>
            Female <input type="radio" name="myGender" value="female" <?php if (isset($gender) && $gender=="female") echo "checked";?>>
            Other <input type="radio" name="myGender" value="other" <?php if (isset($gender) && $gender=="other") echo "checked";?>>
        </div>

        <br>
        <div>
            Write about yourself: <br><textarea name="mydesciption" cols="90" rows="10"><?php $result1 = mysqli_query($conn,$query); while ($row = mysqli_fetch_array($result1)) echo $row['description']; ?></textarea>
        </div>
        <br>

        <label for="skills">Skills</label>
        <div>
            <input type="checkbox" name="myskills[]" value="java" <?php foreach(explode(",", $skills) as $x){if($x == "java"){echo "checked";}}?>><samp>Java</samp>
            <input type="checkbox" name="myskills[]" value="javascript" <?php foreach(explode(",", $skills) as $x){if($x == "javascript"){echo "checked";}}?>><samp>Javascript</samp>
            <input type="checkbox" name="myskills[]" value="php" <?php foreach(explode(",", $skills) as $x){if($x == "php"){echo "checked";}}?>><samp>PHP</samp>
            <input type="checkbox" name="myskills[]" value="c" <?php foreach(explode(",", $skills) as $x){if($x == "c"){echo "checked";}}?>><samp>C</samp>
            <input type="checkbox" name="myskills[]" value="cpp" <?php foreach(explode(",", $skills) as $x){if($x == "cpp"){echo "checked";}}?>><samp>CPP</samp>
        </div>
        <br>

        <div>
            <label for="car">Car</label>
            <select name="myCar" id="car">
                <option value="indica" <?php if($car == "indica"){echo "selected";}?>>Indica</option>
                <option value="swift" <?php if($car == "swift"){echo "selected";}?>>Swift</option>
                <option value="nexon" <?php if($car == "nexon"){echo "selected";}?>>Nexon</option>
                <option value="tiago" <?php if($car == "tiago"){echo "selected";}?>>Tiago</option>
            </select>
        </div>
        <br>

        <div>
            <input type="submit" value="Update Now">
            <input type="reset" value="Reset Now">
        </div>
    </form>
    
</body>

</html>