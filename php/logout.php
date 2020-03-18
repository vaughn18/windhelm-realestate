<?php

//once logout is clicked this will unset all sessions
    include "config.php";
    unset($_SESSION['useremail']);
    unset($_SESSION['name']);
    unset($_SESSION['memberID']);
//go to the homepage
    header("Location: ../index.php");
?>