<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn){

	}

	if(isset($_POST['update'])){

		updateForm($Conn);

	}

	function getForm($studentName, $Conn){

		$result = $Conn->query("SELECT * FROM EmbarkationChecklist WHERE NaamStudent = '" . $studentName . "'");

		while ($data = $result->fetch_assoc()) {

			echo "<form action='' method='post'>

				<input type='hidden' name='id' value='" . $data['Id'] . "'>

				<input type='text' name='naamstudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' name='datum' value='" . $data['Datum'] ."'></br>

				<input type='checkbox' name='groundstation' value='" . $data[''] . "'></br>

				<input type='checkbox' name='cameramonitor' value='" . $data[''] . "'></br>

				<input type='checkbox' name='receiver' value='" . $data[''] . "'></br>

				<input type='checkbox' name='telemetryreceiver' value='" . $data[''] . "'></br>

				<input type='checkbox' name='laptop' value='" . $data[''] . "'></br>

				<input type='checkbox' name='mobilephone' value='" . $data[''] . "'></br>

				<input type='checkbox' name='anemometer' value='" . $data[''] . "'></br>

				<input type='checkbox' name='firstaid' value='" . $data[''] . "'></br>

				<input type='checkbox' name='hardhat' value='" . $data[''] . "'></br>

				<input type='checkbox' name='radio' value='" . $data[''] . "'></br>

				<input type='checkbox' name='clothing' value='" . $data[''] . "'></br>

				<input type='checkbox' name='airnavigationmap' value='" . $data[''] . "'></br>

				<input type='checkbox' name='checklist' value='" . $data[''] . "'></br>

				<input type='checkbox' name='notepad' value='" . $data[''] . "'></br>

				<input type='checkbox' name='siteassessment' value='" . $data[''] . "'></br>

				<input type='checkbox' name='signs' value='" . $data[''] . "'></br>

				<input type='checkbox' name='flightbattery' value='" . $data[''] . "'></br>

				<input type='checkbox' name='transmitterbattery' value='" . $data[''] . "'></br>

				<input type='checkbox' name='camerabattery' value='" . $data[''] . "'></br>

				<input type='checkbox' name='stationbattery' value='" . $data[''] . "'></br>

				<input type='checkbox' name='chargerbattery' value='" . $data[''] . "'></br>

				<input type='checkbox' name='phonebattery' value='" . $data[''] . "'></br>

				<input type='checkbox' name='airframe' value='" . $data[''] . "'></br>

				<input type='checkbox' name='cameramount' value='" . $data[''] . "'></br>

				<input type='checkbox' name='calibrationplatform' value='" . $data[''] . "'></br>

				<input type='checkbox' name='cameralens' value='" . $data[''] . "'></br>

				<input type='checkbox' name='cameraconnection' value='" . $data[''] . "'></br>

				<input type='checkbox' name='cameramemory' value='" . $data[''] . "'></br>

				<input type='checkbox' name='cameralanyard' value='" . $data[''] . "'></br>

				<input type='checkbox' name='attachmentbolt' value='" . $data[''] . "'></br>

				<input type='checkbox' name='multifunctioncharger' value='" . $data[''] . "'></br>

				<input type='checkbox' name='requiredcharger' value='" . $data[''] . "'></br>

				<input type='checkbox' name='batterychecker' value='" . $data[''] . "'></br>

				<input type='checkbox' name='screwdrivers' value='" . $data[''] . "'></br>

				<input type='checkbox' name='allenkeys' value='" . $data[''] . "'></br>

				<input type='checkbox' name='pliers' value='" . $data[''] . "'></br>

				<input type='checkbox' name='cableties' value='" . $data[''] . "'></br>

				<input type='checkbox' name='sidecutters' value='" . $data[''] . "'></br>

				<input type='checkbox' name='propellernuts' value='" . $data[''] . "'></br>

				<input type='checkbox' name='spareprops' value='" . $data[''] . "'></br>

				<input type='checkbox' name='socketset' value='" . $data[''] . "'></br>

				<input type='submit' name='update' value='Update'>

			</form>";

		}

	}

?>