<?php
include "../../php/config.php";

if (!isset($_SESSION['name'])) {
  header("Location: ../../login.html");
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

    <script>
      function deleteCategory(catID) {
        if (confirm("Are you sure you want to delete this category?")) {
          window.location.href = "deleteCity.php?location_id=" + catID;
        } // end of if
      } // end of function
    </script>
    <!--End of Jquery script-->
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
            <a class="nav-link" href="city.php">City</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../properties/property.php">Properties</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../php/logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
    <!--End of Navbar-->

    <!--LIST OF CITIES-->
    <h2>Managing of Cities</h2>
    <table
      width="90%"
      border="0"
      align="center"
      cellpadding="3"
      cellspacing="1"
      bgcolor="#CCCCCC"
    >
      <tr>
        <td width="50%" align="center" bgcolor="#CCCCCC" style="height: 26px">
          <strong>City Names</strong>
        </td>
        <td
          width="5%"
          align="center"
          bgcolor="#CCCCCC"
          style="height: 26px"
        ></td>
        <td
          width="5%"
          align="center"
          bgcolor="#CCCCCC"
          style="height: 26px"
        ></td>
      </tr>
      <?php
$query = "SELECT * FROM city";
$result = mysqli_query($link, $query);
while($row = mysqli_fetch_array($result)) {    
  extract($row); //get the row from the database so we can call the field names
?>
      <tr>
        <td align="center" bgcolor="#EEEEEE">
          <?php echo $location; ?>
        </td>
        <td>
          <a
            href="editCity.php?catID=<?php echo $location_id; ?>"
            title="edit_category"
          >
            <img src="../../images/edit_icon.png" width="40" alt=""
          /></a>
        </td>

        <td>
          <a href="javascript:deleteCategory(<?php echo $location_id; ?>)">
            <img src="../../images/delete_icon.png" width="40" alt="" />
          </a>
        </td>
      </tr>
      <?php
} // end of while loop
?>
      <!--END OF LIST OF CITIES-->

      <tr>
        <td colspan="7" align="center" bgcolor="#E6E6E6">
          <a href="addCity.php"><strong>Add a new City</strong></a>
        </td>
      </tr>
    </table>

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
