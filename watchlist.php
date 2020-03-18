<?php
  include "php/config.php";

  if (!isset($_SESSION['name'])) {
    header("Location: unavailable.php");
  }

  $propID = $_GET['propID'];// gets property id from url
  $user_id = $_SESSION['memberID']; // Gets id for query from session

  if ($propID > '1') { // since there is no property number 1 
    $user = $_SESSION['name'];
    $user_id = $_SESSION['memberID'];

    $query = "SELECT * FROM watchlist WHERE property_id = '$propID'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) == 0) { // This will check so that you won't add the same property in the wishlist
    
//Storing data to the wishlist table
    $query = "INSERT INTO watchlist (user_id, property_id) VALUES ('$user_id', '$propID')";
    mysqli_query($link, $query); //execute INSERT sql
    }
  }

  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Windhelm || Registration</title>


    <!--Animation css-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"
    />
    <!--End of  Animation css-->

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

    <!--Ajax Script-->
    <script src="login_ajax.js"></script>
    <!--End of Ajax Script-->

    <!--Script notification to remove property from watchlist-->
    <script>
      function deleteProduct(property_id) {
        if (confirm("Are you sure you want to remove this property?")) {
          window.location.href = "php/deleteWatchlist.php?watchID=" + property_id;
        } // end of if
      } // end of function
    </script>
    <!--End of script remove-->
  </head>

  <body>
    <!--Navbar-->
    <nav id="navbar" class="navbar fixed-top navbar-expand-lg navbar-dark bg-light">
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
          <li class="nav-item active">
            <a class="nav-link"
              href="watchlist.php?propID=<?php echo '1' ?>"
              >
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
    <!--Title-->
    <div class="container padding text-center" style="padding-top: 30px;">
      <div class="container row padding">

        <div class="col-lg-12" style="padding-bottom: 30px; padding-top: 75px;">
        <h1>Watchlist of <?php echo $_SESSION['name']; ?></h1>
        </div>

        <div class="col-lg-12" style="padding-bottom: 30px;">
        <h5 class="animated tada"><?php
        $query = "SELECT * FROM watchlist JOIN users ON watchlist.user_id = users.user_id WHERE watchlist.user_id = '$user_id'";
        $result = mysqli_query($link, $query); // Gets watchlist off of the user that's logged in by session
        if (mysqli_num_rows($result) == 0){
          echo "There are no properties watchlisted at the moment";
        }
        
        ?></h5>
        </div>

      </div>
    </div>
    <!--End of Title-->

    <!--Property Display from database-->
    <div class="container padding text-center" style="padding-top: 30px;">
      <div class="container row padding">
          <?php
          $name = $_SESSION['name']; // Displays the properties the user has inside his/her watchlist
          $query = "SELECT * FROM users JOIN properties JOIN watchlist ON users.user_id = watchlist.user_id AND properties.property_id = watchlist.property_id WHERE f_name = '$name'";
          $result = mysqli_query($link, $query);
          while ($row = mysqli_fetch_array($result)) {
        ?>
        <div class="col-lg-4" style="padding-bottom: 30px;">
        <h3><?php echo $row['name']; ?></h3>
        <h7><?php echo $row['address']; ?></h7>
        <p>
            <i class="fas fa-bed"></i>
            <?php echo $row['bedroom']; ?>
            <i class="fas fa-bath"></i>
            <?php echo $row['bathroom']; ?>
            <i class="fas fa-shower"></i>
            <?php echo $row['ensuite']; ?>
            <i class="fas fa-car"></i>
            <?php echo $row['garage']; ?>
          </p>
        </div>

        <div class="col-lg-4" style="padding-bottom: 30px;">
        <button
            type="button"
            class="btn btn-primary btn-sm btn-info"
            onclick="window.location.href='viewDetails.php?propID=<?php echo $row['property_id'];?>'"
          >
            View Details
        </button> 
        <button
            type="button"
            class="btn btn-primary btn-sm btn-danger"
            onclick="window.location.href='javascript:deleteProduct(<?php echo $row['watchlist_id']; ?>)'"
          >
            Remove
        </button> 

        </div>
        
        <div class="col-lg-4" style="padding-bottom: 30px;">
        <a href="property-images/<?php echo $row['property_image']; ?>">
        <img
          src="property-images/<?php echo $row['property_image']; ?>"
          alt="property"
          width="200"
        />
        </a>

        </div>
        <?php
          }
        ?>
      </div>
    </div>

    <!--End of Porperty Display from database-->

    <!--Bootstrap script-->
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
  </body>
</html>
