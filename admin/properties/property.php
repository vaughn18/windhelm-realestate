<?php
include "../../php/config.php"; //Config

if (!isset($_SESSION['name'])) {
  header("Location: ../login.html"); //Check if user is logged in
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

    <!--Delete confirmation-->
    <script>
      function deleteProduct(property_id) {
        if (confirm("Are you sure you want to delete this product?")) {
          window.location.href = "deleteProperty.php?propID=" + property_id;
        } // end of if
      } // end of function
    </script>
    <!--End of delete confirmation-->
    
  </head>
  <body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="../adindex.php">Windhelm Real Estate</a>
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
            <a class="nav-link" href="../city/city.php">City</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="property.php">Properties</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../php/logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
    <!--End of Navbar-->

    <!--property Contents-->

    <h2>Managing of Properties</h2>

    <table width="100%" border="0" cellspacing="0" cellpadding="20">
      <tr>
        <td>
          <h3>Listing of All Properties</h3>
          <p>To add a new property, <a href="addProperty.php">Click here</a></p>
          <table border="0">
            <tr>
              <th width="60" align="left"></th>

              <th width="250" align="left">Name</th>
              <th width="250" align="left">City</th>
              <th width="250" align="left">Address</th>
              <th width="250" align="left">Bedrooms</th>
              <th width="250" align="left">Bathrooms</th>
              <th width="250" align="left">Ensuite</th>
              <th width="250" align="left">Garage</th>
              <th width="350" align="left">Description</th>
              <th width="80" align="left">Price</th>
              <th width="50">&nbsp;</th>
              <th width="50">&nbsp;</th>
            </tr>

            <?php
        $query = "SELECT * FROM city JOIN properties ON city.location_id = properties.location_id ORDER BY property_id DESC";
        $result = mysqli_query($link, $query);
        
		    while ($row = mysqli_fetch_array($result))
		    {
		  ?>
            <tr>
              <td>
                <img
                  src="<?php echo '../../property-images/'.$row['property_image']; ?>"
                  alt="Photo"
                  title="photo"
                  width="60"
                />
              </td>

              <td>
                <?php
		              echo $row['name'];
		            ?>
              </td>
              <td>
                <?php
                  echo $row['location'];
                ?>
              </td>
              <td>
                <?php
                  echo $row['address'];
                ?>
              </td>
              <td>
                <?php
                  echo $row['bedroom'];
                ?>
              </td>
              <td>
                <?php
                  echo $row['bathroom'];
                ?>
              </td>
              <td>
                <?php
                  echo $row['ensuite'];
                ?>
              </td>
              <td>
                <?php 
                  echo $row['garage']; 
                ?>
              </td>
              <td>
              <button
                 type="button"
                 class="btn btn-primary btn-sm"
                 onclick="window.location.href='../../viewDetails.php?propID=<?php echo $row['property_id'];?>'"
              >
                 View Details
              </button>
              </td>

              <td>
                <?php
		              echo "$".$row['price'];
		            ?>
              </td>
              <td>
                <a
                  href="displayGallery.php?propID=<?php echo $row['property_id']; ?>"
                >
                  Gallery
                </a>
              </td>
              <td>
                <a
                  href="editProperty.php?propID=<?php echo $row['property_id']; ?>"
                >
                  <img src="../../images/edit_icon.png" width="40" alt="" />
                </a>
              </td>
              <td>
                <a
                  href="javascript:deleteProduct(<?php echo $row['property_id']; ?>)"
                >
                  <img src="../../images/delete_icon.png" width="40" alt="" />
                </a>
              </td>
              <?php
		  }
		  ?>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <!--End of Property contents-->

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
  </body>
</html>
