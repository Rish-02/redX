<?php
include('connection.php');
include('header-min.php');
// session_start();
// $userId = 2;
// $userId = $_SESSION['id'];

$link = mysqli_connect($host, $user, $password, $db);

// For profile data
// $query = "SELECT * FROM `gencontact` where userID = '" . $_SESSION['id'] . "'";
// $result = mysqli_query($link, $query);
// $gencontact = mysqli_fetch_array($result);

if(array_key_exists("submit", $_POST)) {
  $query = "INSERT INTO `gencontact`(`Cname`, `website`, `initials`, `infixes`, `lName`, `salutation`, `address`, `hno`, `zipcode`, `city`, `phone`, `mobile`, `email`, `userId`) VALUES ('".mysqli_real_escape_string($link,$_POST['Cname'])."','".mysqli_real_escape_string($link,$_POST['website'])."','".mysqli_real_escape_string($link,$_POST['initials'])."','".mysqli_real_escape_string($link,$_POST['infixes'])."','".mysqli_real_escape_string($link,$_POST['lName'])."','Mr.','".mysqli_real_escape_string($link,$_POST['address'])."','".mysqli_real_escape_string($link,$_POST['hno'])."','".mysqli_real_escape_string($link,$_POST['zipcode'])."','".mysqli_real_escape_string($link,$_POST['city'])."','".mysqli_real_escape_string($link,$_POST['phone'])."','".mysqli_real_escape_string($link,$_POST['mobile'])."','".mysqli_real_escape_string($link,$_POST['email'])."',0)";
  echo $query;
  if(mysqli_query($link, $query)){
    echo "Data Submitted";
  }else{
    echo "Error";
  }
}

?>



<!doctype html>`
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="welcome.css">
  <link rel="stylesheet" href="contact.css">

  <title>itclix.nl</title>
</head>

<body>
  <!-- <div class="top">
    <div class="row w-100">
      <div class="col-6"></div>
      <div class="col-6 top-col">
        <img src="itclixlogo.svg" class="logo">
        <div class="w-100">
          <form method="Post" action="">
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
                
              </div>
            </div>
        </div>
        </form>
      </div>
    </div>

  </div>

  <div class="container-fluid nav-section">
    <div class="nav-container">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="PMT.png"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">TALENTEN</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">PROFESSIONALS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">COACHES</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">INLOGGEN</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div> -->

  <!--SECTION 1-->
  <section class="banner">
    <div class="options">
      <div class="container">
      </div>
    </div>
  </section>

  <section class="main container mt-4 mb-3" id="mijn-profiel" for="Mijn profiel">
    <div class="personal-info">
      <div class="profile-heading">
        <h4 class="">Contact</h4>
      </div>

      <div class="personal-info-box">
        <h3>bedrijfsgegevens</h3>
        <form method="POST" id="contactForm">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-5 col-form-label">Bedrijfsnaam</label>
            <div class="col-sm-7">
            <input type="text" class="form-control" name="Cname" value="" id="Cname" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="website" class="col-sm-5 col-form-label">website</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="website" value="" id="website" placeholder="">
            </div>
          </div>
        
      </div>
      
      <div class="personal-info-box">
        <h3>Persoonsgegevens</h3>

          <div class="form-group row">
            <label for="initials" class="col-sm-5 col-form-label">Voorletters</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" value="" name="initials" id="initials" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="infixes" class="col-sm-5 col-form-label">Tussenvoegsels</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" value="" name="infixes" id="infixes" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="lName" class="col-sm-5 col-form-label">Achternaam</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" value="" name="lName" id="lName" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-5 col-form-label">Aanhef</label>
            <div class="col-sm-7">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">1</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">2</label>
            </div>
            </div>
          </div>

      </div>

      <div class="personal-info-box">
        <h3>Contactgegevens</h3>
          <div class="form-group row">
            <label for="address" class="col-sm-5 col-form-label">Adres & huisnummer</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" value="" name="address" id="address" placeholder="">
            </div>
            <label for="hno" class="col-sm-5 col-form-label"></label>
            <div class="col-sm-7">
              <input type="text" class="form-control" value="" name="hno" id="hno" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="zipcode city" class="col-sm-5 col-form-label">Postcode & woonplaats</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="zipcode" id="zipcode" value="" placeholder="">
              <input type="text" class="form-control" name="city" value="" id="city" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="phone" class="col-sm-5 col-form-label">Telefoon</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="phone" value="" id="phone" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="mobile" class="col-sm-5 col-form-label">Mobiel</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="mobile" value="" id="mobile" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-5 col-form-label">Emailadres</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="email" value="" id="email" placeholder="">
            </div>
          </div>

      </div>

      <div class="container">
      <input type="submit" class="btn btn-primary contactButton" name="submit" id="submit" value="formulier versturen"></button>
      <input type="submit" class="btn btn-primary contactButton" name="reset" id="reset" onclick="resetForm()" value="annuleren"></button>
      </div>
  </section>
  </form>


      
  <footer class="footer container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6">
          <h3 class="footer">Over ons</h3>
          <div class="content-footer">
            <p>Professional meets Talent (PMT) is een platform waar Professionals (mensen uit de beroepspraktijk) en Talenten (scholieren van het vmbo) elkaar kunnen ...lees verder</p>
            <a href="" class="facebook">Volg ons op Facebook</a>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <h3 class="footer">Links</h3>
          <ul class="links">
            <li><a href="">Home</a></li>
            <li><a href="">Talenten</a></li>
            <li><a href="">Professionals</a></li>
            <li><a href="">Coaches</a></li>
            <li><a href="">Inloggen</a></li>
            <li><a href="">Meest gestelde vragen</a></li>
            <li><a href="">Werkwijze</a></li>
            <li><a href="">Ervaringen</a></li>
            <li><a href="">Nieuws</a></li>
            <li><a href="">Downloads</a></li>
            <li><a href="">Scholen</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Informatie voor bedrijven (professionals)</a></li>
            <li><a href="">Informatie voor leerlingen (talenten)</a></li>
          </ul>

        </div>
      </div>
    </div>
  </footer>
<script>
  function resetForm()  {
    $('#contactForm').trigger("reset");
  }
</script>
  <!-- Bootsraps -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
  <script src="./welcome.js"></script>
</body>

</html>