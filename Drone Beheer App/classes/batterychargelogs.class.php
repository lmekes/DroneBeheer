<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn){

		$query = "UPDATE BatteryChargeLogs SET

		NaamStudent='" . $_POST['naamstudent'] . "',

		Datum='" . $_POST['datum'] . "', 

		BatteryNo='" . $_POST['batteryno'] . "', 

		BatteryResidual='" . $_POST['batteryresidual'] . "', 

		ChargeDate='" . $_POST['chargedate'] . "', 

		ChargeInput='" . $_POST['chargeinput'] . "', 

		FlightDuration='" . $_POST['flightduration'] . "', 

		PreFlight='" . $_POST['preflight'] . "',  

		Notes='" . $_POST['notes'] . "' 

		WHERE Id='" . $_POST['id'] . "'";

		$Conn->query($query);

	}

	if(isset($_POST['update'])){

		updateForm($Conn);

	}

	function getForm($studentName, $Conn){

		$result = $Conn->query("SELECT * FROM BatteryChargeLogs WHERE NaamStudent = '" . $studentName . "'");

		while ($data = $result->fetch_assoc()) {
				
			echo "<form action='' method='post'>

				<input type='hidden' name='id' value='" . $data['Id'] . "'>

				<input type='text' name='naamstudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' name='datum' value='" . $data['Datum'] ."'></br>

				<input type='text' name='batteryno' value='" . $data['BatteryNo'] . "'></br>

				<input type='text' name='batteryresidual' value='" . $data['BatteryResidual'] . "'></br>

				<input type='text' name='chargedate' value='" . $data['ChargeDate'] . "'></br>

				<input type='text' name='chargeinput' value='" . $data['ChargeInput'] . "'></br>

				<input type='text' name='flightduration' value='" . $data['FlightDuration'] . "'></br>

				<input type='text' name='preflight' value='" . $data['PreFlight'] . "'></br>

				<input type='text' name='notes' value='" . $data['Notes'] . "'></br>

				<input type='submit' name='update' value='Update'>

			</form>";

		}

	}	

?>