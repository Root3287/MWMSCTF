<?php
  include 'mysqlLogin.php';
	if (!isset($_SESSION)) {
		session_start();
	}
	$sql = "SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	if (!$row['admin']) {
		header("Location: ../index.php");
	}

  function toggleGameState() {
		include 'mysqlLogin.php';
		$sql = "SELECT * FROM settings WHERE name = 'gameInProgress'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		if ($row['value'] == 'TRUE') {
			$buttonText = 'Stop Game';
		} else {
			$buttonText = 'Start Game';
		}
		echo '
		<div class="panel panel-default">
			<div class="panel-body">
				<h5 style="display:inline-block">Toggle game status.</h5>
				<a href="helpers/adminFunctions.php?action=switchState" class="btn btn-default pull-right" style="display:inline-block">'. $buttonText . '</a>
			</div>
		</div>
		';
	}
?>