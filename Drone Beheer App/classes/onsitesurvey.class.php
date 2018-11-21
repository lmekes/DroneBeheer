<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn){

		$query = "UPDATE OnSiteSurvey SET

		NaamStudent='" . $_POST['naamstudent'] . "',

		Datum='" . $_POST['datum'] . "',

		Pilot='" . $_POST['pilot'] . "',

		Observer='" . $_POST['observer']. "',

		WindSpeed='" . $_POST['windspeed'] . "',

		Direction='" . $_POST['direction'] . "',

		Obsctruction='" . $_POST['obsctruction'] . "',

		ViewLimitations='" . $_POST['viewlimitations'] . "',

		People='" . $_POST['people'] . "',

		Livestock='" . $_POST['livestock'] . "',

		Temperature='" . $_POST['temperature'] . "',

		Visibility='" . $_POST['visibility'] . "',

		Surface='" . $_POST['surface'] . "',

		Permission='" . $_POST['permission'] . "',

		Public='" . $_POST['public'] . "',

		AirTraffic='" . $_POST['airtraffic'] . "',

		Communication='" . $_POST['communication'] ."',

		Proximity='" . $_POST['proximity'] . "',

		TakeOffArea='" . $_POST['takeoffarea'] . "',

		LandingArea='" . $_POST['landingarea'] . "',

		OperationalZone='" . $_POST['operationalzone'] . "',

		EmergencyZone='" . $_POST['emergencyzone'] . "',

		Holding Area='" . $_POST['holdingarea'] . "'

		WHERE Id='" . $_POST['id'] . "'";

		$Conn->query($query);

	}

	if(isset($_POST['update'])){

		updateForm($Conn);

	}

	function getForm($studentName, $Conn){

		$result = $Conn->query("SELECT * FROM OnSiteSurvey WHERE NaamStudent = '" . $studentName . "'");

		while ($data = $result->fetch_assoc()) {

			echo "<form action='' method='post'>

				<input type='hidden' name='id' value='" . $data['Id'] . "'>

				<input type='text' name='naamstudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' name='datum' value='" . $data['Datum'] ."'></br>

				<input type='text' name='pilot' value='" . $data['Pilot'] . "'></br>

				<input type='text' name='observer' value='" . $data['Observer'] . "'></br>

				<input type='text' name='windspeed' value='" . $data['WindSpeed'] . "'></br>

				<input type='text' name='direction' value='" . $data['Direction'] . "'></br>

				<input type='text' name='obsctruction' value='" . $data['Obsctruction'] . "'></br>

				<input type='text' name='viewlimitations' value='" . $data['ViewLimitations'] . "'></br>

				<input type='text' name='people' value='" . $data['People'] . "'></br>

				<input type='text' name='livestock' value='" . $data['Livestock'] . "'></br>

				<input type='text' name='temperature' value='" . $data['Temperature'] . "'></br>

				<input type='text' name='visibility' value='" . $data['Visibility'] . "'></br>

				<input type='text' name='surface' value='" . $data['Surface'] . "'></br>

				<input type='text' name='permission' value='" . $data['Permission'] . "'></br>

				<input type='text' name='public' value='" . $data['Public'] . "'></br>

				<input type='text' name='airtraffic' value='" . $data['AirTraffic'] . "'></br>

				<input type='text' name='communication' value='" . $data['Communication'] . "'></br>

				<input type='text' name='proximity' value='" . $data['Proximity'] . "'></br>

				<input type='text' name='takeoffarea' value='" . $data['TakeOffArea'] . "'></br>

				<input type='text' name='landingarea' value='" . $data['LandingArea'] . "'></br>

				<input type='text' name='operationalzone' value='" . $data['OperationalZone'] . "'></br>

				<input type='text' name='emergencyzone' value='" . $data['ErmegencyZone'] . "'></br>

				<input type='text' name='holdingarea' value='" . $data['Holding Area'] . "'></br>

				<input type='submit' name='update' value='Update'>

			</form>";

		}

	}

?>