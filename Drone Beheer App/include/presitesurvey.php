<?php

	include '../classes/presitesurvey.class.php';
	include '../functions/config.php';

	echo "<a href='studentpage.php?studentName=" . $_GET['studentName'] . "'>Terug</a>";

	echo "<h1>Pre site surveys van " . $_GET["studentName"] . "</h1>";

	getForm($_GET["studentName"], $Conn);

?>