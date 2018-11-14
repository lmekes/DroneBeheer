<?php

	include '../classes/onsitesurvey.class.php';

	echo "<h1>On site surveys van " . $_GET["studentName"] . "</h1>";

	getForm($_GET["studentName"], $Conn);

?>