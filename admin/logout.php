<?php

session_start();

$_SESSION['emai'] = null;
$_SESSION['user_name'] = null;
$_SESSION['f_name'] = null;
$_SESSION['pwd'] = null;

header("Location: ../login.php");
?>