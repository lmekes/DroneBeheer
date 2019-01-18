<?php

	include 'functions/dbConnection.php';

	function getStudentNames($Conn){

		$result = $Conn->query("SELECT DISTINCT NaamStudent FROM ArrivalChecklist 
			UNION 
			SELECT DISTINCT NaamStudent FROM BatteryChargeLogs
			UNION 
			SELECT DISTINCT NaamStudent FROM EmbarkationChecklist
			UNION 
			SELECT DISTINCT NaamStudent FROM FlightLog
			UNION 
			SELECT DISTINCT NaamStudent FROM IncidentLog
			UNION 
			SELECT DISTINCT NaamStudent FROM MaintenanceLog
			UNION 
			SELECT DISTINCT NaamStudent FROM OnSiteSurvey
			UNION 
			SELECT DISTINCT NaamStudent FROM OperationFlightPlan
			UNION 
			SELECT DISTINCT NaamStudent FROM PostFlightChecklist
			UNION
			SELECT DISTINCT NaamStudent FROM PreFlightChecklist
			UNION
			SELECT DISTINCT NaamStudent FROM PreSitesSurvey
			ORDER BY NaamStudent");

		// echo "<pre>".var_dump($result)."</pre>";

		// exit;

		echo "<table class='table table-striped'>";

		while ($data = $result->fetch_assoc()) {
				
			echo "<tr><td><a href='include/studentpage.php?studentName=" . $data['NaamStudent'] . "'>" . $data['NaamStudent'] . "</a></td></tr>";

		}

		echo "</table>";
		
	}

?>
