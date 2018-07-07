<?php 
	session_start();
	// include_once "./models/getting.php";
	// $conn=getConnection();
	// $uid=$_SESSION['uid'];
	// logoutstatus($uid,$conn);
	session_destroy();
	header("location:ulblogin.php");
?>