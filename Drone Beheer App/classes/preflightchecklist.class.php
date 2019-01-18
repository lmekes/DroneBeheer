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

			echo "<form class='form-horizontal' action='' method='post'>

				<input type='hidden' name='Id' value='" . $data['Id'] . "'>

				<input type='text' class='form-control' name='NaamStudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' class='form-control' name='Datum' value='" . $data['Datum'] ."'></br>

				<table class='table table-striped'>

				<tr><td>Airframe: <input type='checkbox' name='Airframe' value='1' " . $checked['Airframe'] . "></tr></td>

				<tr><td>Flight battery: <input type='checkbox' name='FlightBattery' value='1' " . $checked['FlightBattery'] . "></tr></td>

				<tr><td>Transmitter(s): <input type='checkbox' name='Transmitters' value='1' " . $checked['Transmitters'] . "></tr></td>

				<tr><td>Camera: <input type='checkbox' name='camera' value='1' " . $checked['Camera'] . "></tr></td>

				<tr><td>Airframe: <input type='checkbox' name='Airframelevel' value='1' " . $checked['AirframeLevel'] . "></tr></td>

				<tr><td>Flight battery: <input type='checkbox' name='Connectbattery' value='1' " . $checked['ConnectBattery'] . "></tr></td>

				<tr><td>Self diagnostic: <input type='checkbox' name='SelfDiagnostic' value='1' " . $checked['SelfDiagnostic'] . "></tr></td>

				<tr><td>Monitor: <input type='checkbox' name='Monitor' value='1' " . $checked['Monitor'] . "></tr></td>

				<tr><td>Calibration: <input type='checkbox' name='Calibration' value='1' " . $checked['Calibration'] . "></tr></td>

				<tr><td>Save calibration: <input type='checkbox' name='SaveCalibration' value='1' " . $checked['SaveCalibration'] . "></tr></td>

				<tr><td>Camera platform: <input type='checkbox' name='CameraPlatform' value='1' " . $checked['CameraPlatform'] . "></tr></td>

				<tr><td>Telemetry link: <input type='checkbox' name='TelemetryLink' value='1' " . $checked['TelemetryLink'] . "></tr></td>

				<tr><td>Flight plan: <input type='checkbox' name='FlightPlan' value='1' " . $checked['FlightPlan'] . "></tr></td>

				<tr><td>Camera: <input type='checkbox' name='StartRecording' value='1' " . $checked['StartRecording'] . "></tr></td>

				<tr><td>Aircraft alignment: <input type='checkbox' name='AircraftAlignment' value='1' " . $checked['AircraftAlignment'] . "></tr></td>

				<tr><td>Crew, public & client: <input type='checkbox' name='Crew' value='1' " . $checked['Crew'] . "></tr></td>

				<tr><td>Clearance: <input type='checkbox' name='Clearance' value='1' " . $checked['Clearance'] . "></tr></td>

				<tr><td>Power up: <input type='checkbox' name='PowerUp' value='1' " . $checked['PowerUp'] . "></tr></td>

				<tr><td>Take off: <input type='checkbox' name='TakeOff' value='1' " . $checked['TakeOff'] . "></tr></td>

				<tr><td>Communication: <input type='checkbox' name='Communnication' value='1' " . $checked['Communication'] . "></tr></td>

				<tr><td>Landing: <input type='checkbox' name='Landing' value='1' " . $checked['Landing'] . "></tr></td>

				</table>

				<input type='submit' class='btn btn-primary' name='update' value='Update'>

			</form>";

		}

	}

?>