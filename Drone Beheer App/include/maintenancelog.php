<?php

	include '../classes/maintenancelog.class.php';

	echo "<h1>Maintenance logs van " . $_GET["studentName"] . "</h1>";

	getForm($_GET["studentName"], $Conn);

?>