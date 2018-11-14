<?php

	include '../classes/flightlog.class.php';

	echo "<h1>Flight logs van " . $_GET["studentName"] . "</h1>";

	getForm($_GET["studentName"], $Conn);

?>