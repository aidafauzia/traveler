<?php 
session_start();
unset($_SESSION['traveler']);
echo "<script>window.location = '../index.php';</script>";
session_destroy();
 ?>