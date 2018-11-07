<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn){

		//Update method for arrivalchecklist

		$query = "UPDATE ArrivalChecklist SET NaamStudent='', Datum='', SiteSurvey='', FlightPlan='', Airframe='', Camera='', Connections='',
		Propellers='', CalibrationPlatform='', GroundStation='', Monitor='', CrewIdBadges='', HardHat='', Radio='', FirstAid='', Extinguisher='',
		Signs='' WHERE Id='" . $data['Id'] . "'"

	}

	function getForm($studentName, $Conn){

		$result = $Conn->query("SELECT * FROM ArrivalChecklist WHERE NaamStudent = '" . $studentName . "'");

		while ($data = $result->fetch_assoc()) {
				
			echo "<form action='' method='post'>

				<input type='text' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' value='" . $data['Datum'] ."'></br>

				<input type='text' value='" . $data['SiteSurvey'] . "'></br>
				
				<input type='text' value='" . $data['FlightPlan'] . "'></br>
				
				<input type='text' value='" . $data['Airframe'] . "'></br>
				
				<input type='text' value='" . $data['Camera'] . "'></br>
				
				<input type='text' value='" . $data['Connections'] . "'></br>
				
				<input type='text' value='" . $data['Propellers'] . "'></br>
				
				<input type='text' value='" . $data['CalibrationPlatform'] . "'></br>
				
				<input type='text' value='" . $data['GroundStation'] . "'></br>
				
				<input type='text' value='" . $data['Monitor'] . "'></br>
				
				<input type='text' value='" . $data['CrewIdBadges'] . "'></br>
				
				<input type='text' value='" . $data['HardHat'] . "'></br>
				
				<input type='text' value='" . $data['Radio'] . "'></br>
				
				<input type='text' value='" . $data['FirstAid'] . "'></br>
				
				<input type='text' value='" . $data['Extinguisher'] . "'></br>
				
				<input type='text' value='" . $data['Signs'] . "'></br>

				<input type='submit' value='Update'>

			</form>";

		}

	}

?>