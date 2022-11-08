<?php
ob_start();
include('header-min.php');
include('connection.php');
if (isset($_SESSION) && array_key_exists("id", $_SESSION)) {
    $userId = $_SESSION['id'];

    $link = mysqli_connect($host, $user, $password, $db);

    // For login data
    $query = "SELECT * FROM `login` where userID = '" . $userId . "'";
    $result = mysqli_query($link, $query);
    $user = mysqli_fetch_array($result);

    if ($user['userType'] == 1) {
        header('Location: welcome.php');
    } else if ($user['userType'] == 2) {
        header('Location: professional.php');
    } else if ($user['userType'] == 3) {
        header('Location: index.php');
    }
}

if (array_key_exists("submit", $_POST)) {
    $msg = "this is some message for the email";
    mail("shoaib.m54321@gmail.com", "forgot password", $msg);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="welcome.css">
    <link rel="stylesheet" href="forgot-pass.css">
    <title>Document</title>
</head>

<body>

    <!--SECTION 1-->
    <section class="banner">
        <div class="options">
            <div class="container">
            </div>
        </div>
    </section>

    <section class="forgot">

    </section>

    <section class="main container mt-4 mb-3" id="mijn-profiel" for="Mijn profiel">
        <div class="personal-info">
            <div class="profile-heading">
                <h4 class="">Forgot your password</h4>
            </div>
            <p class="subline">Use the form below to request a new password. This will overwrite your current password. You will receive the new password at the e-mail address that is known to us.</p>

            <div class="personal-info-box">
                <h3>request a password</h3>
                <form method="POST" id="forgotPasswordForm" action="#">
                    <div class="form-group row">
                        <label for="email" class="col-sm-5 col-form-label">Email Address</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" name="email" value="" id="email" placeholder="">
                        </div>
                    </div>

            </div>
            <input type="submit" class="btn btn-primary forgot-password-button" name="reset" id="reset" value="cancel" />
            <input type="submit" class="btn btn-primary forgot-password-button" name="submit" id="submit" value="password requests" />
        </div>
        </form>
    </section>


    <script>
        function resetForm() {
            $('#forgotPasswordForm').trigger("reset");
        }
    </script>

</body>

</html>

<?php

include('footer.html');

?>