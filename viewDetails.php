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

    <!--Lightbox CSS-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css"
    />
    <!--end of lightbox css-->

    <!--Font Awesome-->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"
      rel="stylesheet"
    />
    <!--End of Font Awesome-->

    <!--Google Fonts-->
    <link
      href="https://fonts.googleapis.com/css?family=Abhaya+Libre|Hammersmith+One|Khand|Passion+One&display=swap"
      rel="stylesheet"
    />
    <!--End of Google fonts-->

    <!--Link CSS for Bootstrap-->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <!--End of CSS link-->

    <!--LOCAL CSS LINK-->
    <link rel="stylesheet" href="stylesheet2.css" />
    <!--END OF CSS-->

    <!--Jquery script-->
    <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"
    ></script>
    <!--End of Jquery script-->

    <!--lightbox script-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
    <!--End of Jquery script-->

    <!--lightbox script-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js.map"></script>
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
            <a class="nav-link"
              href="watchlist.php?propID=<?php echo '1' ?>"
              >
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

    <!--Property Display from database-->

    <div class="container-fluid padding" style="padding-top: 30px;">
      <div class="row text-center padding">
        <div class="col-lg-6">
          <?php
        $propID = $_GET['propID'];
        $query = "SELECT * FROM city JOIN properties ON city.location_id = properties.location_id WHERE property_id='$propID'";
        $result = mysqli_query($link, $query);
        while ($row = mysqli_fetch_array($result)) {
        ?>
          <h1><?php echo $row['name']; ?></h1>
          <h3><?php echo $row['location']; ?></h3>
          <h5><?php echo $row['address']; ?></h5>
          <p style="font-size: 20px">
            <?php echo $row['description']; ?>
            <br />
            <br />
            <i class="fas fa-bed"></i>
            Bedrooms:
            <?php echo $row['bedroom']; ?>
            <i class="fas fa-bath"></i>
            Bathrooms:
            <?php echo $row['bathroom']; ?>
            <i class="fas fa-shower"></i>
            Ensuites:
            <?php echo $row['ensuite']; ?>
            <i class="fas fa-car"></i>
            Vehicle space:
            <?php echo $row['garage']; ?>
          </p>
          <br />
        </div>
        <div class="col-lg-6">
          <a
            data-toggle="lightbox"
            data-title="<?php echo $row['name']; ?>"
            data-max-width="800"
            href="property-images/<?php echo $row['property_image']; ?>"
          >
            <div>
              <img
                class="img-fluid"
                src="property-images/<?php echo $row['property_image']; ?>"
                width="800"
                alt="Property"
              />
            </div>
          </a>
          <br />
          <button 
          type="button" 
          class="btn btn-primary btn-lg btn-block"
          onclick="window.location.href='watchlist.php?propID=<?php echo $row['property_id'];?>'"
         >
          Add to Watchlist</button>
          <?php
        }
        ?>
            <!--Gallery of the property-->
    <div class="container-fluid padding" style="padding-top: 30px; padding-bottom: 20px;">
      <div class="row text-center padding">
        <?php
          $query = "SELECT * FROM property_gallery WHERE galleryID_a ='$propID'";
          $result = mysqli_query($link, $query);
          while ($row = mysqli_fetch_array($result)) {
          ?>
        <div class="col-lg-2 col-sm-2 col-md-2">
        <a
            data-toggle="lightbox"
            data-title="<?php echo $row['caption']; ?>"
            data-max-width="900"
            data-gallery="gallery"
            href="property-images/<?php echo $row['gallery_image']; ?>"
          >
              <img
                class="img-fluid"
                src="property-images/<?php echo $row['gallery_image']; ?>"
                width="1920"
                alt="Property"
              />
          </a>
        </div> 
        <?php }
          ?> 
      </div>
    <div>  
    <!--End of gallery-->
        </div>
      </div>
    </div>
    <!--End of the 2 coloumns-->
  </body>

    <!--lightbox script-->
    <script>
    $(document).on("click", '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox();
    });
    </script>
    <!--end of lightbox script-->
    <!--End of Porperty Display from database-->
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
