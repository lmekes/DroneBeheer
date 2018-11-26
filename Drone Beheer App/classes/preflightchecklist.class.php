<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn){

		$query="UPDATE PreFlightChecklist SET

		WHERE Id='" . $_POST['id'] . "'";

		$Conn->query($query);

	}

	if(isset($_POST['update'])){

		updateForm($Conn);

	}

	function getForm($studentName, $Conn){

		echo "<form action='' method='post'>

			<input type='hidden' name='id' value='" . $data['Id'] . "'>

			<input type='text' name='naamstudent' value='" . $data['NaamStudent'] . "'></br>

			<input type='date' name='datum' value='" . $data['Datum'] ."'></br>

			Airframe: <input type='checkbox' name='airframe' value='" . $data['Airframe'] . "'>

			Flight battery: <input type='checkbox' name='flightbattery' value='" . $data['FlightBattery'] . "'>

			Transmitter(s): <input type='checkbox' name='transmitters' value='" . $data['Transmitters'] . "'>

			Camera: <input type='checkbox' name='camera' value='" . $data['Camera'] . "'>

			Self diagnostic: <input type='checkbox' name='selfdiagnostic' value='" . $data['SelfDaignostic'] . "'>

			Monitor: <input type='checkbox' name='monitorcalibration' value='" . $data['MonitorCalibration'] . "'>

			Save calibration: <input type='checkbox' name='savecalibration' value='" . $data['SaveCalibration'] . "'>

			Telemetry link: <input type='checkbox' name='telemetrylink' value='" . $data['TelemetryLink'] . "'>

			Flight plan: <input type='checkbox' name='flightplan' value='" . $data['FlightPlan'] . "'>

			Aircraft alignment: <input type='checkbox' name='aircraftaligntment' value='" . $data['AircarftAlignment'] . "'>

			Crew, public & client: <input type='checkbox' name='crew' value='" . $data['Crew'] . "'>

			Clearance: <input type='checkbox' name='clearance' value='" . $data['Clearance'] . "'>

			Power up: <input type='checkbox' name='powerup' value='" . $data['PowerUp'] . "'>

			Take off: <input type='checkbox' name='takeoff' value='" . $data['TakeOff'] . "'>

			Communication: <input type='checkbox' name='communnication' value='" . $data['Communication'] . "'>

			Landing: <input type='checkbox' name='' value='" . $data['Landing'] . "'>

			<input type='submit' name='update' value='Update'>

		</form>";

	}

?>