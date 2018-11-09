<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn){

		$query = "UPDATE 'ArrivalChecklist' SET 

		'NaamStudent'='" . $_POST['naamstudent'] . "', 

		'Datum'='" . $_POST['datum'] . "', 
		
		'SiteSurvey'='" . $_POST['sitesurvey'] . "', 
		
		'FlightPlan'='" . $_POST['flightplan'] . "', 
		
		'Airframe'='" . $_POST['airframe'] . "', 
		
		'Camera'='" . $_POST['camera'] . "', 
		
		'Connections'='" . $_POST['connections'] . "',
		
		'Propellers'='" . $_POST['propellers'] . "', 
		
		'CalibrationPlatform'='" . $_POST['calibrationplatform'] . "', 
		
		'GroundStation'='" . $_POST['groundstation'] . "', 
		
		'Monitor'='" . $_POST['monitor'] . "', 
		
		'CrewIdBadges'='" . $_POST['crewidbadges'] . "', 
		
		'HardHat'='" . $_POST['hardhat'] . "', 
		
		'Radio'='" . $_POST['radio'] . "', 
		
		'FirstAid'='" . $_POST['firstaid'] . "', 
		
		'Extinguisher'='" . $_POST['extinguisher'] . "', 
		
		'Signs'='" . $_POST['signs'] . "' 
		
		WHERE 'Id'='" . $_POST['id'] . "'";

		$Conn->$query;

		// $query = "UPDATE `ArrivalChecklist` SET `NaamStudent`='" . ."',
		// `Datum`='',
		// `SiteSurvey`='',
		// `FlightPlan`='',
		// `Airframe`='',
		// `Camera`='',
		// `Connections`='',
		// `Propellers`='',
		// `CalibrationPlatform`='',
		// `GroundStation`='',
		// `Monitor`='',
		// `CrewIdBadges`='',
		// `HardHat`='',
		// `Radio`='',
		// `FirstAid`='',
		// `Extinguisher`='',
		// `Signs`='' WHERE `Id`=''";

	}

	if(isset($_POST['update'])){

		updateForm($Conn);

	}

	function getForm($studentName, $Conn){

		$result = $Conn->query("SELECT * FROM ArrivalChecklist WHERE NaamStudent = '" . $studentName . "'");

		while ($data = $result->fetch_assoc()) {
				
			echo "<form action='' method='post'>

				<input type='hidden' name='id' value='" . $data['Id'] . "'>

				<input type='text' name='naamstudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' name='datum' value='" . $data['Datum'] ."'></br>

				<input type='text' name='sitesurvey' value='" . $data['SiteSurvey'] . "'></br>
				
				<input type='text' name='flightplan' value='" . $data['FlightPlan'] . "'></br>
				
				<input type='text' name='airframe' value='" . $data['Airframe'] . "'></br>
				
				<input type='text' name='camera' value='" . $data['Camera'] . "'></br>
				
				<input type='text' name='connections' value='" . $data['Connections'] . "'></br>
				
				<input type='text' name='propellers' value='" . $data['Propellers'] . "'></br>
				
				<input type='text' name='calibrationplatform' value='" . $data['CalibrationPlatform'] . "'></br>
				
				<input type='text' name='groundstation' value='" . $data['GroundStation'] . "'></br>
				
				<input type='text' name='monitor' value='" . $data['Monitor'] . "'></br>
				
				<input type='text' name='crewidbadges' value='" . $data['CrewIdBadges'] . "'></br>
				
				<input type='text' name='hardhat' value='" . $data['HardHat'] . "'></br>
				
				<input type='text' name='radio' value='" . $data['Radio'] . "'></br>
				
				<input type='text' name='firstaid' value='" . $data['FirstAid'] . "'></br>
				
				<input type='text' name='extinguisher' value='" . $data['Extinguisher'] . "'></br>
				
				<input type='text' name='signs' value='" . $data['Signs'] . "'></br>

				<input type='submit' name='update' value='Update'>

			</form>";

		}

	}

?>