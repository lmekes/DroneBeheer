<?php

	include '../classes/postflightchecklist.class.php';

	echo "<h1>Post flight checklists van " . $_GET["studentName"] . "</h1>";

	getForm($_GET["studentName"], $Conn);

?>