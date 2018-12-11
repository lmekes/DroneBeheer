<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn, $studentName){

		$queryString = "UPDATE PreFlightChecklist SET NaamStudent = '" . $_POST['NaamStudent'] . "'";

		// This query to get all the database names for the foreach later
		$result = $Conn->query("SELECT * FROM PreFlightChecklist WHERE NaamStudent = '" . $studentName . "'");
		while ($row = $result->fetch_assoc()){
			$dataRows[] = $row;
		}

		// foreach $_POST add a string to fill in the query ', nextItem = "value" '
		foreach(array_keys($dataRows[0]) AS $value){
			if($value != "Id" && $value != "NaamStudent"){
				if(isset($_POST[$value])){
					$queryString .= ", " . $value . " = '" . $_POST[$value] . "'";
				}else{
					$queryString .= ", " . $value . " = '0'";
				}
			}
		}

		// isset($_POST[$key]) && $key != "id" && $key != "naamstudent" && $key != "update"

		$queryString .= " WHERE id='". $_POST['Id'] ."'"; // secretly the WHERE is red

		// echo $queryString;

		// echo "<br><pre>";

		// var_dump(array_keys($dataRows[0])); testing

		// echo "</pre>";

		$Conn->query($queryString);

	}

	if(isset($_POST['update'])){

		updateForm($Conn, $_GET['studentName']);

	}

	function getForm($studentName, $Conn){

		$result = $Conn->query("SELECT * FROM PreFlightChecklist WHERE NaamStudent = '" . $studentName . "'");

		while ($data = $result->fetch_assoc()) {

			foreach($data AS $key => $value){
				if($value && $key){
					$checked[$key] = "checked";
				}else{
					$checked[$key] = "";
				}
			}

			echo "<form action='' method='post'>

				<input type='hidden' name='Id' value='" . $data['Id'] . "'>

				<input type='text' name='NaamStudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' name='Datum' value='" . $data['Datum'] ."'></br>

				Airframe: <input type='checkbox' name='Airframe' value='1' " . $checked['Airframe'] . "></br>

				Flight battery: <input type='checkbox' name='FlightBattery' value='1' " . $checked['FlightBattery'] . "></br>

				Transmitter(s): <input type='checkbox' name='Transmitters' value='1' " . $checked['Transmitters'] . "></br>

				Camera: <input type='checkbox' name='camera' value='1' " . $checked['Camera'] . "></br>

				Airframe: <input type='checkbox' name='Airframelevel' value='1' " . $checked['AirframeLevel'] . "></br>

				Flight battery: <input type='checkbox' name='Connectbattery' value='1' " . $checked['ConnectBattery'] . "></br>

				Self diagnostic: <input type='checkbox' name='SelfDiagnostic' value='1' " . $checked['SelfDiagnostic'] . "></br>

				Monitor: <input type='checkbox' name='Monitor' value='1' " . $checked['Monitor'] . "></br>

				Calibration: <input type='checkbox' name='Calibration' value='1' " . $checked['Calibration'] . "></br>

				Save calibration: <input type='checkbox' name='SaveCalibration' value='1' " . $checked['SaveCalibration'] . "></br>

				Camera platform: <input type='checkbox' name='CameraPlatform' value='1' " . $checked['CameraPlatform'] . "></br>

				Telemetry link: <input type='checkbox' name='TelemetryLink' value='1' " . $checked['TelemetryLink'] . "></br>

				Flight plan: <input type='checkbox' name='FlightPlan' value='1' " . $checked['FlightPlan'] . "></br>

				Camera: <input type='checkbox' name='StartRecording' value='1' " . $checked['StartRecording'] . "></br>

				Aircraft alignment: <input type='checkbox' name='AircraftAlignment' value='1' " . $checked['AircraftAlignment'] . "></br>

				Crew, public & client: <input type='checkbox' name='Crew' value='1' " . $checked['Crew'] . "></br>

				Clearance: <input type='checkbox' name='Clearance' value='1' " . $checked['Clearance'] . "></br>

				Power up: <input type='checkbox' name='PowerUp' value='1' " . $checked['PowerUp'] . "></br>

				Take off: <input type='checkbox' name='TakeOff' value='1' " . $checked['TakeOff'] . "></br>

				Communication: <input type='checkbox' name='Communnication' value='1' " . $checked['Communication'] . "></br>

				Landing: <input type='checkbox' name='Landing' value='1' " . $checked['Landing'] . "></br>

				<input type='submit' name='update' value='Update'>

			</form>";

		}

	}

?>