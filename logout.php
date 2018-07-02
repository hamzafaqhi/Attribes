<?php
session_start();
session_destroy();

echo "You successfully Logged out click here to try again <a href='login.php'>Login </a> ";
?>