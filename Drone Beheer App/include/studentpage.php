<?php

	include '../functions/dbConnection.php';
	include '../functions/config.php';

	echo "<a href='../index.php'>Terug</a></br>";

    echo "<h1>" . $_GET["studentName"] . "</h1>";

	echo "<a href='arrivalchecklist.php?studentName=" . $_GET["studentName"] . "'>Arrival checklist</a></br>

	<a href='batterychargelogs.php?studentName=" . $_GET["studentName"] . "'>Battery charge logs</a></br>

	<a href='embarkationchecklist.php?studentName=" . $_GET["studentName"] . "'>Embarkation checklist</a></br>

	<a href='flightlog.php?studentName=" . $_GET["studentName"] . "'>Flight log</a></br>

	<a href='incidentlog.php?studentName=" . $_GET["studentName"] . "'>Incident log</a></br>

	<a href='maintenancelog.php?studentName=" . $_GET["studentName"] . "'>Maintenance log</a></br>

	<a href='onsitesurvey.php?studentName=" . $_GET["studentName"] . "'>On site survey</a></br>

	<a href='operationflightplan.php?studentName=" . $_GET["studentName"] . "'>Operation flight plan</a></br>

	<a href='postflightchecklist.php?studentName=" . $_GET["studentName"] . "'>Post flight checklist</a></br>	

	<a href='preflightchecklist.php?studentName=" . $_GET["studentName"] . "'>Pre flight checklist</a></br>

	<a href='presitesurvey.php?studentName=" . $_GET["studentName"] . "'>Pre site survey</a></br>";

?>

