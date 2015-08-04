<?php
	session_start();
	if (!isset($_SESSION['signedIn'])) {
		$_SESSION['signedIn'] = FALSE;
	}
	if (!isset($_SESSION['loginFail'])) {
		$_SESSION['loginFail'] = FALSE;
	}
	if (!isset($_SESSION['answerState'])) {
		$_SESSION['answerState'] = 0;
	}
	if (!isset($_SESSION['username'])) {
		$_SESSION['username'] = "";
	}
	if (!isset($_SESSION['admin'])) {
		$_SESSION['admin'] = FALSE;
	}

	include 'mysqlLogin.php';
	$sql = "SELECT * FROM settings WHERE name = 'gameInProgress'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	if ($row['value'] == 'TRUE') {
		$_SESSION["gameInProgress"] = TRUE;
	} else {
		$_SESSION["gameInProgress"] = FALSE;
	}
?>