<?php
include "../../php/config.php";
// retreives gallery id from url
$galleryID = $_GET['propID'];
$query = "SELECT * FROM property_gallery WHERE galleryID = '$galleryID'";
$result = mysqli_query($link, $query);
while ($row=mysqli_fetch_array($result))
{
    $galleryID_a = $row['galleryID_a'];
}
$query = "DELETE FROM property_gallery WHERE galleryID = '$galleryID'";
mysqli_query($link, $query);
// redirect to product home page
header("Location: displayGallery.php?propID=$galleryID_a");
?>