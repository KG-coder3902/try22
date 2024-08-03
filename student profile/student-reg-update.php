<?php
require '..\connection.php';

$ID = $_GET['userid'];
// print_r($ID);
$query = "SELECT * FROM profile WHERE user_id='$ID'";
$row = mysqli_fetch_array(mysqli_query($conn, $query));

session_start();
if ($_SESSION['status'] != "Active") {
    header("location:..\login.php");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UPDATE Form Validation</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <h1>REGISTRATION UPDATE FORM</h1>
    <div class="sidenav" style="text-align: center; vertical-align: middle;">
        <input type="image" src="..\test_images\<?php echo $row['profimg']; ?>" style="vertical-align: right; right: 10;
        width: 50px;
        height: 50px;
        border-radius: 50%;" alt="Avatar" class="avatar" readonly> <br /><br />
        <button style="background-color: #305aff;
        color: white;
        width: 8%;
        height 10%:
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        position: fixed;
        bottom: 4%;
        left : .5%;
        cursor: pointer;" class="button"><a href=".\logout.php">Logout</a></button>
    </div>
    <div class="container">
        <form name="RegForm" action=".\student-reg-update-php.php?user_id = <?php echo $ID; ?>" method="post" onsubmit="return validateForm()">
            <div class="row">
                <div class="col">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="Name" placeholder="Enter your full name" value="<?php echo $row['name'] ?>" />
                    <span id="name-error" class="error-message"></span>
                </div>
                <div class="col">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="Address" placeholder="Enter your address" value="<?php echo $row['address'] ?>" />
                    <span id="address-error" class="error-message"></span>
                </div>
                <div class="col">
                    <label for="email">E-mail Address:</label>
                    <input type="text" id="email" name="EMail" placeholder="Enter your email" value="<?php echo $row['email'] ?>" />
                    <span id="email-error" class="error-message"></span>
                </div>
                <div class="col">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="Password" value="<?php echo $row['password'] ?>" />
                    <span id="password-error" class="error-message"></span>
                </div>
                <div class="col">
                    <label for="conpassword">Conform Password:</label>
                    <input type="password" id="conpassword" name="conPassword" value="<?php echo $row['password'] ?>" />
                    <span id="conpassword-error" class="error-message"></span>
                </div>
                <div class="col">
                    <label for="phone">Enter your phone number:</label>
                    <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" value="<?php echo $row['phone'] ?>" />
                    <span id="phone-error" class="error-message"></span>
                </div>
                <div class="col">
                    Previous profile Image<br />
                    <input type="image" src="..\test_images\<?php echo $row['profimg']; ?>" style="max-width: 120px;max-height: 120px;" alt="Avatar" class="avatar" readonly><br />
                    <label for="profimg">Enter your Profile Image:</label>
                    <input type="file" id="profimg" name="profimg" accept="image/*" onchange="loadFile(event)"><br />
                    <img id="output" style="max-width: 120px;max-height: 120px;" alt="preview" />
                    <script>
                        var loadFile = function(event) {
                            var output = document.getElementById('output');
                            output.src = URL.createObjectURL(event.target.files[0]);
                            output.onload = function() {
                                URL.revokeObjectURL(output.src) // free memory
                            }
                        };
                    </script>
                    <span id="profimg-error" class="error-message"></span>
                </div>
                <div class="col">
                    <input type="radio" id="Isteacher" name="isteacher" value="yes" <?php if ($row['isteacher'] == "yes") {
                                                                                        echo "checked";
                                                                                    } ?> />
                    <input type="radio" id="Isteacher" name="isteacher" value="no" hidden <?php if ($row['isteacher'] == "no") {
                                                                                                echo "checked";
                                                                                            } ?> />
                    <label for="Isteacher">Is Teacher?</label>
                </div>
                <div class="col">
                    <label for="gender">Select Your Gender:</label>
                    <select id="gender" name="Gender">
                        <option value="">
                            Select Gender
                        </option>
                        <option value="Male" <?php if (isset($row['gender']) && $row['gender'] == "Male") echo "selected"; ?>>
                            Male
                        </option>
                        <option value="Female" <?php if (isset($row['gender']) && $row['gender'] == "Female") echo "selected"; ?>>
                            Female
                        </option>
                        <option value="Other" <?php if (isset($row['gender']) && $row['gender'] == "Other") echo "selected"; ?>>
                            Other
                        </option>
                    </select>
                    <span id="gender-error" class="error-message"></span>
                </div>
                <div class="col">
                    <input type="checkbox" id="agree" name="Agree" checked hidden />
                    <label for="agree" hidden>I agree to the above
                        information</label>
                    <span id="agree-error" class="error-message"></span>
                </div>
                <div class="col">
                    <input type="submit" value="Send" name="Submit" />
                    <input type="reset" value="Reset" name="Reset" />
                    <button class="cbutton" style="background-color: #007bff;color: #fff;border: none;border-radius: 5px;
                    padding: 10px 20px;cursor: pointer;font-size: 16px;" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'" onclick="history.back()">
                        Cancel</button>
                </div>
            </div>
        </form>
    </div>
    <script src="student-reg-update-script.js"></script>
</body>

</html>