<?php

	include '../classes/presitesurvey.class.php';

	echo "<h1>Pre site surveys van " . $_GET["studentName"] . "</h1>";

	getForm($_GET["studentName"], $Conn);

?>