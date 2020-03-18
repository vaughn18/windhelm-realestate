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

    <!--City selection-->
    <form method="post" enctype="multipart/form-data">
      <div class="container padding">
        <div class=" container row text-center">
          <div class="form-group col-12">
            <label for="citySelect" style=""><h1>Select a City:</h1></label>
            <select
              value="Selelct a City"
              class="form-control"
              id="citySelect"
              name="city"
            >
              <?php
          $query = "SELECT * FROM city";
          $result = mysqli_query($link, $query);
          if (isset($_POST['filter'])) { // when the button filter is clicked
            $location = mysqli_real_escape_string($link, $_POST['city']);
            header("Location:filteredshop.php?page=$location"); // This will direct you to a page with the desired filtered city
          }
            
          while ($row = mysqli_fetch_array($result))
           { //repeats as much category there is
              echo '<option name="city">' . $row['location'] . '</option>';
           } // end of while
          ?>
            </select>

            <br />


            <button type="submit" 
                    name="filter" 
                    class="btn btn-primary"
                 >
                  Filter
                    </button>
            <button type="submit" name="filterAll" class="btn btn-primary">
              Show All
            </button>
          </div>
        </div>
      </div>
    </form>
    <div class="container padding" style="padding-top: 30px;">
      <div class="row padding text-center">
        <?php

          $results_per_page = 6; // Number of properties per page
          
          if(!isset($_GET['page'])){ //Gets the page from URL 
            $page = 1;
          } else {
            $page = $_GET['page'];
          }
        
          $page_firstResult = ($page-1)*$results_per_page; // Sets the limit for the results in query

          $limit = $results_per_page; //variable to limit the query 
          $offset = $page_firstResult; // variable for query's offset when limitting the results per page


        $query1 = "SELECT * FROM city JOIN properties ON city.location_id = properties.location_id"; //shows all the properties //shows all the properties
        $result = mysqli_query($link, $query1);
        $number_of_results = mysqli_num_rows($result); // retrieves how many properties in the database
        $number_of_pages = ceil($number_of_results/$results_per_page);    
        $query1 = "SELECT * FROM city JOIN properties ON city.location_id = properties.location_id LIMIT $limit OFFSET $offset"; //shows all the properties
        $result = mysqli_query($link, $query1);
        while ($row = mysqli_fetch_array($result)) {
          $property_id = $row['property_id'];
    ?>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" style="padding-bottom: 40px;">
          <a href="viewDetails.php?propID=<?php echo $property_id;?>">
            <img
              src="property-images/<?php echo $row['property_image']; ?>"
              alt="property"
              width="350"
            />
          </a>
          <h3><?php echo $row['name']; ?></h3>
          <h5><?php echo $row['location'];?></h5>
          <h8><?php echo $row['address'];?></h8>
          <p>
            <!-- Icons -->
            <i class="fas fa-bed"></i>
            <?php echo $row['bedroom']; ?>
            <i class="fas fa-bath"></i>
            <?php echo $row['bathroom']; ?>
            <i class="fas fa-shower"></i>
            <?php echo $row['ensuite']; ?>
            <i class="fas fa-car"></i>
            <?php echo $row['garage']; ?>
          </p>
          <button
            type="button"
            class="btn btn-primary btn-sm"
            onclick="window.location.href='viewDetails.php?propID=<?php echo $property_id;?>'"
          >
            View This Property
          </button>
        </div>
        <?php
    }
    ?>
      </div>
    </div>
    <!--End of Porperty Display from database-->
    <div class="container padding" style="padding-top: 30px;padding-bottom: 40px;">
      <div class="row padding text-center">
        <div class="col-12">
          <?php
            for($page=1;$page<=$number_of_pages;$page++) {
              echo '<a href="shop.php?page=' . $page . '">' . $page . '</a> '; // display the pages
            }
          ?>
        </div>
      </div>
    </div>

    <!--Pages-->

    <!--Pagination-->
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
