<div class="container-fluid">
<?php

	include '../classes/batterychargelogs.class.php';
	include '../functions/config.php';

	echo "<a href='studentpage.php?studentName=" . $_GET['studentName'] . "' class='btn btn-outline-primary' style='margin:5px;'>Terug</a>";

	echo "<h1>Battery charge logs van " . $_GET["studentName"] . "</h1>";

	getForm($_GET["studentName"], $Conn);

?>
</div>