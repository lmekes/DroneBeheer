<?php
	
	include '../classes/arrivalchecklist.class.php';

	echo "<h1>Arrival checklists van " . $_GET["studentName"] . "</h1>";

	getForm($_GET["studentName"], $Conn);

?>