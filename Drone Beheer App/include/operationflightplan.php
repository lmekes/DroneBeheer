<?php

	include '../classes/operationflightplan.class.php';

	echo "<h1>Operation flight plans van " . $_GET["studentName"] . "</h1>";

	getForm($_GET["studentName"], $Conn);

?>