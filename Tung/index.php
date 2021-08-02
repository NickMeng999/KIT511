<?php
session_start();
// 	Default file
// 	TODO check params url 

	require_once("connection.php"); 
	$ctr = isset($_GET['ctr']) == false ? "Student" : $_GET['ctr'];
	$action = isset($_GET['action']) == false ? "login" : $_GET['action'];
	include './app/views/layout.php';
?>