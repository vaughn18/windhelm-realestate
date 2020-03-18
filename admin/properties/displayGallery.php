<?php
include "../../php/config.php"; //Config

if (!isset($_SESSION['name'])) {
  header("Location: ../login.html"); //Check if user is logged in
}

// retrieve product id from URL
$productID  = $_GET['propID'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Windhelm || Admin || Product Gallery</title>

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

    <!-- Javascript Delete confirmation notification -->
    <script>
      function deleteGallery(galleryID) {
        if (confirm("Are you sure you want to delete this picture?")) {
          window.location.href = "deleteGallery.php?propID=" + galleryID;
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

    <!--Content stuff-->
    <div id="content">
		<h2>Properties Gallery Management</h2>
		
        <table width="100%" border="0" cellspacing="0" cellpadding="20">
        <tr>
          <td>
           <h3>Property listing Gallery</h3>
        <p>To add a new image, <a href='addNewGalleryImage.php?propID=<?php echo $productID; ?>'>Click here</a></p>
		  <table border="0">
		  <tr>
		   <th width="60" align="left"></th>

		  <th width="250" align="left"> Caption</th>
		  <th width="350" align="left"> Alt Text </th>
		  <th width="50">&nbsp;</th>
		  <th width="50">&nbsp;</th>
		  </tr>

		  <?php
          $query = "SELECT * FROM property_gallery WHERE galleryID_a='$productID' ORDER BY galleryID DESC";
		  $result = mysqli_query($link, $query);

		  while ($row=mysqli_fetch_array($result))
		  {
		  extract($row);
		  ?>
		  <tr>
		  <td>
		     <img src="<?php echo '../../property-images/'.$row['gallery_image']; ?>" alt="<?php echo $altText; ?>" title="<?php echo $caption; ?>" width="60" />
		  </td>

		  
		  <td>
		     <?php
		        echo $row['caption'];
		     ?>
		  </td>
		  <td>
		     <?php
		        echo $row['altText'];
		     ?>
		  </td>
          <td>
		  	 <a href="editGallery.php?galleryID=<?php echo $row['galleryID']; ?>"> 
		  	 <img src="../../images/edit_icon.png" width="40" alt="">
		  	 </a>
		  </td>
		  <td>
		  	 <a href="javascript:deleteGallery(<?php echo $row['galleryID'];?>)">
		  	 <img src="../../images/delete_icon.png" width="40" alt="">
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

		
		
		

		</div> <!--- End of content -->

