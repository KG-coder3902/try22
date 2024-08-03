<?php

require '.\connection.php';
//include '..\login2\login.php';

session_start();
if ($_SESSION['status'] != "Active") {
  header("location:.\login.php");
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
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Users / Profile - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include("header.php") ?>


  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include("sidebar.php") ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="users-profile.php">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src=".\test_images\<?php echo $row['profimg']; ?>" alt="Profile" class="rounded-circle">
              <h2><?php echo $row['name']; ?></h2>
              <h3><?php echo $row['email']; ?></h3>

            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item" hidden>
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change
                    Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['name']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Contact Number</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['phone']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['address']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['email']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Gender</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['gender']; ?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form name="RegForm" action=".\student profile\student-reg-update-php.php?user_id = <?php echo $ID; ?>" method="post" onsubmit="return validateForm()">
                    <div class="row">
                      <div class="row mb-3">
                        <label for="prevprofimg">Previous profile Image</label><br />
                        <input type="image" src=".\test_images\<?php echo $row['profimg']; ?>" style="max-width: 120px;max-height: 120px;" alt="Avatar" class="avatar" readonly><br />
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
                      <div class="row mb-3">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="Name" class="form-control" placeholder="Enter your full name" value="<?php echo $row['name'] ?>" />
                        <span id="name-error" class="error-message"></span>
                      </div>
                      <div class="row mb-3">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="Address" class="form-control" placeholder="Enter your address" value="<?php echo $row['address'] ?>" />
                        <span id="address-error" class="error-message"></span>
                      </div>
                      <div class="row mb-3">
                        <label for="email">E-mail Address:</label>
                        <input type="text" id="email" name="EMail" class="form-control" placeholder="Enter your email" value="<?php echo $row['email'] ?>" />
                        <span id="email-error" class="error-message"></span>
                      </div>
                      <div class="row mb-3" hidden>
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="Password" class="form-control" value="<?php echo $row['password'] ?>" />
                        <span id="password-error" class="error-message"></span>
                      </div>
                      <div class="row mb-3" hidden>
                        <label for="conpassword">Conform Password:</label>
                        <input type="password" id="conpassword" name="conPassword" class="form-control" value="<?php echo $row['password'] ?>" />
                        <span id="conpassword-error" class="error-message"></span>
                      </div>
                      <div class="row mb-3">
                        <label for="phone">Enter your phone number:</label>
                        <input type="tel" id="phone" name="phone" class="form-control" pattern="[0-9]{10}" value="<?php echo $row['phone'] ?>" />
                        <span id="phone-error" class="error-message"></span>
                      </div>
                      <div class="row mb-3">
                        <label for="Isteacher">Is Teacher?</label>
                        <input type="radio" id="Isteacher" name="isteacher" value="yes" <?php if ($row['isteacher'] == "yes") {
                                                                                          echo "checked";
                                                                                        } ?> />
                        <input type="radio" id="Isteacher" name="isteacher" value="no" hidden <?php if ($row['isteacher'] == "no") {
                                                                                                echo "checked";
                                                                                              } ?> />
                      </div>
                      <div class="row mb-3">
                        <label for="gender">Select Your Gender:</label>
                        <select id="gender" name="Gender" class="form-control">
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
                      <div class="row mb-3">
                        <input type="checkbox" id="agree" name="Agree" checked hidden />
                        <label for="agree" hidden>I agree to the above
                          information</label>
                        <span id="agree-error" class="error-message"></span>
                      </div>
                      <div class="row mb-3">
                        <input type="submit" value="Send" name="Submit" class="btn btn-primary" style="width :8%;" />
                        <input type="reset" value="Reset" name="Reset" class="btn btn-primary" style="width :8%;" />
                      </div>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                      <p class="text-center">Use the form below to change your password. Your password cannot be the same as your username.</p>
                      <form method="post" id="passwordForm" action=".\student profile\change_password.php">
                        <label>
                          <!-- <input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="New Password" autocomplete="off">
         <span onclick="let a=this.parentElement.children[0];(a.type==='password')?a.setAttribute('type','text'):a.setAttribute('type','password')" style=cursor:help>👁 View</span> -->

                          <!-- <input id="pass_log_id" type="password" name="pass" value="MySecretPass"> -->
                          <input type="password" class="input-lg form-control" id="password1" name="password1" placeholder="New Password" autocomplete="off"> Show
                          <input type="checkbox" onclick="myFunction()">


                        </label>
                        <div class="row">
                          <div class="col-sm-6">
                            <span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"> 8 Characters Long<br></span>
                            <span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"> One Uppercase Letter</span>
                          </div>
                          <div class="col-sm-6">
                            <span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"> One Lowercase Letter<br></span>
                            <span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"> One Number</span>
                          </div>
                        </div>
                        <!-- <input type="password" class="input-lg form-control" name="password2" id="password2" placeholder="Repeat Password" autocomplete="off"> -->
                        <input type="password" class="input-lg form-control" id="password2" name="password2" placeholder="Repeat Password" autocomplete="off">Show
                        <input type="checkbox" onclick="myFunction2()">
                        <div class="row">
                          <div class="col-sm-12">
                            <span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"> Passwords Match</span>
                          </div>
                        </div>
                        <input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Change Password">
                      </form>
                    </div><!--/col-sm-6-->
                  </div><!--/row-->
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
                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" hidden>
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="student-reg-update-script.js"></script>

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