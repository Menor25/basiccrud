<?php
include('includes/functions.php');

// remove all session variables
session_unset();

// destroy the session
session_destroy();


header("Location: signin.php");
?>
