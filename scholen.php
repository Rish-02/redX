<?php
ob_start();
include('header-min.php');
include('connection.php');
// session_start();

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
  <link rel="stylesheet" href="./scholen.css">
  <title>Login</title>

</head>

<body>
  <!--SECTION 1-->
  <section class="banner">
    <div class="options">
      <div class="container">
      </div>
    </div>
  </section>


  <section class="Scholen">
    <div class="personal-info">
      <div class="card">
        <div class="container">
          <h3></h3>

        </div>
      </div>
    </div>
  </section>
  <!-- Login Form -->
  <div class="log container mb-4">
    <h3 style="margin-top:20px;color:#48c16a;">Scholen</h3>
    <hr style="background-color:#48c16a;margin-top:-15px;">
    <div class="school-container">
      <div class="row">
        <div class="col-md-6 school-item">
          <div class="row flex-column h-100">
            <div id="" class="schoolTitle vcol-2">
              <h4 class="mb-0">Alphen College</h4> 
            </div>
            <div id="" class="schoolBody vcol-8">
              <div class="container pt-4">
                <div class="row mt-4">
                  <div class="col-sm-4">
                    <div class="square"></div>
                  </div>
                  <div class="col-sm-6">
                    <p class="sub address mb-1"><i class="fa-solid fa-location-dot"></i> test street

4

4325PM

Alphen aan den Rijn</p>
                    <p class="sub">https://www.pmt-test.nl/</p>                   
                  </div>
                </div>
              </div>
            </div>
            <div id="" class="schoolFooter vcol-2">
              <p><i class="fa-solid fa-phone"></i>
                <i class="fa-solid fa-envelope mail"></i>name@hotmail.com</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 school-item">
          <div class="row flex-column h-100">
            <div id="" class="schoolTitle vcol-2">
              <h4 class="mb-0">Alphen College</h4> 
            </div>
            <div id="" class="schoolBody vcol-8">
              <div class="container pt-4">
                <div class="row mt-4">
                  <div class="col-sm-4">
                    <div class="square"></div>
                  </div>
                  <div class="col-sm-6">
                    <p class="sub address mb-1"><i class="fa-solid fa-location-dot"></i> test street

4

4325PM

Alphen aan den Rijn</p>
                    <p class="sub">https://www.pmt-test.nl/</p>                   
                  </div>
                </div>
              </div>
            </div>
            <div id="" class="schoolFooter vcol-2">
              <p><i class="fa-solid fa-phone"></i>
                <i class="fa-solid fa-envelope mail"></i>name@hotmail.com</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 school-item">
          <div class="row flex-column h-100">
            <div id="" class="schoolTitle vcol-2">
              <h4 class="mb-0">Alphen College</h4> 
            </div>
            <div id="" class="schoolBody vcol-8">
              <div class="container pt-4">
                <div class="row mt-4">
                  <div class="col-sm-4">
                    <div class="square"></div>
                  </div>
                  <div class="col-sm-6">
                    <p class="sub address mb-1"><i class="fa-solid fa-location-dot"></i> test street

4

4325PM

Alphen aan den Rijn</p>
                    <p class="sub">https://www.pmt-test.nl/</p>                   
                  </div>
                </div>
              </div>
            </div>
            <div id="" class="schoolFooter vcol-2">
              <p><i class="fa-solid fa-phone"></i>
                <i class="fa-solid fa-envelope mail"></i>name@hotmail.com</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 school-item">
          <div class="row flex-column h-100">
            <div id="" class="schoolTitle vcol-2">
              <h4 class="mb-0">Alphen College</h4> 
            </div>
            <div id="" class="schoolBody vcol-8">
              <div class="container pt-4">
                <div class="row mt-4">
                  <div class="col-sm-4">
                    <div class="square"></div>
                  </div>
                  <div class="col-sm-6">
                    <p class="sub address mb-1"><i class="fa-solid fa-location-dot"></i> test street

4

4325PM

Alphen aan den Rijn</p>
                    <p class="sub">https://www.pmt-test.nl/</p>                   
                  </div>
                </div>
              </div>
            </div>
            <div id="" class="schoolFooter vcol-2">
              <p><i class="fa-solid fa-phone"></i>
                <i class="fa-solid fa-envelope mail"></i>name@hotmail.com</p>
            </div>
          </div>
        </div>
        
      </div>
    </div>
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