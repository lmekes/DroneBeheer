<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn){

		$query = "UPDATE FlightLog SET

		NaamStudent='" . $_POST['naamstudent'] . "',

		Datum='" . $_POST['datum'] . "',

		TakeOffTime='" . $_POST['takeofftime'] . "',

		LandingTime='" . $_POST['landingtime'] . "',

		Duration='" . $_POST['duration'] . "',

		Aircraft='" . $_POST['aircraft'] . "',

		AircraftSystem='" . $_POST['aircraftsystem'] . "',

		BatteryNo='" . $_POST['batteryno'] . "',

		Pilot='" . $_POST['pilot'] . "',

		Observer='" . $_POST['observer'] . "',

		PayloadOperator='" . $_POST['payloadoperator'] . "',

		Location='" . $_POST['location'] . "',

		FlightPurpose='" . $_POST['flightpurpose'] . "',

		Comment='" . $_POST['comment'] . "'

		WHERE Id='" . $_POST['id'] . "'";

		$Conn->query($query);

	}

	if(isset($_POST['update'])){

		updateForm($Conn);

	}

	function getForm($studentName, $Conn){

		$result = $Conn->query("SELECT * FROM FlightLog WHERE NaamStudent = '" . $studentName . "'");

		while ($data = $result->fetch_assoc()) {

			echo "<form action='' method='post'>

				<input type='hidden' name='id' value='" . $data['Id'] . "'>

				<input type='text' name='naamstudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' name='datum' value='" . $data['Datum'] ."'></br>

				<input type='text' name='takeofftime' value='" . $data['TakeOffTime'] . "'></br>

				<input type='text' name='landingtime' value='" . $data['LandingTime'] . "'></br>

				<input type='text' name='duration' value='" . $data['Duration'] . "'></br>

				<input type='text' name='aircraft' value='" . $data['Aircraft'] . "'></br>

				<input type='text' name='aircraftsystem' value='" . $data['AircraftSystem'] . "'></br>

				<input type='text' name='batteryno' value='" . $data['BatteryNo'] . "'></br>

				<input type='text' name='pilot' value='" . $data['Pilot'] . "'></br>

				<input type='text' name='observer' value='" . $data['Observer'] . "'></br>

				<input type='text' name='payloadoperator' value='" . $data['PayloadOperator'] . "'></br>

				<input type='text' name='location' value='" . $data['Location'] . "'></br>

				<input type='text' name='flightpurpose' value='" . $data['FlightPurpose'] . "'></br>

				<input type='text' name='comment' value='" . $data['Comment'] . "'></br>

				<input type='submit' name='update' value='Update'>

			</form>";

		}

	}

?>