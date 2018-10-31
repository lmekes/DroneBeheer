<?php

	include 'functions/dbConnection.php';

	function getStudentNames(){

		$query = $Conn->query("SELECT DISTINCT NaamStudent FROM ArrivalChecklist, BatteryChargeLogs, EmbarkationChecklist, FlightLog, IncidentLog, MaintanceLog, OnSiteSurvey, OperationFlightPlan, PostFlightChecklist, PreFlightChecklist, PreSitesSurvey");

		foreach ($query as $row) {
				
				print $row['NaamStudent'] . "</br>";

		}
		
	}

?>