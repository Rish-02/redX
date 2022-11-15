<?php
ob_start();
include('connection.php');
include('header-min.php');
// if(!isset($_SESSION)) 
//     { 
//         session_start(); 
//     } 
if (!isset($_SESSION) || !array_key_exists("id", $_SESSION)) {
  header("Location: login-prof.php");
} else {
  $userId = $_SESSION['id'];

  $link = mysqli_connect($host, $user, $password, $db);

  // For login data
  $query = "SELECT * FROM `login` where userID = '" . $userId . "'";
  $result = mysqli_query($link, $query);
  $user = mysqli_fetch_array($result);

  if ($user['userType'] != 2) {
    if ($user['userType'] == 1) {
      header('Location: welcome.php');
    }
    if ($user['userType'] == 3) {
      header('Location: begeleider.php');
    }
  }

  // For company data
  $query = "SELECT * FROM `company` where userID = '" . $userId . "'";
  $result = mysqli_query($link, $query);
  $company = mysqli_fetch_array($result);

  // For contact data
  $query = "SELECT * FROM `pContact` where userID = '" . $userId . "'";
  $result = mysqli_query($link, $query);
  $pContact = mysqli_fetch_array($result);

  // For profile data
  $query = "SELECT * FROM `profile` where userID = '" . $userId . "'";
  $result = mysqli_query($link, $query);
  $profileData = mysqli_fetch_array($result);

  // For profile data
  $query = "SELECT * FROM `contact` where userID = '" . $userId . "'";
  $result = mysqli_query($link, $query);
  $contact = mysqli_fetch_array($result);



  if (isset($_POST) && array_key_exists("submitProfile", $_POST)) {
    // echo "update";
    $query = "UPDATE `company` SET `companyName`='" . mysqli_real_escape_string($link, $_POST['companyName']) . "',`address`='" . mysqli_real_escape_string($link, $_POST['address']) . "',`addNumber`='[value-3]',`zipcode`='" . mysqli_real_escape_string($link, $_POST['zipcode']) . "',`city`='" . mysqli_real_escape_string($link, $_POST['city']) . "',`province`='" . mysqli_real_escape_string($link, $_POST['province']) . "',`phone`='" . mysqli_real_escape_string($link, $_POST['phone']) . "',`website`='" . mysqli_real_escape_string($link, $_POST['website']) . "',`userId`= " . $userId . " WHERE userId = " . $userId . "";
    // echo $query;
    if (mysqli_query($link, $query)) {
      $query = "UPDATE `pcontact` SET `initials`='" . mysqli_real_escape_string($link, $_POST['initials']) . "',`infixes`='" . mysqli_real_escape_string($link, $_POST['infixes']) . "',`lastName`='" . mysqli_real_escape_string($link, $_POST['lastName']) . "',`sex`='" . mysqli_real_escape_string($link, $_POST['sex']) . "',`phone`='" . mysqli_real_escape_string($link, $_POST['phone']) . "',`accessibility`='" . mysqli_real_escape_string($link, $_POST['accessibility']) . "',`function`='" . mysqli_real_escape_string($link, $_POST['function']) . "',`userId`= " . $userId . " WHERE userId = " . $userId . "";
      if (mysqli_query($link, $query)) {
        header('Location: professional.php');
      } else {
        echo "Error";
      }
      // header('Location: welcome.php');
    } else {
      echo "Error";
    }
  }
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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="main.css">

  <title>mijn-profiel</title>
</head>

<body>
  <!-- <div class="top">
    <div class="row w-100">
      <div class="col-6"></div>
      <div class="col-6 top-col">
        <img src="itclixlogo.svg" class="logo">
        <div class="w-100">
          <form method="Post" action="#">
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
        <!-- <div class="row">
           <div class="col-sm-4 opt-btn">
             <div style="background-color: #48c16a;" onclick="loginPage()">Talenten<i class="arrow-right fa fa-angle-right fa-lg"></i></div>
           </div>
           <div class="col-sm-4 opt-btn">
             <div style="background-color: #469ee2;" onclick="loginPage()">Professionals<i class="arrow-right fa fa-angle-right fa-lg"></i></div>
           </div>
           <div class="col-sm-4 opt-btn">
             <div style="background-color: #e59e2e;" onclick="loginPage()">Begeleiders<i class="arrow-right fa fa-angle-right fa-lg"></i></div>
           </div>
         </div> -->
      </div>
    </div>
  </section>


  <section class="profile container">
    <div class="row">
      <div class="col-md-4">
        <!-- <table class="table table-bordered">
            <tbody>
              <tr><td>Mijn Matches</td></tr>
              <tr><td>Mijn stages</td></tr>
              <tr><td>Mijn inbox</td></tr>
              <tr><td>Mijn profiel</td></tr>
              <tr><td>Mijn account</td></tr>
              <tr><td>Downloads</td></tr>  
              <tr><td>Vraag & antwoord</td></tr>
            </tbody>
          </table> -->
        <div class="list-group main-option">
          <a class="list-group-item list-group-item-action active" onclick="changeView(this)">Mijn matches</a>
          <a class="list-group-item list-group-item-action" onclick="changeView(this)">Mijn Talenten</a>
          <a class="list-group-item list-group-item-action" onclick="changeView(this)">Mijn inbox</a>
          <a class="list-group-item list-group-item-action" onclick="changeView(this)">Mijn profiel</a>
          <a class="list-group-item list-group-item-action" onclick="changeView(this)">Mijn account</a>
          <a class="list-group-item list-group-item-action" onclick="changeView(this)">Downloads</a>
          <a class="list-group-item list-group-item-action" onclick="changeView(this)">Vraag & antwoord</a>
        </div>
      </div>
      <div class="col-md-8">
        <div class="profile-description">
          <div class="row ml-1 w-100">
            <div class="col-sm-5 text-center">This will be<br> profile image</div>
            <div class="col-sm-7">
              <div class="account-details">
                <h2 class="profile-name"><?php echo $profileData['firstName'] . ' ' . $profileData['lastName'] ?></h2>
                <h4 class="profile-address"><?php echo $contact['address'] ?></h4><br>
                <p class="profile-email"><a href=""><?php echo $user['email'] ?></a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- section main -->
  <section class="main container mt-4 main-option-view" id="mijn-profiel" for="Mijn profiel">
    <div class="personal-info">
      <div class="profile-heading">
        <h4 class="head">Mijn profiel</h4>
      </div>
      <div class="personal-info-box">
        <h3>Bedrijfsgegevens</h3>
        <form method="POST">
          <div class="form-group row">
            <label for="companyName" class="col-sm-5 col-form-label">Bedrijfsnaam</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" value="<?php echo $company['companyName'] ?>" name="companyName" id="companyName" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="address number" class="col-sm-5 col-form-label">Adres & nummer</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" value="<?php echo $company['address'] ?>" name="address" id="address" placeholder="">
              <input type="text" class="form-control" name="addNumber" value="<?php echo $company['addNumber'] ?>" id="addNumber" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="zipcode city" class="col-sm-5 col-form-label">Postcode & plaats</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="zipcode" value="<?php echo $company['zipcode'] ?>" id="zipcode" placeholder="">
              <input type="text" class="form-control" name="city" value="<?php echo $company['city'] ?>" id="city" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="province" class="col-sm-5 col-form-label">Provincie</label>
            <div class="col-sm-7">
              <select id="province" class="form-control" name="province">
                <option selected>Kiezen...</option>
                <option>Drenthe</option>
                <option>Zuid-Holland</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="phone" class="col-sm-5 col-form-label">Telelfoon</label>
            <div class="col-sm-7">
              <input type="tel" class="form-control" value="<?php echo $company['phone'] ?>" name="phone" id="phone" />
            </div>
          </div>

          <div class="form-group row">
            <label for="website" class="col-sm-5 col-form-label">Website(inc.http://)</label>
            <div class="col-sm-7">
              <input type="url" class="form-control" value="<?php echo $company['website'] ?>" name="website" id="website" />
            </div>
          </div>

      </div>

      <div class="personal-info-box">
        <h3>Contactpersoon</h3>

        <div class="form-group row">
          <label for="initials" class="col-sm-5 col-form-label">Voorletters</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" value="<?php echo $pContact['initials'] ?>" name="initials" id="initials" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label for="infixes" class="col-sm-5 col-form-label">Tussenvoegsels</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" value="<?php echo $pContact['infixes'] ?>" name="infixes" id="infixes" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label for="lastName" class="col-sm-5 col-form-label">Achternaam</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" value="<?php echo $pContact['lastName'] ?>" name="lastName" id="lastName" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label for="sex" class="col-sm-5 col-form-label">Geslacht</label>
          <div class="col-sm-7">
            <select id="sex" class="form-control" name="sex">
              <option selected>Kiezen...</option>
              <option>Man</option>
              <option>Vrouw</option>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="phone" class="col-sm-5 col-form-label">Telelfoon</label>
          <div class="col-sm-7">
            <input type="tel" class="form-control" value="<?php echo $pContact['phone'] ?>" name="phone" id="phone" />
          </div>
        </div>

        <div class="form-group row">
          <label for="accessibility" class="col-sm-5 col-form-label">Bereikbaarheid</label>
          <div class="col-sm-7">
            <select id="accessibility" class="form-control" name="accessibility">
              <option selected>Kiezen...</option>
              <option>hele dag</option>
              <option>in de middag</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="function" class="col-sm-5 col-form-label">Functie</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" value="<?php echo $pContact['function'] ?>" name="function" id="function" placeholder="">
          </div>
        </div>

      </div>

      <div class="personal-info-box">
        <h3>Leerdomeinen</h3>
        <p class="info">Selecteer hier de domeinen/branches waarin uw bedrijf werkzaam is. Dubbelklik op een domein of selecteer een domein en gebruik de pijltjes om deze toe te voegen..</p>
        <div class="container">
          <div class="row">
            <div class="col-md-5">
              <div class="list-group domains-available">
                <a class="list-group-item list-group-item-action" onclick="swapDomain(this)">Ambacht, laboratorium en</a>
                <a class="list-group-item list-group-item-action" onclick="swapDomain(this)">Bouw en infra</a>
                <a class="list-group-item list-group-item-action" onclick="swapDomain(this)">afbouw, hout en onderhoud</a>
                <a class="list-group-item list-group-item-action" onclick="swapDomain(this)">Economie en administratie</a>
                <a class="list-group-item list-group-item-action" onclick="swapDomain(this)">Handel en ondernemerschap</a>
                <a class="list-group-item list-group-item-action" onclick="swapDomain(this)">Zorg en welzijn</a>
              </div>
            </div>
            <div class="col-md-1" id="icon-mid"></div>
            <div class="col-md-5">
              <div class="list-group domains-selected">
                <!-- <a class="list-group-item list-group-item-action" onclick="swapDomain(this)">Horeca en bakkerij</a> -->
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="personal-info-box">
        <h3>Stage</h3>
        <div class="sub-stage">Type stage</div>
        <p class="info">Selecteer hier de types stages die u kunt aanbieden. Dubbelklik op een type of selecteer een type en gebruik de pijltjes om deze toe te voegen.</p>
        <div class="container">
          <div class="row">
            <div class="col-md-5">
              <div class="list-group internships-available">
                <a class="list-group-item list-group-item-action" onclick="swapInternships(this)">blockstage</a>
                <a class="list-group-item list-group-item-action" onclick="swapInternships(this)">lintstage</a>
                <a class="list-group-item list-group-item-action" onclick="swapInternships(this)">basis/kader</a>
                <a class="list-group-item list-group-item-action" onclick="swapInternships(this)">theoretische leerweg</a>
              </div>
            </div>
            <div class="col-md-1" id="icon-mid"></div>
            <div class="col-md-5">
              <div class="list-group internships-selected">
                <!-- <a class="list-group-item list-group-item-action" onclick="swapDomain(this)">Horeca en bakkerij</a> -->
              </div>
            </div>
            <!-- <div class="col-sm">
                <div class="list-group">
                  <a href="#" class="list-group-item list-group-item-action">behulpzaam</a>
                  <a href="#" class="list-group-item list-group-item-action">betrokken</a>
                  <a href="#" class="list-group-item list-group-item-action">bescheiden</a>
                  <a href="#" class="list-group-item list-group-item-action">creatief</a>
                </div>
              </div>
              <div class="col-sm" id="icon-mid"></div>
              <div class="col-sm">
                One of three columns
              </div> -->
          </div>
        </div>

        <div class="sub-stage">Stageperiode</div>
        <p class="info">Selecteer hier alle talen welke u mondeling en/of schriftelijk beheerst. Dubbelklik op een taal of selecteer een taal en gebruik de pijltoets om deze toe te voegen.</p>
        <div class="container">
          <div class="row">
            <div class="col-md-5">
              <div class="list-group periods-available">
                <a class="list-group-item list-group-item-action" onclick="swapPeriods(this)">november t/m maart</a>
                <a class="list-group-item list-group-item-action" onclick="swapPeriods(this)">september t/m november</a>
                <a class="list-group-item list-group-item-action" onclick="swapPeriods(this)">april</a>
              </div>
            </div>
            <div class="col-md-1" id="icon-mid"></div>
            <div class="col-md-5">
              <div class="list-group periods-selected">
                <!--<a class="list-group-item list-group-item-action" onclick="swapDomain(this)">Horeca en bakkerij</a>-->
              </div>
            </div>
            <!--<div class="col-sm">
                <div class="list-group">
                  <a href="#" class="list-group-item list-group-item-action">blockstage</a>
                  <a href="#" class="list-group-item list-group-item-action">lintstage</a>
                  <a href="#" class="list-group-item list-group-item-action">basis/kader</a>
                  <a href="#" class="list-group-item list-group-item-action">theoretische leerweg</a>
                </div>
              </div>
              <div class="col-sm" id="icon-mid"></div>
              <div class="col-sm">
                One of three columns
              </div>-->
          </div>
        </div>

        <div class="sub-stage">Plaatsen</div>
        <p class="info">Geef hier het totaal aantal plaatsen aan welke u beschikbaar heeft. Dit zijn dus het totaal aantal plaatsen ongeacht stageperiode.</p>

        <select id="inputState" class="form-control">
          <option selected>Kiezen...</option>
          <option>Man</option>
          <option>Vrouw</option>
        </select>
      </div>




      <!-- <div class="personal-info-box">
          <h3>Persoonsgegevens</h3>
          <form method="POST">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-5 col-form-label">Voornaam</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="email" id="inputEmail3" placeholder="">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-5 col-form-label">Tussenvoegsels</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="sometext" id="inputPassword3" placeholder="">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-5 col-form-label">Achternaam</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="sometext" id="inputPassword3" placeholder="">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-5 col-form-label">Geslacht</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="sometext" id="inputPassword3" placeholder="">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-5 col-form-label">Geboortedatum</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="sometext" id="inputPassword3" placeholder="">
              </div>
            </div>
          </form>
        </div> -->
    </div>
    <input type="submit" class="btn btn-primary" name="submitProfile" value="profiel updaten" />
    </form>
  </section>

  <!--SECTION 3-->
  <section for="mijn Matches" class="main-option-view" id="mijn-matches">
    <div class="personal-info container">
      <div class="profile-heading">
        <h4 class="head">Mijn Matches </h4>
      </div>
      <div class="intern-card">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="intern-profile">
                <img class="img-dp" src="dp.jpg">
              </div>
            </div>
            <div class="col-6">
              <h4>Monique(17 jaar)</h4>
            </div>
            <div class="col">
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              </form>
              <button class="btn-search" type="submit">Search</button>
            </div>
          </div>
        </div>
      </div>
      <div class="intern-card">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="intern-profile">
                <img class="img-dp" src="dp.jpg">
              </div>
            </div>
            <div class="col-6">
              <h4>Astrid (18 jaar)</h4>
            </div>
            <div class="col">
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              </form>
              <button class="btn-search" type="submit">Search</button>
            </div>
          </div>
        </div>
      </div>
      <div class="intern-card">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="intern-profile">
                <img class="img-dp" src="dp.jpg">
              </div>
            </div>
            <div class="col-6">
              <h4>Tom (18 jaar)</h4>
            </div>
            <div class="col">
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              </form>
              <button class="btn-search" type="submit">Search</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section for="mijn talenten" class="main-option-view" id="mijn-talenten">
    <div class="personal-info container">
      <div class="profile-heading">
        <h4 class="head">Mijn talenten</h4>
      </div>
      <div class="intern-card">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="intern-profile">
                <img class="img-dp" src="dp.jpg">
              </div>
            </div>
            <div class="col-6">
              <h3>Wilma (17 jaar)</h3>
            </div>
            <div class="col">
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              </form>
              <button class="btn-search" type="submit">Search</button>
            </div>
          </div>
        </div>
      </div>
  </section>


  <section for="mijn inbox" class="main-option-view" id="mijn-inbox">
    <div class="container">
      <div class="profile-heading">
        <h4 class="head">Mijn Inbox</h4>
      </div>
      <table class="table table-bordered table-dark">
        <thead>
          <tr>
            <th scope="col">
              <div class="form-check">
                <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
              </div>
            </th>
            <th scope="col">afzender</th>
            <th scope="col">betreffende</th>
            <th scope="col">onderwerp</th>
            <th scope="col">datum</th>
          </tr>
        </thead>
        <tbody>
          <tr class="sec-col">
            <th class="vth" scope="row">
              <div class="form-check">
                <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
              </div>
            </th>
            <td>joost appleman</td>
            <td>Astrid den Beentjes</td>
            <td>Contactverzoek Astrid den Beentjes</td>
            <td>07 december 2021</td>
          </tr>
          <tr class="third-col">
            <th class="vth" scope="row">
            </th>
            <td colspan="2">
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              </form>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <section id="downloads" class="main-option-view" for="downloads">
    <div class="personal-info container">
      <div class="profile-heading">
        <h4 class="head">Downloads</h4>
      </div>
      <div class="download">
        <h4>Handleiding Sectorwerkstuk GL klas 4</h4>
        <div>leerjaar 4</div>
        <div class="download-link">
          <a id="url" href=""><i class="fa-regular fa-file-pdf"></i>handleiding_sectorwerkstuk_gl_klas_4.pdf (335 KB)
          </a>
        </div>
      </div>
      <div class="download">
        <h4>Handleiding voor Professionals</h4>
        <div>= stagebegeleiders</div>
        <div class="download-link">
          <a id="url" href=""><i class="fa-regular fa-file-pdf"></i>pmt_handleiding_professionals.pdf (274 KB)
          </a>
        </div>
      </div>
      <div class="download">
        <h4>Werkboek Blokstage BBL-KBL-GL</h4>
        <div>Leerjaar 3: verantwoording van het Talent</div>
        <div class="download-link">
          <a id="url" href=""><i class="fa-regular fa-file-pdf"></i>werkboek_blokstage_bbl_kbl_gl_klas_3.pdf (282 KB)
          </a>
        </div>
      </div>
      <div class="download">
        <h4>Werkboek Lintstage BBL-KBL</h4>
        <div>Leerjaar 4: verantwoording van het Talent</div>
        <div class="download-link">
          <a id="url" href=""><i class="fa-regular fa-file-pdf"></i>werkboek_lintstage_bbl_kbl.pdf (296 KB)
          </a>
        </div>
      </div>
      <div class="download">
        <h4>Wet- en regelgeving</h4>
        <div>Belangrijke informatie</div>
        <div class="download-link">
          <a id="url" href=""><i class="fa-regular fa-file-pdf"></i>wet_en_regelgeving_stage_vmbo.pdf (509 KB)
          </a>
        </div>
      </div>

    </div>
  </section>


  <section id="mijn-account" class="main-option-view">
    <div class="personal-info container">
      <div class="profile-heading">
        <h4 class="head">Accountinstellingen wijzigen</h4>
      </div>
      <div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#change-pass" type="button" role="tab" aria-controls="change-pass" aria-selected="true">wachtwoord wijzigen</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#change-email" type="button" role="tab" aria-controls="change-email" aria-selected="false">e-mailadres wijzigen</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#change-photo" type="button" role="tab" aria-controls="change-photo" aria-selected="false">Pasfoto wijzigen</button>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="change-pass" role="tabpanel" aria-labelledby="change-pass-tab">
            <div class="my-account-tab">
              <h4>wachtwoord wijzigen</h4>
              <form method="POST">
                <div class="form-group row">
                  <label for="currentPass" class="col-sm-5 col-form-label">huidig wachtwoord</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" value="" name="currentPass" id="currentPass" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="newPass" class="col-sm-5 col-form-label">nieuw wachtwoord</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" value="" name="newPass" id="newPass" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="repeatPass" class="col-sm-5 col-form-label">herhaal wachtwoord</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" value="" name="repeatPass" id="repeatPass" placeholder="">
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="tab-pane fade" id="change-email" role="tabpanel" aria-labelledby="change-email-tab">
            <div class="my-account-tab">
              <h4> e-mailadres wijzigen</h4>
              <form method="POST">
                <div class="form-group row">
                  <label for="newEmail" class="col-sm-5 col-form-label">e-mailadres</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" value="" name="newEmail" id="newEmail" placeholder="">
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="tab-pane fade" id="change-photo" role="tabpanel" aria-labelledby="change-photo-tab">
            <div class="my-account-tab">
              <h4> Pasfoto wijzigen</h4>
              <form method="POST">
                <div class="form-group row">
                  <label for="photo" class="col-sm-5 col-form-label">Pasfoto</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" value="" name="photo" id="photo" placeholder="">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container ">
      <div class="">
      </div>
    </div>
  </section>



  <section id="vraag-antwoord" class="main-option-view" for="vraag & antwoord">
    <div class="personal-info container">
      <div class="profile-heading">
        <h4 class="head">Vraag & Antwoord</h4>
      </div>
      <h5>Professional</h5>
      <div class="text">
        <p id="text">In deze categorie zijn geen vragen gevonden</p>
      </div>
      <a class="backbtn" href="index.php">back</a>
    </div>
  </section>



  <!-- Bootsraps -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
  <script src="./welcome.js"></script>

</body>

</html>
<?php
include('footer.html');
?>