<?php
include "../../php/config.php";
// retreives product id from url
$property_id = $_GET['propID'];
$query = "DELETE FROM properties WHERE property_id = '$property_id' ";
mysqli_query($link, $query);
// redirect to product home page
header("Location: property.php");
?>