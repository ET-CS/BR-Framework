<?php

session_start();
$_SESSION['loggedin'] = 0;
header("Location: login.php");
exit;
?>
