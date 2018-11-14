<?php

	include '../classes/batterychargelogs.class.php';

	echo "<h1>Battery charge logs van " . $_GET["studentName"] . "</h1>";

	getForm($_GET["studentName"], $Conn);

?>