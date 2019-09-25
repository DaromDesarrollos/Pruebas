<?php 
session_start();
if (!isset($_SESSION['usuario'])) header("Location: Login/login.php");
else
{
	header("Location: main.php");
}
?>

