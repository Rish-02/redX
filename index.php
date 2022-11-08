<?php
ob_start();
include('header-min.php');
$host = "localhost";
$user = "dealsome_test";
$password = "12345";
$db = "dealsome_test";

//mysqli_connect($host, $user, $password);
$error = "";
if (array_key_exists("submit", $_POST)) {
  $link = mysqli_connect($host, $user, $password);
  if (mysqli_connect_error()) {
    die("database connection error.");
  }

  if (!$_POST['email']) {
    $error .= "An email is required.";
  }
  if (!$_POST['password']) {
    $error .= "A password is required.";
  }
  if ($error != "") {
    $error = "there were errors:" . $error;
  } else {
    // echo "<script>alert('You Are Successfully LoggedIn')</script>";
    header('Location: ./welcome.html');
    die();
  }
}


//   function redirect($url) {
//     header('Location: '.$url);
//     die();
// }

// $mysql_select_db($redX);

// if($_Post(['email']) != null && ){
//   $email = $_POST['email'];
//   $password = $_POST['password'];

//   $sql = "select * from login WHERE email = '.$email' AND password = '.$password' limit 1";
//   $result= mysql_query($sql);
//   if(mysql_num_rows($result)==1){
//     echo "You Have Successfully Logged-in";
//     exit();
//   } else{
//     echo "You Have Entered Incorrect Email or Password";
//     exit ();
//   }
// }

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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

  <title>itclix.nl</title>
</head>

<body>
  <!--SECTION 1-->
  <section class="banner">
    <div class="options">
      <div class="container">
        <div class="row">
          <div class="col-sm-4 opt-btn">
            <div style="background-color: #48c16a;" onclick="loginPage()">Talenten<i class="arrow-right fa fa-angle-right fa-lg"></i></div>
          </div>
          <div class="col-sm-4 opt-btn">
            <div style="background-color: #469ee2;" onclick="loginPage()">Professionals<i class="arrow-right fa fa-angle-right fa-lg"></i></div>
          </div>
          <div class="col-sm-4 opt-btn">
            <div style="background-color: #e59e2e;" onclick="loginPage()">Begeleiders<i class="arrow-right fa fa-angle-right fa-lg"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--SECTION 2-->
  <section class="info">
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <h3>Informatie voor bedrijven (professionals)</h3>
          <p>Steeds meer bedrijven zien de noodzaak en voordelen van maatschappelijk verantwoord ondernemen (MVO). Dat betekent dat zij rekening houden met de effecten van hun bedrijfsvoering op mens, milieu en maatschappij. Professional meets Talent nodigt u uit om uw maatschappelijke betrokkenheid te tonen op het gebied van Mens. Bij sociaal verantwoord ondernemen staat de mens centraal: de leerling en u. Jongeren in onze samenleving hebben ervaringen en voorbeelden nodig om een goed beeld van de toe ...</p>
          <button class="btn btn-light info-btn">Lees Verder</button>
        </div>
        <div class="col-sm">
          <h3>Informatie voor leerlingen (talenten)</h3>
          <p>Deze website is het platform om een passende stage te vinden. Hoe beter jij je profiel invult, hoe groter de kans dat er een interessante professional aan jou wordt gelinkt. Voor vragen kun je altijd terecht bij je coach/mentor of bij de decaan/stagecoördinator van jouw school. Heel veel succes!</p>
          <button class="btn btn-light info-btn">Lees Verder</button>
        </div>
        <div class="col-sm">
          <h3>Deelnemende scholen</h3>
          <ul class="schools">
            <li>
              <a href=""><img src="https://itclix-waddinxveen.nl/common/apps/createthumb/?filename=/data/sites/web/itclix-west-alphennl/subsites/itclix-waddinxveen.nl//content/multimedia/images/scholen/logos/logo.ashram.college.jpg&action=resize&width=138&height=81" alt=""></a>
            </li>
            <li>
              <a href=""><img src="https://itclix-waddinxveen.nl/common/apps/createthumb/?filename=/data/sites/web/itclix-west-alphennl/subsites/itclix-waddinxveen.nl//content/multimedia/images/scholen/logos/logo.ashram.college.jpg&action=resize&width=138&height=81" alt=""></a>
            </li>
            <li>
              <a href=""><img src="https://itclix-waddinxveen.nl/common/apps/createthumb/?filename=/data/sites/web/itclix-west-alphennl/subsites/itclix-waddinxveen.nl//content/multimedia/images/scholen/logos/logo.ashram.college.jpg&action=resize&width=138&height=81" alt=""></a>
            </li>
            <li>
              <a href=""><img src="https://itclix-waddinxveen.nl/common/apps/createthumb/?filename=/data/sites/web/itclix-west-alphennl/subsites/itclix-waddinxveen.nl//content/multimedia/images/scholen/logos/logo.ashram.college.jpg&action=resize&width=138&height=81" alt=""></a>
            </li>
          </ul>
        </div>
      </div>
    </div>

  </section>

  <section class="container accordion-container">
    <div class="none">
      <h3>Deelnemende bedrijven</h3>
      <div class="about">
        <div class="row">
          <div class="col-sm-8" style="padding: 0">
            <div>
              <h3>Meest gestelde vragen</h3>
              <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Waarom moet ik een e-mailadres opgeven?
                      </button>
                    </h2>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                      Het e-mailadres is tevens uw inlognaam. Hiernaast gebruiken wij het e-mailadres slechts om uw mededelingen te versturen welke betrekking hebben op de werking van het systeem. Daarom is het ook belangrijk dat u een geldig e-mailadres opgeeft. Wij zullen uw e-mailadres tot slot nooit aan derden verstrekken.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Ik ben mijn wachtwoord vergeten wat nu?
                      </button>
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                      U kunt altijd een nieuw wachtwoord aanvragen via het wachtwoord formulier. Let hierbij op dat het huidige wachtwoord wordt overschreven. In uw mailbox (van het e-mailadres dat bij ons bekend is) ontvangt u dan een nieuw wachtwoord. Deze kunt u later eventueel weer veranderen in uw eigen account.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Wat doen jullie met de gegevens in het aanmeldformulier?
                      </button>
                    </h2>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                      Alle gegevens uit het aanmeldformulier gebruiken wij alleen voor de juiste werking van de website. Deze worden o.a. gebruikt om matches tot stand te laten komen tussen talent en professional.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Waar kan ik mezelf aanmelden?
                      </button>
                    </h2>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                      Voor iedere doelgroep is er een eigen aanmeldpagina:
                      <ul>
                        <li>talenten</li>
                        <li>Professionals</li>
                        <li>Begeleiders</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div>
              <h3>Nieuws</h3>
              <div class="news">
                <h5>09-07Groene Hart Leerpark ...</h5>
                <p>Lintstage klas 4 is van donderdag 6 september 2018 t/m donderdag 28 maart 2019. Dit kan worden verdeeld in twee periodes van 2 keer 12 weken.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button class="btn btn-light info-btn">Bekijk het archief</button>
    </div>
  </section>
  <?php
  include('footer.html');
  ?>
  <!-- Bootsrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>