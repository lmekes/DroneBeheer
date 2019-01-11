<div class="container-fluid">
<?php

	include '../classes/embarkationchecklist.class.php';
	include '../functions/config.php';

	echo "<a href='studentpage.php?studentName=" . $_GET['studentName'] . "'>Terug</a>";

	echo "<h1>Embarkation checklists van " . $_GET["studentName"] . "</h1>";

	getForm($_GET["studentName"], $Conn);

?>
</div>