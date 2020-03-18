<?php
include "../../php/config.php"; //Config
include '../../php/image-creation.php';

if (!isset($_SESSION['name'])) {
    header("Location: ../login.html"); //Check if user is logged in
  }

// check if the user clicks the submit button
if (isset($_POST['addGallery'])) {

$galleryID = $_GET['propID'];
$caption = mysqli_real_escape_string($link,$_POST['caption']);
$alt = mysqli_real_escape_string($link,$_POST['altText']);
$productID = mysqli_real_escape_string($link,$_GET['propID']);

//image file
$imgName = $_FILES['fileImage']['name'];
$tmpName = $_FILES['fileImage']['tmp_name'];
$ext = strrchr($imgName, ".");
$newName = md5(rand()*time()).$ext;
$imgPath = PRODUCT_IMG_DIR . $newName;
createThumbnail($tmpName, $imgPath, THUMBNAIL_WIDTH); 

// Add this product to tbl_product
$query = "INSERT INTO property_gallery (galleryID_a, caption, altText, gallery_image) VALUES ('$productID', '$caption', '$alt', '$newName') "; 

mysqli_query($link, $query); // execute the SQL 
header("Location: displayGallery.php?propID=$galleryID"); 
}// end of if statement

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Windhelm || Admin || Property Gallery</title>

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

    <!-- Content -->

    <div id="content">
		<h2>Add an image to the Gallery</h2>

        <form method="post" enctype="multipart/form-data">
			<table border="0">
				 <tr>
					<td width="200">Gallery Caption</td>
					<td width="175" align="left"><input type="text" size="55" name="caption"></td>
					</tr>
  				<tr>
					<td width="200">Gallery Alt Text</td>
					<td width="500" align="left"><input type="text" size="55" name="altText"></td>
				</tr>
				<tr>
					<td width="150">Gallery Image</td>
					<td> <input name="fileImage" type="file"></td>
				</tr>
  				<tr>
					<td align="right">
					<input type="submit" name="addGallery" value="Add Gallery Image">
					</td>
				</tr>
			</table>
		</form>

		</div> <!--- End of content -->