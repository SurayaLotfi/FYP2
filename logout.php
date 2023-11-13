<?php
session_start();
require 'connect.php';

if (isset($_COOKIE['visited'])) {
    // If the 'visited' cookie exists, unset it by setting an expiration time in the past
    setcookie('visited', '', time() - 3600);
}
$_SESSION = [];
session_unset();
session_destroy();
header("Location: login.php");
?>