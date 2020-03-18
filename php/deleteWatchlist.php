<?php
include "config.php";
// retreives product id from url
$watchlist_id = $_GET['watchID'];
$query = "DELETE FROM watchlist WHERE watchlist_id = '$watchlist_id' ";
mysqli_query($link, $query);
// redirect to product home page
header("Location: ../watchlist.php?propID='1'");
?>