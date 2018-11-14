<?php

	include '../classes/preflightchecklist.class.php';

	echo "<h1>Pre flight checklists van " . $_GET["studentName"] . "</h1>";

	getForm($_GET["studentName"], $Conn);

?>