<?php
	function htmlHeader($pageName) {
		$pathToRoot = '';
		if ($pageName != 'index' && $pageName != 'scoreboard') {
			$pathToRoot = '../';
		}
		echo '
			<meta charset="ISO-8859-1">
			<link rel="stylesheet" type="text/css" href="' . $pathToRoot .'style.css">
			<link href="' . $pathToRoot . 'bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
			<link rel="icon" type="image/png" href="' . $pathToRoot. '/images/icons/favicon-32x32.png" sizes="32x32">
			<link rel="icon" type="image/png" href="' . $pathToRoot. '/images/icons/favicon-96x96.png" sizes="96x96">
			<link rel="icon" type="image/png" href="' . $pathToRoot. '/images/icons/favicon-16x16.png" sizes="16x16">
		';
	}
?>