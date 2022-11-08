<?php
include('connection.php');
include('header-min.php');
// session_start();
// print_r($_SESSION);
// print_r($_COOKIE);
if(!isset($_SESSION) || !array_key_exists("id", $_SESSION)) {
  header("Location: login.php");
  // echo "no session";
}
$userId = $_SESSION['id'];

$link = mysqli_connect($host, $user, $password, $db);

// For profile data
$query = "SELECT * FROM `profile` where userID = '" . $userId . "'";
$result = mysqli_query($link, $query);
$profileData = mysqli_fetch_array($result);

if(array_key_exists("submit", $_POST)) {
  $query = "INSERT INTO `profile`(`firstName`, `infixes`, `lastName`, `gender`, `dateOfBirth`, `userId`) VALUES ('".mysqli_real_escape_string($link,$_POST['firstName'])."','".mysqli_real_escape_string($link,$_POST['infixes'])."','".mysqli_real_escape_string($link,$_POST['lastName'])."','".mysqli_real_escape_string($link,$_POST['gender'])."','".mysqli_real_escape_string($link,$_POST['dateOfBirth'])."','".$userId."')";
  echo $query;
  if(mysqli_query($link, $query)){
    echo "Data Submitted";
  }else{
    echo "Error";
  }
}

// For login data
$query = "SELECT * FROM `login` where userID = '" . $userId . "'";
$result = mysqli_query($link, $query);
$user = mysqli_fetch_array($result);

// For contact data
$query = "SELECT * FROM `contact` where userID = '" . $userId . "'";
$result = mysqli_query($link, $query);
$contact = mysqli_fetch_array($result);


if(array_key_exists("submit", $_POST)) {
  $query = "INSERT INTO `contact`(`address`, `houseNumber`, `zipcode`, `city`, `province`, `phone`, `userId`) VALUES ('".mysqli_real_escape_string($link,$_POST['address'])."','".mysqli_real_escape_string($link,$_POST['houseNumber'])."','".mysqli_real_escape_string($link,$_POST['zipcode'])."','".mysqli_real_escape_string($link,$_POST['city'])."','".mysqli_real_escape_string($link,$_POST['province'])."','".mysqli_real_escape_string($link,$_POST['phone'])."','".$userId."')";
  echo $query;
  if(mysqli_query($link, $query)){
    echo "Data Submitted";
  }else{
    echo "Error";
  }
}

//for school
$query = "SELECT * FROM `school` where userID = '" . $userId . "'";
$result = mysqli_query($link, $query);
$school = mysqli_fetch_array($result);

