<?php

	include '../classes/incidentlog.class.php';

	echo "<h1>Incident logs van " . $_GET["studentName"] . "</h1>";

	getForm($_GET["studentName"], $Conn);

?>