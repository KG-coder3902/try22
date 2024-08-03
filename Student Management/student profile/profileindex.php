<?php

require '..\connection.php';
//include '..\login2\login.php';

session_start();
if ($_SESSION['status'] != "Active") {
    header("location:..\login2\login2.html");
}

//$email = $_SESSION['email'];
//echo $email;
$id = $_SESSION['userID'];
//$id = $_GET['user_id'];
//echo "hi";
//echo $_GET['user_id'];
echo "   ";

$query = "SELECT * FROM profile WHERE user_id='$id'";
$row = mysqli_fetch_array(mysqli_query($conn, $query));
$query2 = "SELECT * FROM profile WHERE isteacher='no'";
$result = mysqli_query($conn, $query2);
$query3 = "SELECT * FROM profile";
$result2 = mysqli_query($conn, $query3);
// print_r($row);
//session_unset();
$ID = $id;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js">
    </script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script language="JavaScript" type="text/javascript">
        $(document).ready(function() {
            $("a.delete").click(function(e) {
                if (!confirm('Are you sure?')) {
                    e.preventDefault();
                    return false;
                }
                return true;
            });
        });
    </script>
    <link rel="stylesheet" href="/DataTables/datatables.css" />

    <script src="/DataTables/datatables.js"></script>
    <script>
        import DataTable from 'datatables.net-dt';
        import 'datatables.net-responsive-dt';

        let table = new DataTable('#studenttable', {
            responsive: true
        });
        let table = new DataTable('#modifydelete', {
            responsive: true
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" />

</head>

<body onLoad="showhide('profile')">
    <header>

    </header>

    <div class="sidenav" style="text-align: center; vertical-align: middle;">
        <input type="image" src="..\test_images\<?php echo $row['profimg']; ?>" style="vertical-align: right; right: 10;
        width: 50px;
        height: 50px;
        border-radius: 50%;" alt="Avatar" class="avatar" readonly> <br /><br />
        <button onclick="showhide('profile')" style="background-color: #305aff;
        color: white;
        width: 90%;
        height 10%:
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        left: 8;
        cursor: pointer;" class="button">Profile</button>
        <br />
        <br />
        <button onclick="showhide('updreg')" style="background-color: #305aff;
        color: white;
        width: 90%;
        height 10%:
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        left: 8;
        cursor: pointer;" class="button">Edit Profile</button>
        <br />
        <br />
        <button onclick="showhide('chgpass')" style="background-color: #305aff;
        color: white;
        width: 90%;
        height 10%:
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        left: 8;
        cursor: pointer;" class="button">Change Password</button>
        <br />
        <br />
        <button onclick="showhide('myDIV')" style="background-color: #305aff;
        color: white;
        width: 90%;
        height 10%:
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        left: 8;
        cursor: pointer;" class="button" <?php if ($row['isteacher'] == "no") {
                                                echo "hidden";
                                            } ?>>View Student Records</button>
        <br />
        <br />
        <button onclick="showhide('UD')" style="background-color: #305aff;
        color: white;
        width: 90%;
        height 10%:
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        left: 8;
        cursor: pointer;" class="button" <?php if ($row['name'] != "admin") {
                                                echo "hidden";
                                            } ?>>Modify/Delete Records</button>
        <button style="background-color: #305aff;
        color: white;
        width: 8%;
        height 10%:
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        position: fixed;
        bottom: 2%;
        left: 0.5%;
        cursor: pointer;" class="button"><a href=".\logout.php">Logout</a></button>
        <script>
            showhide('profile');
            /*function myFunction() {
                    var x = document.getElementById("myDIV");
                    var y = document.getElementById("profile");
                    if (x.style.display === "none") {
                        x.style.display = "block";
                        y.style.display = "none";
                    } else {
                        x.style.display = "none";
                        y.style.display = "block";
                    }
                }*/

            var divState = ["profile", "myDIV", "UD", "updreg", "chgpass"];

            function showhide(id) {
                if (document.getElementById) {
                    var divid = document.getElementById(id);

                    for (var d in divState) {
                        if (divState[d] != id) {
                            document.getElementById(divState[d]).style.display = 'none';
                        } else {
                            divid.style.display = 'block';
                        }
                    }
                }
            }

            function isfirstpageload() {
                if (localStorage.getItem("hasCodeRunBefore") === null) {
                    localStorage.setItem("screen", "profile");
                    return true;
                    localStorage.setItem("hasCodeRunBefore", true);
                } else {
                    return false;
                }
            }

            function displayscreen() {
                if (isfirstpageload()) {
                    localStorage.setItem("screen", "profile");
                    showhide(localStorage.getItem("screen"));
                } else {
                    showhide(localStorage.getItem("screen"));
                }
            }

            function setscreen(sid) {
                localStorage.setItem("screen", sid);
                displayscreen()
            }

            showhide('profile');
        </script>
    </div>

    <div class="container" id="profile">
        <h1>Profile</h1><input type="image" src="..\test_images\<?php echo $row['profimg']; ?>" style="max-width: 120px;max-height: 120px;" alt="Avatar" class="avatar" readonly><br />
        <form id="profileForm" action=".\student-reg-update.php?user_id=$row['user_id']" method="get">

            <label for="name">Name : </label><input type="text" value="<?php echo $row['name']; ?>" readonly><br /><br />

            <label for="email">Email : </label><input type="text" value="<?php echo $row['email']; ?>" readonly><br /><br />

            <label for="address">Address : </label><input type="text" value="<?php echo $row['address']; ?>" readonly><br /><br />

            <label for="contact">Contact Number :</label> <input type="text" value="<?php echo $row['phone']; ?>" readonly><br /><br />

            <label for="gender">Gender : </label><input type="text" value="<?php echo $row['gender']; ?>" readonly><br /><br />
            <input type="text" name="userid" value="<?php echo $row['user_id']; ?>" hidden readonly>
            <br><br>

            <!--input type="submit" value="Edit"-->
        </form>
    </div>
    <br />
    <div class="container" <?php if ($row['isteacher'] == "no") {
                                echo "hidden";
                            } ?> id="myDIV">
        <div>
            <h1>Student Record</h1>
            <table border="1" cellspacing="0" cellpadding="10" id="studenttable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Profile Image</th>
                        <th>Full Name</th>
                        <th>Address</th>
                        <th>email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //print_r($row2);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($data = mysqli_fetch_assoc($result)) {
                            echo "
                            <tr>
                                <td>" . $data['user_id'] . "</td>
                                <td><img style=\"max-width: 120px;max-height: 120px;\" src=\"..\\test_images\\" . $data['profimg'] . "\"alt=\"Image\"></td>
                                <td>" . $data['name'] . "</td>
                                <td>" . $data['address'] . "</td>
                                <td>" . $data['email'] . "</td>
                                <td>" . $data['phone'] . "</td>
                                <td>" . $data['gender'] . "</td>
                            </tr>
                        ";
                        }
                    } else {
                        echo "
                            <tr>
                            <td colspan=\"8\">No data found</td>
                            </tr>";
                    }

                    ?>
                </tbody>
            </table>
            <script>
                $(function() {
                    $("#studenttable").dataTable();
                });
            </script>
        </div>
    </div>
    <div class="container" <?php if ($row['name'] != "admin") {
                                echo "hidden";
                            } ?> id="UD">
        <div>
            <h1>Modify/Delete Record</h1>
            <table border="1" id="modifydelete" cellspacing="0" cellpadding="10" class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">User ID</th>
                        <th scope="col">Profile Image</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Is Teacher?</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //print_r($row2);
                    if (mysqli_num_rows($result2) > 0) {
                        // output data of each row
                        while ($data = mysqli_fetch_assoc($result2)) {
                            echo "
                            <tr>
                                <td>" . $data['user_id'] . "</td>
                                <td><img style=\"max-width: 120px;max-height: 120px;\" src=\"..\\test_images\\" . $data['profimg'] . "\"alt=\"Image\"></td>
                                <td>" . $data['name'] . "</td>
                                <td>" . $data['address'] . "</td>
                                <td>" . $data['email'] . "</td>
                                <td>" . $data['phone'] . "</td>
                                <td>" . $data['gender'] . "</td>
                                <td>" . $data['isteacher'] . "</td>
                                <td>
                                <a href=\".\student-reg-update.php?userid=" . $data['user_id'] . "\"><button style = \"color: blue;\">update</button></a><br/><br/>
                                
                                <a href=\".\delete-data-prof.php?dId=" . $data['user_id'] . "\"class=\"delete\"><button style = \"color: red;\">delete</button></a></td>
                            </tr>
                        ";
                        }
                    } else {
                        echo "
                            <tr>
                            <td colspan=\"8\">No data found</td>
                            </tr>";
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container" id="updreg">
        <h1>REGISTRATION UPDATE FORM</h1>
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
                <div class="col" hidden>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="Password" value="<?php echo $row['password'] ?>" />
                    <span id="password-error" class="error-message"></span>
                </div>
                <div class="col" hidden>
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
                </div>
            </div>
        </form>
    </div>
    <div class="container" id="chgpass">
        <h1>Change Password</h1>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <p class="text-center">Use the form below to change your password. Your password cannot be the same as your username.</p>
                <form method="post" id="passwordForm" action=".\change_password.php">
                    <label>
                        <!-- <input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="New Password" autocomplete="off">
         <span onclick="let a=this.parentElement.children[0];(a.type==='password')?a.setAttribute('type','text'):a.setAttribute('type','password')" style=cursor:help>👁 View</span> -->

                        <!-- <input id="pass_log_id" type="password" name="pass" value="MySecretPass"> -->
                        <input type="password" class="input-lg form-control" id="password1" name="password1" placeholder="New Password" autocomplete="off"> Show
                        <input type="checkbox" onclick="myFunction()">


                    </label>
                    <div class="row">
                        <div class="col-sm-6">
                            <span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> 8 Characters Long<br>
                            <span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Uppercase Letter
                        </div>
                        <div class="col-sm-6">
                            <span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Lowercase Letter<br>
                            <span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Number
                        </div>
                    </div>
                    <!-- <input type="password" class="input-lg form-control" name="password2" id="password2" placeholder="Repeat Password" autocomplete="off"> -->
                    <input type="password" class="input-lg form-control" id="password2" name="password2" placeholder="Repeat Password" autocomplete="off">Show
                    <input type="checkbox" onclick="myFunction2()">
                    <div class="row">
                        <div class="col-sm-12">
                            <span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Passwords Match
                        </div>
                    </div>
                    <input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Change Password">
                </form>
            </div><!--/col-sm-6-->
        </div><!--/row-->
    </div>
    <script src="student-reg-update-script.js"></script>

    <script src="script.js"></script>
    <script>
        $(document).ready(function() {
            $('#modifydelete').DataTable();
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#studenttable').DataTable();
        })
    </script>
    <script>
        $("input[type=password]").keyup(function() {
            var ucase = new RegExp("[A-Z]+");
            var lcase = new RegExp("[a-z]+");
            var num = new RegExp("[0-9]+");

            if ($("#password1").val().length >= 8) {
                $("#8char").removeClass("glyphicon-remove");
                $("#8char").addClass("glyphicon-ok");
                $("#8char").css("color", "#00A41E");
            } else {
                $("#8char").removeClass("glyphicon-ok");
                $("#8char").addClass("glyphicon-remove");
                $("#8char").css("color", "#FF0004");
            }

            if (ucase.test($("#password1").val())) {
                $("#ucase").removeClass("glyphicon-remove");
                $("#ucase").addClass("glyphicon-ok");
                $("#ucase").css("color", "#00A41E");
            } else {
                $("#ucase").removeClass("glyphicon-ok");
                $("#ucase").addClass("glyphicon-remove");
                $("#ucase").css("color", "#FF0004");
            }

            if (lcase.test($("#password1").val())) {
                $("#lcase").removeClass("glyphicon-remove");
                $("#lcase").addClass("glyphicon-ok");
                $("#lcase").css("color", "#00A41E");
            } else {
                $("#lcase").removeClass("glyphicon-ok");
                $("#lcase").addClass("glyphicon-remove");
                $("#lcase").css("color", "#FF0004");
            }

            if (num.test($("#password1").val())) {
                $("#num").removeClass("glyphicon-remove");
                $("#num").addClass("glyphicon-ok");
                $("#num").css("color", "#00A41E");
            } else {
                $("#num").removeClass("glyphicon-ok");
                $("#num").addClass("glyphicon-remove");
                $("#num").css("color", "#FF0004");
            }

            if ($("#password1").val() == $("#password2").val()) {
                $("#pwmatch").removeClass("glyphicon-remove");
                $("#pwmatch").addClass("glyphicon-ok");
                $("#pwmatch").css("color", "#00A41E");
            } else {
                $("#pwmatch").removeClass("glyphicon-ok");
                $("#pwmatch").addClass("glyphicon-remove");
                $("#pwmatch").css("color", "#FF0004");
            }
        });
    </script>
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js">
    </script>
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js">
    </script>
    <script>
        $(function() {
            $("#modifydelete").dataTable();
        });
    </script>
    <script>
        function myFunction() {
            var x = document.getElementById("password1");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function myFunction2() {
            var x = document.getElementById("password2");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>