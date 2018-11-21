<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn){

	}

	if(isset($_POST['update'])){

		updateForm($Conn);

	}

	function getForm($studentName, $Conn){

		$result = $Conn->query("SELECT * FROM OperationFlightPlan WHERE NaamStudent = '" . $studentName . "'");

		while ($data = $result->fetch_assoc()) {

			echo "<form action='' method='post'>

				<input type='hidden' name='id' value='" . $data['Id'] . "'>

				<input type='text' name='naamstudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' name='datum' value='" . $data['Datum'] ."'></br>

				<input type='text' name='jobno' value='" . $data[''] . "'></br>

				<input type='text' name='version' value='" . $data[''] . "'></br>

				<input type='text' name='pilot' value='" . $data[''] . "'></br>

				<input type='text' name='observer' value='" . $data[''] . "'></br>

				<input type='text' name='payloadoperator' value='" . $data[''] . "'></br>

				<input type='text' name='helper' value='" . $data[''] . "'></br>

				<input type='text' name='address' value='" . $data[''] . "'></br>

				<input type='text' name='latitude' value='" . $data[''] . "'></br>

				<input type='text' name='elevation' value='" . $data[''] . "'></br>

				<input type='text' name='vehicularaccess' value='" . $data[''] . "'></br>

				<input type='text' name='flightpurpose' value='" . $data[''] . "'></br>

				<input type='text' name='operationtype' value='" . $data[''] . "'></br>

				<input type='text' name='dateworkrequired' value='" . $data[''] . "'></br>

				<input type='text' name='missionduration' value='" . $data[''] . "'></br>

				<input type='text' name='cruisingaltitude' value='" . $data[''] . "'></br>

				<input type='text' name='maxaltitude' value='" . $data[''] . "'></br>

				<input type='text' name='maxdistance' value='" . $data[''] . "'></br>

				<input type='text' name='satellitepic' value='" . $data[''] . "'></br>

				<input type='text' name='bagviewerpic' value='" . $data[''] . "'></br>

				<input type='text' name='crewposition' value='" . $data[''] . "'></br>

				<input type='text' name='flightbox' value='" . $data[''] . "'></br>

				<input type='text' name='altlandingsites' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='text' name='' value='" . $data[''] . "'></br>

				<input type='submit' name='update' value='Update'>

			</form>";

		}

	}

?>