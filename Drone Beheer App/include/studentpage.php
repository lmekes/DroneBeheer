<?php

	include '../functions/dbConnection.php';
	include '../classes/arrivalchecklist.class.php';

    echo "<h1>" . $_GET["studentName"] . "</h1>";

    getArrivalChecklist($_GET["studentName"]);

?>
