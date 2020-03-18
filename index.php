<?php
    include "php/config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Windhelm || Home</title>

    <!--Background.css-->
    <link rel="stylesheet" type="text/css" href="background.css" />
    <!--End of Background-->

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
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
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
    <!--Carousel-->
    <div id="carousel" class="carousel slide" data-ride="carousel" style="padding-bottom: 50px">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="images/carousel1.jpg" alt="First slide" />
                <div style=" font-family: 'Source Serif Pro', serif; top: 400px;"
                    class="carousel-caption align-items-center justify-content-center">
                    <?php
              if (isset($_SESSION['memberID'])) //Welcome message for user
              {
                echo "<h1>Welcome, " .$_SESSION['name']. "<h1>";
              } else
              {
                echo "<h1>Here at Windhelm Real Estate, there's always a home for you.</h1>";
              }

            ?>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/carousel2.jpg" alt="Second slide" />
                <div style=" font-family: 'Source Serif Pro', serif; top: 400px;"
                    class="carousel-caption align-items-center justify-content-center">
                    <h1>Every year, 1400 houses are sold. You can be one of them.</h1>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/carousel3.jpg" alt="Third slide" />
                <div style=" font-family: 'Source Serif Pro', serif; top: 400px;"
                    class="carousel-caption align-items-center justify-content-center">
                    <h1>Every 60 seconds, there's a house waiting for you every minute.</h1>
                </div>
            </div>
        </div>
    </div>
    <!--End of Carousel-->

    <!--Navbar-->
    <nav id="navbar" class="navbar fixed-top navbar-expand-lg navbar-dark">
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
                <li class="nav-item active">
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
                <li class="nav-item">
                    <a class="nav-link" href="shop.php">Properties</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
            </ul>
        </div>
    </nav>
    <!--End of Navbar-->

    <!--Card-->
    <div id="indexCards" class="container padding text-center"
        style="padding-bottom: 50px;font-family: 'Source Serif Pro', serif;">
        <div class="container row padding text-center">
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h1><i id="cardLogo" class="fas fa-users"></i></h1>
                        <h5 class="card-title">Register</h5>
                        <p class="card-text">Some features are only accessible for members. So become a member now!</p>
                        <a href="registration.html" class="btn btn-info">Registration</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h1><i id="cardLogo" class="far fa-id-card"></i></h1>
                        <h5 class="card-title">Contact Us</h5>
                        <p class="card-text">What about us? If you want more details or want to contact us; click the
                            button!</p>
                        <a href="about.php" class="btn btn-info">About Us</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h1><i id="cardLogo" class="fas fa-home"></i></h1>
                        <h5 class="card-title">Properties</h5>
                        <p class="card-text">Check our selection of properties. See if we have the perfect house for you
                        </p>
                        <a href="shop.php" class="btn btn-info">Properties</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end of cards-->

    <!--Columns-->
    <section style=" font-family: 'Source Serif Pro', serif;">
        <div class="container">
            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-xl-8 col-lg-7">
                    <img class="img-fluid mb-3 mb-lg-0" src="images/stock_apartment.jpg" alt="apratment">
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">
                        <h4>549 Cranford St. , Papanui, Christchurch</h4>
                        <p class="text-black-50 mb-0">There are some awesome houses that are longing for an owner. This
                            is one of them. With a beautiful kitchen, fit for any family either with children or not.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
                <div class="col-lg-6">
                    <img class="img-fluid" src="images/stock_apartment1.jpg" alt="">
                </div>
                <div class="col-lg-6">
                    <div class="bg-dark text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-left">
                                <div class="col-12 text-center">
                                    <h4 class="text-white">6 Grants rd, Wimbleton, Auckland</h4>
                                    <p class="mb-0 text-white">An awesome living room designed by the greatest interior
                                        designers of New Zealand. This house longs for an owner that can keep them as it
                                        is.</p>
                                </div>
                                <hr style="border: solid 2px purple;" class="d-none d-lg-block mb-0 ml-0">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center no-gutters" style="padding-bottom: 40px;">
                <div class="col-lg-6">
                    <img class="img-fluid" src="images/stock_apartment2.jpg" alt="">
                </div>
                <div class="col-lg-6 order-lg-first">
                    <div class="bg-dark text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-right">
                                <div class="col-12 text-center">
                                    <h4 class="text-white">17 JesusIs, King st. Christchurch</h4>
                                    <p class="mb-0 text-white">Room that is divine and power. You get a loan for this
                                        house but these debts will be payed because of the joy set before the cross.
                                    </p>
                                </div>
                                <hr style="border: solid 2px purple;" class="d-none d-lg-block mb-0 mr-0">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End of Columns-->


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

</body>
<!--Navbar script-->
<script>
$(window).scroll(function() {
    $('nav').toggleClass('scrolled', $(this).scrollTop() > 700);
});
</script>
<!--end of Navbar script-->
<!--bootstrap script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<!--End 4 bootstrap script-->

</html>