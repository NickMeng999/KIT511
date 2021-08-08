<?php session_start();
// 	File mac dinh chay vao dau tien cua he thong
// 	TODO check params tren url 
//	set gia tri cho bien toan cuc la $ctr va $action
	require_once("connection.php"); // tao ket noi den co so du lieu
	$ctr = isset($_GET['ctr']) == false ? "Student" : $_GET['ctr'];
	$action = isset($_GET['action']) == false ? "home" : $_GET['action'];

	include './app/views/layout.php';
?>