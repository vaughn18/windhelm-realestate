<?php
include "../php/config.php";

if (!isset($_SESSION['name'])) {
  header("Location: ../login.html");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Windhelm || Admin</title>

    <!--Animation css-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"
    />
    <!--End of  Animation css-->

    <!--Link CSS for Bootstrap-->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <!--End of CSS for Bootstrap link-->

    <!--LOCAL CSS LINK-->
    <link rel="stylesheet" href="../admin_stylesheet.css" />
    <!--END OF CSS-->

    <!--Jquery script-->
    <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"
    ></script>
    <!--End of Jquery script-->
  </head>
  <body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="adindex.php">Windhelm Real Estate</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#collapse"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="city/city.php">City</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="properties/property.php">Properties</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../php/logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
    <!--End of Navbar-->
    <div class="welcome" style="z-index: 9;">
      <!--LOGO-->
      <div id="logo" class="container" style="z-index: 10;">
        <div class="row">
          <div class="col-lg-4 col-sm-4 col-md-4"></div>
          <div class="col-lg-4 col-sm-4 col-md-4">
            <img
              src="../images/admin_logo.png"
              alt="Windhelm Logo"
              width="300"
            />
            <h1 class=" row text-center animated zoomIn">
              Welcome,
              <?php echo $_SESSION['name'] ?>
            </h1>
          </div>
          <div class="col-lg-4 col-sm-4 col-md-4"></div>
        </div>
      </div>
      <!--END OF LOGO-->
  </body>
      <!--Bootstrap 4 scripts-->
      <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <!--End 4 bootstrap script-->
</html>
