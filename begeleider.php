<?php
include('connection.php');
include('header-min.php');
// if(!isset($_SESSION)) 
//     { 
//         session_start(); 
//     } 
if(!array_key_exists("id", $_SESSION)) {
  header("Location: login.php");
}
$userId = $_SESSION['id'];

$link = mysqli_connect($host, $user, $password, $db);

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

// For user data
$query = "SELECT * FROM `login` where userID = '" . $userId . "'";
$result = mysqli_query($link, $query);
$user = mysqli_fetch_array($result);

// For profile data
$query = "SELECT * FROM `contact` where userID = '" . $userId . "'";
$result = mysqli_query($link, $query);
$contact = mysqli_fetch_array($result);

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
  <link rel="stylesheet" href="begeleider.css">

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
        <div class="list-group main-option">
          <a class="list-group-item list-group-item-action active" onclick="changeView(this)">Professionals</a>
          <a class="list-group-item list-group-item-action" onclick="changeView(this)">Mijn Talenten</a>
          <a class="list-group-item list-group-item-action" onclick="changeView(this)">Mijn inbox</a>
          <a class="list-group-item list-group-item-action" onclick="changeView(this)">Mijn account</a>
          <a class="list-group-item list-group-item-action" onclick="changeView(this)">Mijn profiel</a>
          <a class="list-group-item list-group-item-action" onclick="changeView(this)">Downloads</a>
          <a class="list-group-item list-group-item-action" onclick="changeView(this)">Vraag & antwoord</a>
        </div>
      </div>
      <div class="col-md-8">
        <div class="profile-description">
          <div class="row ml-1 w-100">
            <div class="col-sm-5 text-center"><img class="dp-profile" src="dp.jpg"></div>
            <div class="col-sm-7">
              <div class="account-details">
                <!-- <h2 class="profile-name"><?php echo $profileData['firstName'] . ' ' . $profileData['lastName'] ?></h2>
                <h4 class="profile-address"><?php echo $contact['address'] ?></h4><br>
                <p class="profile-email"><a href=""><?php echo $user['email'] ?></a></p> -->
                <h2 class="profile-name">Joost Appleman</h2>
                <h4 class="profile-address">A. van Leeuwenhoekweg 2411 AN</h4><br>
                <p class="profile-email"><a href="">supervisor2@nmoprojecten.nl</a></p>
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
        <h4 class="">Mijn profiel</h4>
      </div>
      <div class="personal-info-box">
        <h4>Persoonsgegevens</h4>
        <form method="POST">
          <div class="form-group row">
            <label for="firstName" class="col-sm-5 col-form-label">Voorletters</label>
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
      </div>

      <div class="personal-info-box">
        <h4>Contactgegevens</h4>
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
      </div>

      <div class="personal-info-box">
        <h4>School</h4>
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
              <p id="subline">Deze code wordt gebruikt voor verificatiedoeleinden. Neem contact op met uw beheerder als deze code bij u (nog) niet bekend is.</p>
            </div>
          </div>
      </div>
      <button type="submit" name="submit" id="submit">profiel updaten</button>
  </section>


  <section for="mijn talenten" class="main-option-view" id="mijn-talenten">
    <div class="personal-info container">
      <div class="profile-heading">
        <h4 class="head">professionals</h4>
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

  <!--SECTION 3-->
  <section for="mijn Matches" class="main-option-view" id="mijn-matches">
    <div class="personal-info container">
      <div class="container">
        <div class="row">
          <div class="col-sm">
            <div class="profile-heading">
              <h4 class="head">Mijn talenten</h4>
            </div>
          </div>
          <div class="col-sm">
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="voornaam," aria-label="Search"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">s</button>
            </form>
          </div>
          <div class="col-sm">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Status</a>
                <a class="dropdown-item" href="#">Bezet</a>
                <a class="dropdown-item" href="#">Inactief</a>
              </div>
            </div>
          </div>
          <div class="col-sm">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">klas</a>
                <a class="dropdown-item" href="#">klas 1</a>
                <a class="dropdown-item" href="#">klas 2</a>
                <a class="dropdown-item" href="#">klas 3</a>
                <a class="dropdown-item" href="#">klas 4</a>
              </div>
            </div>
          </div>
          <div class="col-sm">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">schooljaar</a>
                <a class="dropdown-item" href="#">2022/2023</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Large modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">=</button>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
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
              <h4>Astrid den Beentjes (18 jaar)</h4>
              <div class="school"><strong>school:</strong>Hogeschool Amsterdam</div>
              <div class="opleiding"><strong>opleiding:</strong>Vmbo</div>
              <div class="niveau"><strong>niveau:</strong>vmbo kader</div>
              <div class="link"><strong>loopt stage bij:</strong>stage kopplan</div>
              <button type="submit" name="submit" id="btn-submit">Stageoverzicht</button>
            </div>
            <div class="col">
    
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
              <h4>Monique Jansen (17 jaar)</h4>
              <div class="school"><strong>school:</strong>Hogeschool Amsterdam</div>
              <div class="opleiding"><strong>opleiding:</strong>Vmbo</div>
              <div class="niveau"><strong>niveau:</strong>vmbo kader</div>
              <div class="link"><strong>loopt stage bij:</strong>stage kopplan</div>
              <button type="submit" name="submit" id="btn-submit">Stageoverzicht</button>
            </div>
            <div class="col">
              
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
              <h4>wilma pieterse (17 jaar)</h4>
              <div class="school"><strong>school:</strong>Hogeschool Amsterdam</div>
              <div class="opleiding"><strong>opleiding:</strong>Vmbo</div>
              <div class="niveau"><strong>niveau:</strong>vmbo kader</div>
              <div class="link"><strong>loopt stage bij:</strong>stage kopplan</div>
              <button type="submit" name="submit" id="btn-submit">Stageoverzicht</button>
            </div>
            <div class="col">
              
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
              <h4>Tom pieterse (18 jaar)</h4>
              <div class="school"><strong>school:</strong>Hogeschool Amsterdam</div>
              <div class="opleiding"><strong>opleiding:</strong>Vmbo</div>
              <div class="niveau"><strong>niveau:</strong>vmbo kader</div>
              <div class="link"><strong>loopt stage bij:</strong>stage kopplan</div>
              <button type="submit" name="submit" id="btn-submit">Stageoverzicht</button>
            </div>
            <div class="col">
              
            </div>
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
            <td><a href="login-bege.php">New Media Online</a></td>
            <td>Astrid den Beentjes</td>
            <td>Verzoek Astrid den Beentjes betreffende New Media ...</td>
            <td>07 december 2021</td>
          </tr>
          <tr class="sec-col">
            <th class="vth" scope="row">
              <div class="form-check">
                <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
              </div>
            </th>
            <td><a href="login-bege.php">New Media Online</a></td>
            <td>Astrid den Beentjes</td>
            <td>Contactverzoek Astrid den Beentjes</td>
            <td>07 december 2021</td>
          </tr>
          <tr class="sec-col">
            <th class="vth" scope="row">
              <div class="form-check">
                <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
              </div>
            </th>
            <td><a href="login-bege.php">New Media Online</a></td>
            <td>New Media Online</td>
            <td>Verzoek Astrid den Beentjes betreffende New Media ...</td>
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
          <a id="url" href="">handleiding_sectorwerkstuk_gl_klas_4.pdf (335 KB)
            <i></i>
          </a>
        </div>
      </div>
      <div class="download">
        <h4>Handleiding voor Professionals</h4>
        <div>= stagebegeleiders</div>
        <div class="download-link">
          <a id="url" href="">pmt_handleiding_professionals.pdf (274 KB)
            <i></i>
          </a>
        </div>
      </div>
      <div class="download">
        <h4>Werkboek Blokstage BBL-KBL-GL</h4>
        <div>Leerjaar 3: verantwoording van het Talent</div>
        <div class="download-link">
          <a id="url" href="">werkboek_blokstage_bbl_kbl_gl_klas_3.pdf (282 KB)
            <i></i>
          </a>
        </div>
      </div>
      <div class="download">
        <h4>Werkboek Lintstage BBL-KBL</h4>
        <div>Leerjaar 4: verantwoording van het Talent</div>
        <div class="download-link">
          <a id="url" href="">werkboek_lintstage_bbl_kbl.pdf (296 KB)
            <i></i>
          </a>
        </div>
      </div>
      <div class="download">
        <h4>Wet- en regelgeving</h4>
        <div>Belangrijke informatie</div>
        <div class="download-link">
          <a id="url" href="">wet_en_regelgeving_stage_vmbo.pdf (509 KB)
            <i></i>
          </a>
        </div>
      </div>

    </div>
  </section>


  <section id="mijn-account" class="main-option-view">
    <div class="personal-info container">
      <div class="profile-heading">
        <h4 class="head">Wachtwoord wijzigen</h4>
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
              <h4>Wachtwoord wijzigen</h4>
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
      <h5>Accompanist</h5>
      <div class="text">
        <p id="text">In deze categorie zijn geen vragen gevonden</p>
      </div>
      <a class="backbtn" href="index.php">back</a>
    </div>
  </section>

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

  <!-- Bootsraps -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
  <script src="./welcome.js"></script>

</body>

</html>