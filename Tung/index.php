<?php session_start();
// 	First file to run by default

	require_once("connection.php"); // establish connection to database 
	$ctr = isset($_GET['ctr']) == false ? "Student" : $_GET['ctr'];
	$action = isset($_GET['action']) == false ? "login" : $_GET['action'];

	include './app/views/layout.php';
?>