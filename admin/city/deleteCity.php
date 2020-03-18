<?php
include "../../php/config.php";
// retreives category id from url
$location_id = $_GET['location_id'];
$query = "DELETE FROM city WHERE location_id = '$location_id' ";
mysqli_query($link, $query);
// redirect to category home page
header("Location: city.php");
?>