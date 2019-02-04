<?php
ob_start();
session_start();
?>

<?php

if (isset($_SESSION['username'])) {
	$_SESSION['username'] = null;
	$_SESSION['firstname'] = null;
	$_SESSION['lastname'] = null;
	header("Location: index.php");
}
// if(isset($_COOKIE['customer_firstname'])){
//     unset($_COOKIE['customer_firstname']);
//     setcookie('customer_firstname', '', time() - 1200, '/');
// }
// if (isset($_SESSION['customer_firstname'])) {
// 	$_SESSION['customer_firstname'] = null;
// 	$_SESSION['customer_lastname']  = null;
// 	header("Location: ../index.php");
// }
