<?php
	
	include '../classes/arrivalchecklist.class.php';

	echo "<a href='studentpage.php?studentName=" . $_GET['studentName'] . "'>Terug</a>";

	echo "<h1>Arrival checklists van " . $_GET["studentName"] . "</h1>";

	getForm($_GET["studentName"], $Conn);

?>