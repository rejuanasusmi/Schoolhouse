<?php
session_start();
session_destroy(); // Destroy the session
header("Location: adminlogin.php"); // Redirect to login page
exit();
?>
