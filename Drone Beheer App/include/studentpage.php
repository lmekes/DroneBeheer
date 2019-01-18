<div class="container-fluid">

<a href='../index.php' class='btn btn-outline-primary' style='margin:5px;'>Terug</a></br>

<?php

	include '../functions/dbConnection.php';
	include '../functions/config.php';

    echo "<h1>" . $_GET["studentName"] . "</h1>";

	echo "<table class='table table-striped'>

	<tr><td><a href='arrivalchecklist.php?studentName=" . $_GET["studentName"] . "'>Arrival checklist</a></tr></td>

	<tr><td><a href='batterychargelogs.php?studentName=" . $_GET["studentName"] . "'>Battery charge logs</a></tr></td>

	<tr><td><a href='embarkationchecklist.php?studentName=" . $_GET["studentName"] . "'>Embarkation checklist</a></tr></td>

	<tr><td><a href='flightlog.php?studentName=" . $_GET["studentName"] . "'>Flight log</a></tr></td>

	<tr><td><a href='incidentlog.php?studentName=" . $_GET["studentName"] . "'>Incident log</a></tr></td>

	<tr><td><a href='maintenancelog.php?studentName=" . $_GET["studentName"] . "'>Maintenance log</a></tr></td>

	<tr><td><a href='onsitesurvey.php?studentName=" . $_GET["studentName"] . "'>On site survey</a></tr></td>

	<tr><td><a href='operationflightplan.php?studentName=" . $_GET["studentName"] . "'>Operation flight plan</a></tr></td>

	<tr><td><a href='postflightchecklist.php?studentName=" . $_GET["studentName"] . "'>Post flight checklist</a></tr></td>

	<tr><td><a href='preflightchecklist.php?studentName=" . $_GET["studentName"] . "'>Pre flight checklist</a></tr></td>

	<tr><td><a href='presitesurvey.php?studentName=" . $_GET["studentName"] . "'>Pre site survey</a></tr></td>

	</table>";

?>
</div>

