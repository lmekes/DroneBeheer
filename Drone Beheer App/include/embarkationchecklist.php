<?php

	include '../classes/embarkationchecklist.class.php';

	echo "<h1>Embarkation checklists van " . $_GET["studentName"] . "</h1>";

	getForm($_GET["studentName"], $Conn);

?>