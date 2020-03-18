<?php
  include "php/config.php";


  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Windhelm || Registration</title>

    <!--Font Awesome-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet" />
    <!--End of Font Awesome-->

    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Abhaya+Libre|Hammersmith+One|Khand|Passion+One&display=swap"
        rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro&display=swap" rel="stylesheet" />
    <!--End of Google fonts-->

    <!--Link CSS for Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <!--End of CSS link-->

    <!--LOCAL CSS LINK-->
    <link rel="stylesheet" href="stylesheet2.css" />
    <!--END OF CSS-->

    <!--Jquery script-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!--End of Jquery script-->

    <!--Ajax Script-->
    <script src="login_ajax.js"></script>
    <!--End of Ajax Script-->
</head>

<body>
    <!--Navbar-->
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-light">
        <a class="navbar-brand" href="#">
            <img src="images/admin_whiteLogo.png" alt="Navlogo" width="100" />
            Windhelm Real Estate
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <?php if (!isset($_SESSION['memberID'])) { // These options will appear from the conditions of logging in
            echo "
          <li class='nav-item'>
            <a class='nav-link' href='registration.html'>Register</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='login.html'>LogIn</a>
          </li>";
          } else {
            echo 
            "<li class='nav-item'>
              <a class='nav-link' href='php/logout.php'>Logout</a>
            </li>";
          }
          ?>
                <li class="nav-item">
                    <a class="nav-link" href="watchlist.php?propID=<?php echo '1' ?>">
                        Watchlist</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="shop.php">Properties</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
            </ul>
        </div>
    </nav>
    <!--End of Navbar-->

    <!--Parallax Background-->
    <div class="parallax">
        <div id="box" class="container text-center">
            <div class="container padding row text-center">
                <div class="col-12">
                    <h1 style="color:red; font-family: 'Source Serif Pro', serif;">Sorry, my dude.</h1>
                    <br />
                    <p style="color:red; font-size: 18px; font-family: 'Source Serif Pro', serif;">Some features are not
                        available for non-members.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--End of parallax background-->


    <!-- Footer -->
    <footer class="page-footer font-small text-white pt-4">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3">

                    <!-- Content -->
                    <h5 class="text-uppercase">Windhelm Real Estate</h5>
                    <p>There's always a home for you, here at Windhelm Real Estate, hallelujah.</p>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase">Social Media</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#">www.facebook.com/windhelmrealestate</a>
                        </li>
                        <li>
                            <a href="#">www.twitter.com/windhelmrealestate</a>
                        </li>
                        <li>
                            <a href="#">www.steampowered.com/windhelmrealestate</a>
                        </li>
                        <li>
                            <a href="https://www.biblegateway.com/">biblegateway.com/windhelmrealestate</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled" style="font: white;">
                        <li>
                            <a href="shop.php">Properties</a>
                        </li>
                        <li>
                            <a href="about.php">About us</a>
                        </li>
                        <?php if (!isset($_SESSION['memberID'])) { // These options will appear from the conditions of logging in
              echo "
            <li>
              <a href='registration.html'>Register</a>
            </li>
            <li>
              <a href='login.html'>LogIn</a>
            </li>";
            } else {
              echo 
              "<li>
                <a href='php/logout.php'>Logout</a>
              </li>";
            }
            ?>
                    </ul>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2018 Copyright:
            <a style="color: lightskyblue;" href="#"> WindhelmRealEstate.com</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->

    <!--Bootstrap 4 scripts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!--End 4 bootstrap script-->
</body>

</html>