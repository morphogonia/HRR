<?php
session_start();
$user = $_POST['username'];
$pass = $_POST['password'];

if (($user=='hriosadmin') && ($pass=='1rios2rodr')) {
	$_SESSION['logged_admin_in'] = true;
	header("location: private.php");
	exit;
} else	{
   	header("location: index.php");
   	exit;
}
?>