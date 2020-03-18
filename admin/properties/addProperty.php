<?php
include "../../php/config.php"; //Config
include '../../php/image-creation.php';

if (!isset($_SESSION['name'])) {
  header("Location: ../login.html"); //Check if user is logged in
}

// check if the user clicks the submit button
if (isset($_POST['addProduct'])) {

$categoryID = mysqli_real_escape_string($link, $_POST['productCategory']);
$name = mysqli_real_escape_string($link,$_POST['productName']);
$address = mysqli_real_escape_string($link,$_POST['address']);
$bedroom = mysqli_real_escape_string($link,$_POST['bedroom']);
$bathroom = mysqli_real_escape_string($link,$_POST['bathroom']);
$ensuite = mysqli_real_escape_string($link,$_POST['ensuite']);
$garage = mysqli_real_escape_string($link,$_POST['garage']);
$desc = mysqli_real_escape_string($link,$_POST['productDesc']);
$price = mysqli_real_escape_string($link,$_POST['productPrice']);
//image file
$imgName = $_FILES['fileImage']['name'];
$tmpName = $_FILES['fileImage']['tmp_name'];
$ext = strrchr($imgName, ".");
$newName = md5(rand()*time()).$ext;
$newName = strtolower($newName); //convert to lower case
$imgPath = PRODUCT_IMG_DIR . $newName;
createThumbnail($tmpName, $imgPath, THUMBNAIL_WIDTH); 

// Add this product to tbl_product
$query = "INSERT INTO properties (name, description, location_id, price, property_image, address, bedroom, bathroom, ensuite, garage) VALUES ('$name', '$desc', '$categoryID', '$price', '$newName', '$address', '$bedroom', '$bathroom', '$ensuite', '$garage' ) ";

mysqli_query($link, $query); // execute the SQL 
header("Location: property.php"); 
} // end of if statement
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Windhelm || Admin</title>

    <!--Animation css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" />
    <!--End of  Animation css-->

    <!--Link CSS for Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <!--End of CSS for Bootstrap link-->

    <!--LOCAL CSS LINK-->
    <link rel="stylesheet" href="../admin_stylesheet.css" />
    <!--END OF CSS-->

    <!--Jquery script-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!--End of Jquery script-->
</head>

<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../adindex.php">Windhelm Real Estate</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

    <!--Add property Contents-->

    <h2>Add a new property</h2>

    <form method="post" enctype="multipart/form-data">
        <table border="0">
            <tr>
                <td width="200">City</td>
                <td width="500" align="left">
                    <select name="productCategory">
                        <?php
        $query = "SELECT * FROM city";
        $result = mysqli_query($link, $query);
        while($row = mysqli_fetch_array($result)) {    
        extract($row);
        ?>
                        <option value="<?php echo $location_id; ?>"><?php echo $location; ?></option>
                        <?php
        } //end of while loop
        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="200">Property Name</td>
                <td width="175" align="left">
                    <input type="text" size="55" name="productName" />
                </td>
            </tr>
            <tr>
                <td width="200">Address</td>
                <td width="175" align="left">
                    <input type="text" size="55" name="address" />
                </td>
            </tr>
            <tr>
                <td width="200">Bedroom</td>
                <td width="175" align="left">
                    <input type="number" size="55" name="bedroom" />
                </td>
            </tr>
            <tr>
                <td width="200">Bathroom</td>
                <td width="175" align="left">
                    <input type="number" size="55" name="bathroom" />
                </td>
            </tr>
            <tr>
                <td width="200">Ensuite</td>
                <td width="175" align="left">
                    <input type="number" size="55" name="ensuite" />
                </td>
            </tr>
            <tr>
                <td width="200">Garage</td>
                <td width="175" align="left">
                    <input type="number" size="55" name="garage" />
                </td>
            </tr>
            <tr>
                <td width="200">Property Description</td>
                <td width="500" align="left">
                    <input type="text" size="55" name="productDesc" />
                </td>
            </tr>
            <tr>
                <td width="150">Property Image</td>
                <td><input name="fileImage" type="file" /></td>
            </tr>
            <tr>
                <td width="200">Property Price</td>
                <td width="500" align="left">
                    <input type="text" size="55" name="productPrice" />
                </td>
            </tr>
            <tr>
                <td align="right">
                    <input type="submit" name="addProduct" value="Add a property" />
                </td>
            </tr>
        </table>
    </form>

    <!--End of Add Property contents-->

    <!--Bootstrap 4 scripts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!--End 4 bootstrap script-->
</body>

</html>