<?php
include "../../php/config.php"; //Config
include '../../php/image-creation.php';

if (!isset($_SESSION['name'])) {
  header("Location: ../login.html"); //Check if user is logged in
}


// retreives galleryID from URL
$galleryID = mysqli_real_escape_string($link, $_GET['galleryID']);

// check if submit button is clicked
if (isset($_POST['editGallery'])) {

  $galleryID = $_GET['propID'];
  $caption = mysqli_real_escape_string($link,$_POST['caption']);
  $altText = mysqli_real_escape_string($link,$_POST['altText']);
  //image file
  $imgName = $_FILES['fileImage']['name'];
  $tmpName = $_FILES['fileImage']['tmp_name'];
  $ext = strrchr($imgName, ".");
  $newName = md5(rand()*time()).$ext;
  $imgPath = PRODUCT_IMG_DIR . $newName;
  createThumbnail($tmpName, $imgPath, THUMBNAIL_WIDTH); 
  
  // check if the image is updated
  if ($tmpName != "") {
     $query = "UPDATE property_gallery SET caption='$caption', altText='$altText', gallery_image='$newName' WHERE galleryID='$galleryID' ";
  }
  else {
     $query = "UPDATE property_gallery SET caption='$caption', altText='$altText' WHERE galleryID='$galleryID' ";
  }
  
  mysqli_query($link, $query); // execute the SQL 
  header("Location: displayGallery.php?propID=$galleryID"); 
  } // end of if statement
  
  // locate the product record from database
  $query = "SELECT * FROM property_gallery WHERE galleryID='$galleryID'  ";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_array($result);
  extract($row);
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

    <div id="content">
		<h2>Add a new image</h2>

        <form method="post" enctype="multipart/form-data">
  	       <table border="0">
		 <tr>
		    <td width="200">Caption</td>
		    <td width="175" align="left"><input type="text" size="55" name="caption" value="<?php echo $caption; ?>"></td>
		    </tr>
  		<tr>
		    <td width="200">Alt Text</td>
		    <td width="500" align="left"><input type="text" size="55" name="altText" value="<?php echo $altText; ?>"></td>
		</tr>
                <tr>
		    <td width="150">Gallery Image</td>
		    <td> <input name="fileImage" type="file"> <br>
			<!--
			<img src="<?php echo '../../property-images/'.$gallery_image; ?>" alt="Photo" title="photo" width="300" />
			-->
			<img src="../../property-images/<?php echo $gallery_image; ?>" alt="Photo" title="photo" width="300" />
			</td>
            </tr>
  		<tr>
		    <td align="right">
		    <input type="submit" name="editGallery" value="Edit gallery image">
		    </td>
		  </tr>
		</table>
	      </form>

		
		
		
		
		
		</div> <!--- End of content -->

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
