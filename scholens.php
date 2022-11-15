<?php
ob_start();
include('header-min.php');
include('connection.php');
session_start();
if (array_key_exists("submit", $_POST)) {
  if (!$_POST['email']) {
    $error .= "An email is required.";
  }
  if (!$_POST['password']) {
    $error .= "A password is required.";
  }
  if ($error != "") {
    $error = "there were errors:" . $error;
  } else {
    $link = mysqli_connect($host, $user, $password, $db);
    $query = "SELECT * FROM `login` WHERE email = '" . mysqli_real_escape_string($link, $_POST['email']) . "'";

    if ($query == "") {
      $error = "<script>alert('That email/password combination could not be found.')</script>";
    }

    $result = mysqli_query($link, $query);

    $row = mysqli_fetch_array($result);
    // print_r($row);
    if (isset($row)) {
      // echo "first";
      $Password = $_POST['password'];
      // echo $Password;
      if ($Password == $row['password']) {
        // echo "tis<br>";
        $_SESSION['id'] = $row['userId'];
        // print_r($_SESSION);

        if (isset($_POST['stayLoggedIn']) and $_POST['stayLoggedIn'] == '1') {

          setcookie("id", $row['userId'], time() + 60 * 60 * 24 * 365);
        }
        // echo "<br>logged in";
        if ($row['userType' == 1]) {
          header("Location: welcome.php");
        } else if ($row['userType' == 2]) {
          header("Location: professional.php");
        }
      } else {

        $error = "<script>alert('That email/password combination could not be found.')</script>";
      }
    } else {

      $error = "<script>alert('That email/password combination could not be found.')</script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
  <title>Login</title>

</head>

<body>
  <!--SECTION 1-->
  <section class="banner">
    <div class="options">
      <div class="container">
        <!--<div class="row">-->
        <!--  <div class="col-sm-4 opt-btn">-->
        <!--    <div style="background-color: #48c16a;" onclick="loginPage()">Talenten<i class="arrow-right fa fa-angle-right fa-lg"></i></div>-->
        <!--  </div>-->
        <!--  <div class="col-sm-4 opt-btn">-->
        <!--    <div style="background-color: #469ee2;" onclick="loginPage()">Professionals<i class="arrow-right fa fa-angle-right fa-lg"></i></div>-->
        <!--  </div>-->
        <!--  <div class="col-sm-4 opt-btn">-->
        <!--    <div style="background-color: #e59e2e;" onclick="loginPage()">Begeleiders<i class="arrow-right fa fa-angle-right fa-lg"></i></div>-->
        <!--  </div>-->
        <!--</div>-->
      </div>
    </div>
  </section>

  <!-- Login Form -->
  <div class="log container">
    <h3 style="margin-top:20px;color:#48c16a;">Scholen</h3>
    <hr style="background-color:#48c16a;margin-top:-15px;">
    <p style="font-family:Calibri;">No Data Found!</p>
  </div>
  <script>
    // document.getElementById('submit').click(function(event) {
    //   event.preventDefault(0);
    // });
  </script>

  <?php
  include('footer.html');
  ?>
  <!-- Bootsraps -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
</body>

</html>