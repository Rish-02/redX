<?php
if (!isset($_SESSION)) {
  session_start();
}
// print_r($_SESSION);
// print_r($_POST);
if (isset($_SESSION)) {
  if (array_key_exists("id", $_SESSION)) {
    include('connection.php');
    $link = mysqli_connect($host, $user, $password, $db);
    // For profile data
    $query = "SELECT * FROM `profile` where userID = '" . $_SESSION['id'] . "'";
    $result = mysqli_query($link, $query);
    $profileData = mysqli_fetch_array($result);
  }
}
if (array_key_exists("logout", $_POST)) {
  session_unset();
  header('Location: index.php');
}

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="app.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

  <title>itclix.nl</title>
</head>

<body>
  <div class="top">
    <div class="row w-100">
      <div class="col-6"></div>
      <div class="col-6 top-col">
        <img src="itclixlogo.svg" class="logo" onclick="mainPage()">
        <div class="w-100">
          <?php
          if (isset($_SESSION)) {
            if (array_key_exists("id", $_SESSION)) {
              echo '<form method="Post" action="#">
                        <div class="form-row align-items-center">
                          <div class="col-sm-3 my-1">
                            <p class="h-100 mb-0">Goedemiddag, ' . $profileData['firstName'] . '</p>
                            
                          </div>
                          <div class="col-auto my-1">
                            <button type="submit" class="btn btn-primary-nav" name="logout" style="color: white;">uitloggen</button>
                          </div>
                        </div>
                    </div>
                  </form>';
            } else {
              echo '<form method="Post" action="#">
                        <div class="form-row align-items-center">
                          <div class="col-sm-3 my-1">
                            <label class="sr-only" for="inlineFormInputName">Email</label>
                            <input type="email" name="email" class="form-control" id="inlineFormInputName" placeholder="E-mailadres">
                          </div>
                          <div class="col-sm-3 my-1">
                            <label class="sr-only" for="inlineFormInputGroupUsername">Password</label>
                            <div class="input-group">
                              <input type="password" name="password" class="form-control" id="inlineFormInputGroupUsername" placeholder="Wachtwoord">
                            </div>
                          </div>
                          <div class="col-auto my-1">
                            <button type="submit" class="btn btn-primary-nav" name="submit" style="color: white;">Inloggen</button>
                          </div>
                        </div>
                    </div>
                  </form>';
            }
          } else {
            echo '<form method="Post" action="#">
                    <div class="form-row align-items-center">
                      <div class="col-sm-3 my-1">
                        <label class="sr-only" for="inlineFormInputName">Email</label>
                        <input type="email" name="email" class="form-control" id="inlineFormInputName" placeholder="E-mailadres">
                      </div>
                      <div class="col-sm-3 my-1">
                        <label class="sr-only" for="inlineFormInputGroupUsername">Password</label>
                        <div class="input-group">
                          <input type="password" name="password" class="form-control" id="inlineFormInputGroupUsername" placeholder="Wachtwoord">
                        </div>
                      </div>
                      <div class="col-auto my-1">
                        <button type="submit" class="btn btn-primary-nav" name="submit" style="color: white;">Inloggen</button>
                      </div>
                    </div>
                </div>
              </form>';
          }
          ?>


        </div>
      </div>

    </div>

    <div class="container-fluid nav-section">
      <div class="nav-container">
        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid h-100">
            <a class="navbar-brand" href="index.php" onclick="mainPage()"><img src="PMT.png"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse h-100" id="navbarNav">
              <ul class="navbar-nav h-100">
                <li class="nav-item header-nav-item">
                  <a class="nav-link" href="index.php">HOME</a>
                </li>
                <li class="nav-item header-nav-item">
                  <a class="nav-link" href="login-talent.php">TALENTEN
                  </a>
                </li>
                <li class="nav-item header-nav-item">
                  <a class="nav-link" href="login-prof.php">PROFESSIONALS</a>
                </li>
                <li class="nav-item header-nav-item">
                  <a class="nav-link" href="login-coach.php">COACHES</a>
                </li>
                <li class="nav-item header-nav-item">
                  <a class="nav-link" href="index.php">INLOGGEN</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>


    <!-- Bootsraps -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>