if(array_key_exists("submit", $_POST)) {
  $query = "INSERT INTO `school`(`schoolName`, `schoolCode`, `education`, `attainment`, `class`, `accompanist`, `userID`) VALUES ('".mysqli_real_escape_string($link,$_POST['schoolName'])."','".mysqli_real_escape_string($link,$_POST['schoolCode'])."','".mysqli_real_escape_string($link,$_POST['education'])."','".mysqli_real_escape_string($link,$_POST['attainment'])."','".mysqli_real_escape_string($link,$_POST['class'])."','".mysqli_real_escape_string($link,$_POST['accompanist'])."','".$userId."')";
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

  <title>itclix.nl</title>
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

  </div> -->

  <!-- <div class="container-fluid nav-section">
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

  <!-- section for profile details -->
  <!-- <div class="heading"><h3>Talent</h3></div> -->
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
          <a class="list-group-item list-group-item-action" onclick="changeView(this)">Mijn stages</a>
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
        <div class="error404">
          <div class="d-flex justify-content-center align-items-center h-100">
            <h2>404 - Resource not found</h2>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- section main -->
  <section class="main container mt-4 main-option-view" id="mijn-profiel" for="Mijn profiel">
    <div class="personal-info">
      <div class="profile-heading">
        <h4 class="">Mijn profiel</h4>
      </div>
      <div class="personal-info-box">
        <h3>Persoonsgegevens</h3>
        <form method="POST">
          <div class="form-group row">
            <label for="firstName" class="col-sm-5 col-form-label">Voornaam</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" value="<?php echo $profileData['firstName'] ?>" name="firstName" id="firstName" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="infixes" class="col-sm-5 col-form-label">Tussenvoegsels</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" value="<?php echo $profileData['infixes'] ?>" name="infixes" id="infixes" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="lastName" class="col-sm-5 col-form-label">Achternaam</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" value="<?php echo $profileData['lastName'] ?>" name="lastName" id="lastName" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-5 col-form-label">Geslacht</label>
            <div class="col-sm-7">
              <select id="gender" class="form-control">
                <option selected>Kiezen...</option>
                <option>Man</option>
                <option>Vrouw</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="dob" class="col-sm-5 col-form-label">Geboortedatum</label>
            <div class="col-sm-7">
              <input type="date" class="form-control" value="<?php echo $profileData['dateOfBirth'] ?>" name="dateOfBirth" id="dob" />
            </div>
          </div>
        <!-- </form> -->
      </div>

      <div class="personal-info-box">
        <h3>Contactgegevens</h3>
        <!-- <form method="POST"> -->
          <div class="form-group row">
            <label for="address" class="col-sm-5 col-form-label">Adres & huisnummer</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" value="<?php echo $contact['address'] ?> " name="address" id="address" placeholder="">
            </div>
            <label for="houseNumber" class="col-sm-5 col-form-label"></label>
            <div class="col-sm-7">
              <input type="text" class="form-control" value="<?php echo $contact['houseNumber'] ?> " name="houseNumber" id="houseNumber" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="zipcode city" class="col-sm-5 col-form-label">Postcode & plaats</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="zipcode" id="zipcode" value="<?php echo $contact['zipcode'] ?> " placeholder="">
              <input type="text" class="form-control" name="city" value="<?php echo $contact['city'] ?> " id="city" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-5 col-form-label">Provincie</label>
            <div class="col-sm-7">
              <select id="province" class="form-control">
                <option></option>
                <option>Kiezen</option>
                <option>South Holland</option>
                <option>Zealand</option>
                <option>Limburg</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-5 col-form-label">Telefoon</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="phone" value="<?php echo $contact['phone'] ?>" id="phone" placeholder="">
            </div>
          </div>
        <!-- </form> -->
      </div>

      <div class="personal-info-box">
        <h3>School</h3>
        <!-- <form method="POST"> -->
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-5 col-form-label">Schoolnaam</label>
            <div class="col-sm-7">
              <select id="schoolName" class="form-control">
                <option selected>Kiezen...</option>
                <option>Alphen College</option>
                <option>Apps School</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="schoolCode" class="col-sm-5 col-form-label">Schoolcode</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="schoolCode" value="<?php echo $school['schoolCode'] ?>" id="schoolCode" placeholder="">
            </div>
            <label for="inputPassword3" class="col-sm-5 col-form-label"></label>
            <div class="col-sm-7">
              <p id="subline">This code is used for verification purposes. Contact your supervisor if you do not (yet) know this code.</p>
            </div>

          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-5 col-form-label">Opleiding</label>
            <div class="col-sm-7">
              <select id="education" class="form-control">
                <option selected>Kiezen...</option>
                <option>vmbo</option>
                <option>Havo</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-5 col-form-label">Opleidingsniveau</label>
            <div class="col-sm-7">
              <select id="attainment" class="form-control">
                <option selected>Kiezen...</option>
                <option>Vmbo basis</option>
                <option>vmbo kader</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-5 col-form-label">Klas</label>
            <div class="col-sm-7">
              <select id="class" class="form-control">
                <option selected>Kiezen...</option>
                <option>klas 1</option>
                <option>klas 4</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-5 col-form-label">Begeleider</label>
            <div class="col-sm-7">
              <select id="accompanist" class="form-control">
                <option selected>Kiezen...</option>
                <option>Appleman, Joost</option>
              </select>
            </div>
          </div>
        <!-- </form> -->
      </div>

      <div class="personal-info-box">
        <h3>Stage</h3>
        <div class="sub-stage">Leerdomeinen</div>
        <p class="info">Selecteer hier maximaal 3 leerdomeinen waarin u geïnteresseerd bent. Dubbelklik op een leerdomein of selecteer een leerdomein en gebruik de pijltoets om deze toe te voegen.</p>
        <div class="container">
          <div class="row">
            <div class="col-md-5">
              <div class="list-group domains-available">
                <a class="list-group-item list-group-item-action" onclick="swapDomain(this)">Ambacht, laboratorium en</a>
                <a class="list-group-item list-group-item-action" onclick="swapDomain(this)">Bouw en infra</a>
                <a class="list-group-item list-group-item-action" onclick="swapDomain(this)">afbouw, hout en onderhoud</a>
                <a class="list-group-item list-group-item-action" onclick="swapDomain(this)">Economie en administratie</a>
                <a class="list-group-item list-group-item-action" onclick="swapDomain(this)">Handel en ondernemerschap</a>
                <a class="list-group-item list-group-item-action" onclick="swapDomain(this)">Horeca en bakkerij</a>
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

        <div class="sub-stage">Stage</div>
        <p class="info-main">Selecteer hier het type stage waar u op dit moment naar op zoek bent. Selecteer daaronder de periode waarin u deze stage wilt gaan lopen.</p>
        <p class="info">Selecteer hier één of meerdere stageperiodes.</p>
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
                  <a href="#" class="list-group-item list-group-item-action">blockstage</a>
                  <a href="#" class="list-group-item list-group-item-action">lintstage</a>
                  <a href="#" class="list-group-item list-group-item-action">basis/kader</a>
                  <a href="#" class="list-group-item list-group-item-action">theoretische leerweg</a>
                </div>
              </div>
              <div class="col-sm" id="icon-mid"></div>
              <div class="col-sm">
                One of three columns
              </div>    -->
          </div>
        </div>

        <p class="info">Selecteer hier één of meerdere stageperiodes.</p>
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
                <!-- <a class="list-group-item list-group-item-action" onclick="swapDomain(this)">Horeca en bakkerij</a> -->
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="personal-info-box">
        <h3>Vaardigheden</h3>
        <div class="sub-stage">Mijn sterke punten</div>
        <p class="info">Wat vindt u goed aan uzelf? Of waar bent u goed in? Selecteer hier maximaal 5 punten die het beste bij u passen. Dubbelklik op een punt of selecteer een punt en gebruik de pijltoets om deze toe te voegen.</p>
        <div class="container">
          <div class="row">
            <div class="col-md-5">
              <div class="list-group strengths-available">
                <a class="list-group-item list-group-item-action" onclick="swapStrength(this)">betrokken</a>
                <a class="list-group-item list-group-item-action" onclick="swapStrength(this)">behulpzaam</a>
                <a class="list-group-item list-group-item-action" onclick="swapStrength(this)">bescheiden</a>
                <a class="list-group-item list-group-item-action" onclick="swapStrength(this)">creatief</a>
              </div>
            </div>
            <div class="col-md-1" id="icon-mid"></div>
            <div class="col-md-5">
              <div class="list-group strengths-selected">
                <!-- <a class="list-group-item list-group-item-action" onclick="swapDomain(this)">Horeca en bakkerij</a> -->
              </div>
              <!-- <div clasiss="col-sm">
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

          <div class="sub-stage">Talenkennis</div>
          <p class="info">Selecteer hier alle talen welke u mondeling en/of schriftelijk beheerst. Dubbelklik op een taal of selecteer een taal en gebruik de pijltoets om deze toe te voegen.</p>
          <div class="">
            <div class="row">
              <div class="col-md-5">
                <div class="list-group language-skills-available">
                  <a class="list-group-item list-group-item-action" onclick="swapLanguageSkills(this)">blockstage</a>
                  <a class="list-group-item list-group-item-action" onclick="swapLanguageSkills(this)">lintstage</a>
                  <a class="list-group-item list-group-item-action" onclick="swapLanguageSkills(this)">basis/kader</a>
                  <a class="list-group-item list-group-item-action" onclick="swapLanguageSkills(this)">theoretische leerweg</a>
                </div>
              </div>
              <div class="col-md-1" id="icon-mid"></div>
              <div class="col-md-5">
                <div class="list-group language-skills-selected">
                  <!-- <a class="list-group-item list-group-item-action" onclick="swapDomain(this)">Horeca en bakkerij</a> -->
                </div>
                <!-- <div class="col-sm">
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
              </div>    -->
              </div>
            </div>

            <div class="sub-stage">Rijbewijs</div>
            <p class="info">Beschikt u over één of meerdere rijbewijzen? Selecteer ze dan hieronder. Dubbelklik op een rijbewijs of selecteer een rijbewijs en gebruik de pijltoets om deze toe te voegen.</p>
            <div class="">
              <div class="row">
                <div class="col-md-5">
                  <div class="list-group license-available">
                    <a class="list-group-item list-group-item-action" onclick="swapLicense(this)">Rijbewijis A</a>
                    <a class="list-group-item list-group-item-action" onclick="swapLicense(this)">Rijbewijis AM</a>
                    <a class="list-group-item list-group-item-action" onclick="swapLicense(this)">Rijbewijis B</a>
                    <a class="list-group-item list-group-item-action" onclick="swapLicense(this)">Rijbewijis BE</a>
                  </div>
                </div>
                <div class="col-md-1" id="icon-mid"></div>
                <div class="col-md-5">
                  <div class="list-group license-selected">
                    <!-- <a class="list-group-item list-group-item-action" onclick="swapDomain(this)">Horeca en bakkerij</a> -->
                  </div>
                  <!-- <div class="col-sm">
                <div class="list-group">
                  <a href="#" class="list-group-item list-group-item-action">Rijbewijis A</a>
                  <a href="#" class="list-group-item list-group-item-action">Rijbewijis AM</a>
                  <a href="#" class="list-group-item list-group-item-action">Rijbewijis B</a>
                  <a href="#" class="list-group-item list-group-item-action">Rijbewijis BE</a>
                </div>
              </div>
              <div class="col-sm" id="icon-mid"></div>
              <div class="col-sm">
                One of three columns
              </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="personal-info-box">
        <h3>Hobby & Vrije tijd</h3>
        <div class="sub-stage">Hobby's</div>
        <p class="info">Geef hier op welke hobby's u heebt. Staat uw hobby er niet bij? Selecteer dan 'Overige'. Dubbelklik op een hobby of selecteer een hobby en gebruik de pijltoets om deze toe te voegen.</p>
        <div class="container">
          <div class="row">
            <div class="col-md-5">
              <div class="list-group hobbies-available">
                <a class="list-group-item list-group-item-action" onclick="swapHobbies(this)">Lezen</a>
                <a class="list-group-item list-group-item-action" onclick="swapHobbies(this)">Koken</a>
                <a class="list-group-item list-group-item-action" onclick="swapHobbies(this)">Films</a>
                <a class="list-group-item list-group-item-action" onclick="swapHobbies(this)">Gamen</a>
              </div>
            </div>
            <div class="col-md-1" id="icon-mid"></div>
            <div class="col-md-5">
              <div class="list-group hobbies-selected">
                <!-- <a class="list-group-item list-group-item-action" onclick="swapDomain(this)">Horeca en bakkerij</a> -->
              </div>
              <!-- <div class="col-sm">
              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">Lezen</a>
                <a href="#" class="list-group-item list-group-item-action">Koken</a>
                <a href="#" class="list-group-item list-group-item-action">Films</a>
                <a href="#" class="list-group-item list-group-item-action">Gamen</a>
              </div>
            </div>
            <div class="col-sm" id="icon-mid"></div>
            <div class="col-sm">
              One of three columns
            </div> -->
            </div>
          </div>

          <div class="sub-stage">Sporten</div>
          <p class="info">Geef hier op welke sport(en) u beoefent. Staat uw sport er niet bij? Selecteer dan 'Overige'. Dubbelklik op een sport of selecteer een sport en gebruik de pijltoets om deze toe te voegen.</p>
          <div class="">
            <div class="row">
              <div class="col-md-5">
                <div class="list-group sports-available">
                  <a class="list-group-item list-group-item-action" onclick="swapSports(this)">Hockey</a>
                  <a class="list-group-item list-group-item-action" onclick="swapSports(this)">Tennis</a>
                  <a class="list-group-item list-group-item-action" onclick="swapSports(this)">Fitness</a>
                  <a class="list-group-item list-group-item-action" onclick="swapSports(this)">Basketbal</a>
                </div>
              </div>
              <div class="col-md-1" id="icon-mid"></div>
              <div class="col-md-5">
                <div class="list-group sports-selected">
                  <!-- <a class="list-group-item list-group-item-action" onclick="swapDomain(this)">Horeca en bakkerij</a> -->
                </div>
                <!-- <div class="col-sm">
              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">Hockey</a>
                <a href="#" class="list-group-item list-group-item-action">Tennis</a>
                <a href="#" class="list-group-item list-group-item-action">Fitness</a>
                <a href="#" class="list-group-item list-group-item-action">Basketbal</a>
              </div>
            </div>
            <div class="col-sm" id="icon-mid"></div>
            <div class="col-sm">
              One of three columns
            </div> -->
              </div>
            </div>
          </div>
        </div>
  </section>

  <!--SECTION 3-->
  <section id="mijn-matches" class="main-option-view" for="mijn matches">
    <div class="personal-info">
      <div class="container">
        <div class="row">
          <div class="col-sm">
            <div class="profile-heading">
              <h4 class="">Mijn matches</h4>
            </div>
          </div>
          <div class="col-sm">
            <!-- <form class="form-inline my-2 my-lg-0"> -->
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <!-- </form> -->
          </div>
          <div class="col-sm">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                dropdown</button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <button class="dropdown-item" type="button">Afbouw, hout en onderhoud</button>
                <button class="dropdown-item" type="button">Ambacht, laboratorium en gezondheidstechniek</button>
                <button class="dropdown-item" type="button">Bouw en infra</button>
                <button class="dropdown-item" type="button">Economie en administratie</button>
                <button class="dropdown-item" type="button">Handel en ondernemerschap</button>
                <button class="dropdown-item" type="button">Horeca en bakkerij</button>
              </div>
            </div>
          </div>
          <div class="col-sm">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                dropdown</button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <button class="dropdown-item" type="button">blokstage</button>
                <button class="dropdown-item" type="button">lintstage</button>
                <button class="dropdown-item" type="button">basis/kader</button>
              </div>
            </div>
          </div>
        </div>
        <div class="text">
          <p id="text">Er zijn helaas geen professionals gevonden die aan uw profiel voldoen</p>
        </div>
      </div>
    </div>
  </section>


  <section for="mijn stages" class="main-option-view" id="mijn-stages">
    <div class="personal-info container">
      <div class="profile-heading">
        <h4 class="">Mijn Stages </h4>
      </div>
      <div class="intern-card">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="intern-profile">
                <img class="img" src="intern-img.jpg">
              </div>
            </div>
            <div class="col-6">
              <h2>Internship at New Media Online</h2>
            </div>
            <div class="col">
              <!-- <form class="form-inline my-2 my-lg-0"> -->
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <!-- </form> -->
              <button class="btn-search" type="submit">Search</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section id="mijn-inbox" class="main-option-view" for="mijn inbox">
    <div class="personal-info container">
      <div class="profile-heading">
        <h4 class="">Mijn inbox</h4>
      </div>
      <div class="text">
        <p id="text">Er zijn geen berichten gevonden.</p>
      </div>
    </div>
  </section>


  <section id="downloads" class="main-option-view" for="downloads">
    <div class="personal-info container">
      <div class="profile-heading">
        <h4 class="">Downloads</h4>
      </div>
      <div class="download">
        <h4>Beoordelingsformulieren</h4>
        <div>In te vullen door het Talent en de Professional, waarna het met elkaar wordt overlegd.</div>
        <div class="download-link-tal">
          <a id="url" href="">beoordelingsformulieren_sinds_2016_2017.pdf (98 KB)
          </a>
        </div>
      </div>
      <div class="download">
        <h4>Handleiding Sectorwerkstuk GL klas 4</h4>
        <div>Leerjaar 4</div>
        <div class="download-link-tal">
          <a id="url" href="">handleiding_sectorwerkstuk_gl_klas_4.pdf (335 KB)
          </a>
        </div>
      </div>
      <div class="download">
        <h4>Handleiding voor Professionals</h4>
        <div>Voor de stagebegeleider</div>
        <div class="download-link-tal">
          <a id="url" href="">pmt_handleiding_professionals.pdf (274 KB)
          </a>
        </div>
      </div>
      <div class="download">
        <h4>Handleiding voor Talenten</h4>
        <div>= leerlingen</div>
        <div class="download-link-tal">
          <a id="url" href="">pmt_handleiding_talenten.pdf (336 KB)
          </a>
        </div>
      </div>
      <div class="download">
        <h4>Werkboek Blokstage BBL-KBL-GL</h4>
        <div>Leerjaar 3</div>
        <div class="download-link-tal">
          <a id="url" href="">werkboek_blokstage_bbl_kbl_gl_klas_3.pdf (282 KB)
          </a>
        </div>
      </div>
      <div class="download">
        <h4>Werkboek Lintstage BBL-KBL</h4>
        <div>Leerjaar 4</div>
        <div class="download-link-tal">
          <a id="url" href="">werkboek_lintstage_bbl_kbl.pdf (296 KB)
          </a>
        </div>
      </div>
      <div class="download">
        <h4>Wet- en regelgeving</h4>
        <div>Belangrijke informatie</div>
        <div class="download-link-tal">
          <a id="url" href="">wet_en_regelgeving_stage_vmbo.pdf (509 KB)
          </a>
        </div>
      </div>
    </div>
  </section>



  <section id="vraag-antwoord" class="main-option-view">
    <div class="personal-info container">
      <div class="profile-heading">
        <h4 class="">Vraag & Antwoord</h4>
      </div>
      <h5>Talent</h5>
      <div class="text">
        <p id="text">In deze categorie zijn geen vragen gevonden</p>
      </div>
      <a class="backbtn" href="index.php">back</a>
    </div>
  </section>

  <section id="mijn-account" class="main-option-view">
    <div class="personal-info container">
      <div class="profile-heading">
        <h4 class="">Change Password</h4>
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
              <!-- <form method="POST"> -->
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
              <!-- </form> -->
            </div>
          </div>
          <div class="tab-pane fade" id="change-email" role="tabpanel" aria-labelledby="change-email-tab">
            <div class="my-account-tab">
              <h4> e-mailadres wijzigen</h4>
              <!-- <form method="POST"> -->
                <div class="form-group row">
                  <label for="newEmail" class="col-sm-5 col-form-label">e-mailadres</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" value="" name="newEmail" id="newEmail" placeholder="">
                  </div>
                </div>
              <!-- </form> -->
            </div>
          </div>
          <div class="tab-pane fade" id="change-photo" role="tabpanel" aria-labelledby="change-photo-tab">
            <div class="my-account-tab">
              <h4> Pasfoto wijzigen</h4>
              <!-- <form method="POST"> -->
                <div class="form-group row">
                  <label for="photo" class="col-sm-5 col-form-label">Pasfoto</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" value="" name="photo" id="photo" placeholder="">
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
    <div class="container ">

      <div class="">


      </div>
    </div>
  </section>


  <!-- <footer class="footer container-fluid">
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
  </footer> -->
  <?php 
  include('footer.html');
  ?>

  <!-- Bootsraps -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
  <script src="./welcome.js"></script>
</body>

</html>


<?php

// Update dropdowns with javascript
echo "<script>
var provinces = document.getElementById('province');
var children = provinces.children;
for (var i = 0; i < children.length; i++) {
    if(children[i].innerHtml == '" . $contact['province'] . "'){
      children[i].selected = true;

}
}

var genders = document.getElementById('gender');
children = genders.children;
for (var i = 0; i < children.length; i++) {
    if(children[i].value == '" . $profileData['gender'] . "'){
      console.log(children[i]);
      children[i].selected = true;
}}

var SchoolName = document.getElementById('schoolName');
children = SchoolName.children;
for (var i = 0; i < children.length; i++) {
    if(children[i].value == '" . $school['schoolName'] . "'){
      children[i].selected = true;

}}

var educations = document.getElementById('education');
children = educations.children;
for (var i = 0; i < children.length; i++) {
    if(children[i].value == '" . $school['education'] . "'){
      children[i].selected = true;
}}

var attainments = document.getElementById('attainment');
children = attainments.children;
for (var i = 0; i < children.length; i++) {
    if(children[i].value == '" . $school['attainment'] . "'){
      children[i].selected = true;
}}


var classes = document.getElementById('class');
children = classes.children;
for (var i = 0; i < children.length; i++) {
    if(children[i].value == '" . $school['class'] . "'){
      children[i].selected = true;
}
}

var accompanists = document.getElementById('accompanist');
children = accompanists.children;
for (var i = 0; i < children.length; i++) {
    if(children[i].value == '" . $school['accompanist'] . "'){
      children[i].selected = true;
}
}
</script>";


?>