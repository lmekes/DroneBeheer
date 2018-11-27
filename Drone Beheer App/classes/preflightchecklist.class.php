<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn){

		$query="UPDATE PreFlightChecklist SET

		NaamStudent='" . $_POST['naamstudent'] . "', 

		Datum='" . $_POST['datum'] . "',

		Airframe='" . $_POST['airframe'] . "',

		FlightBattery='" . $_POST['flightbattery'] . "',

		Transmitters='" . $_POST['transmitters'] . "',

		Camera='" . $_POST['camera'] . "',

		AirframeLevel='" . $_POST['airframelevel'] . "',

		SelfDiagnostic='" . $_POST['selfdiagnostic'] . "',

		Monitor='" . $_POST['monitor'] . "',

		Calibration='" . $_POST['calibration'] . "',

		SaveCalibration='" . $_POST['savecalibration'] . "',

		CameraPlatform='" . $_POST['cameraplatform'] . "',

		TelemetryLink='" . $_POST['telemetrylink'] . "',

		FlightPlan='" . $_POST['flightplan'] . "',

		StartRecording='" . $_POST['startrecording'] . "',

		AircraftAlignment='" . $_POST['aircraftalignment'] . "',

		Crew='" . $_POST['crew'] . "',

		Clearance='" . $_POST['clearance'] . "',

		PowerUp='" . $_POST['powerup'] . "',

		TakeOff='" . $_POST['takeoff'] . "',

		Communication='" . $_POST['communnication'] . "',

		Landing='" . $_POST['landing'] . "' 

		WHERE Id='" . $_POST['id'] . "'";

		$Conn->query($query);

	}

	if(isset($_POST['update'])){

		updateForm($Conn);

	}

	function getForm($studentName, $Conn){

		$result = $Conn->query("SELECT * FROM PreFlightChecklist WHERE NaamStudent = '" . $studentName . "'");

		while ($data = $result->fetch_assoc()) {

			echo "<form action='' method='post'>

				<input type='hidden' name='id' value='" . $data['Id'] . "'>

				<input type='text' name='naamstudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' name='datum' value='" . $data['Datum'] ."'></br>

				Airframe: <input type='checkbox' name='airframe' value='" . $data['Airframe'] . "'></br>

				Flight battery: <input type='checkbox' name='flightbattery' value='" . $data['FlightBattery'] . "'></br>

				Transmitter(s): <input type='checkbox' name='transmitters' value='" . $data['Transmitters'] . "'></br>

				Camera: <input type='checkbox' name='camera' value='" . $data['Camera'] . "'></br>

				Airframe: <input type='checkbox' name='airframelevel' value='" . $data['AirframeLevel'] . "'></br>

				Flight battery: <input type='checkbox' name='connectbattery' value='" . $data['ConnectBattery'] . "'></br>

				Self diagnostic: <input type='checkbox' name='selfdiagnostic' value='" . $data['SelfDiagnostic'] . "'></br>

				Monitor: <input type='checkbox' name='monitor' value='" . $data['Monitor'] . "'></br>

				Calibration: <input type='checkbox' name='calibration' value='" . $data['Calibration'] . "'></br>

				Save calibration: <input type='checkbox' name='savecalibration' value='" . $data['SaveCalibration'] . "'></br>

				Camera platform: <input type='checkbox' name='cameraplatform' value='" . $data['CameraPlatform'] . "'></br>

				Telemetry link: <input type='checkbox' name='telemetrylink' value='" . $data['TelemetryLink'] . "'></br>

				Flight plan: <input type='checkbox' name='flightplan' value='" . $data['FlightPlan'] . "'></br>

				Camera: <input type='checkbox' name='startrecording' value='" . $data['StartRecording'] . "'></br>

				Aircraft alignment: <input type='checkbox' name='aircraftalignment' value='" . $data['AircraftAlignment'] . "'></br>

				Crew, public & client: <input type='checkbox' name='crew' value='" . $data['Crew'] . "'></br>

				Clearance: <input type='checkbox' name='clearance' value='" . $data['Clearance'] . "'></br>

				Power up: <input type='checkbox' name='powerup' value='" . $data['PowerUp'] . "'></br>

				Take off: <input type='checkbox' name='takeoff' value='" . $data['TakeOff'] . "'></br>

				Communication: <input type='checkbox' name='communnication' value='" . $data['Communication'] . "'></br>

				Landing: <input type='checkbox' name='' value='" . $data['Landing'] . "'></br>

				<input type='submit' name='update' value='Update'>

			</form>";

		}

	}

?>