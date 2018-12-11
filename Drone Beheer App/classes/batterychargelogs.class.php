<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn, $studentName){

		$queryString = "UPDATE BatteryChargeLogs SET NaamStudent = '" . $_POST['NaamStudent'] . "'";

		// This query to get all the database names for the foreach later
		$result = $Conn->query("SELECT * FROM BatteryChargeLogs WHERE NaamStudent = '" . $studentName . "'");
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

		//echo $queryString;

		// echo "<br><pre>";

		// var_dump(array_keys($dataRows[0])); testing

		// echo "</pre>";

		$Conn->query($queryString);

	}

	if(isset($_POST['update'])){

		updateForm($Conn, $_GET['studentName']);

	}

	function getForm($studentName, $Conn){

		$result = $Conn->query("SELECT * FROM BatteryChargeLogs WHERE NaamStudent = '" . $studentName . "'");

		while ($data = $result->fetch_assoc()) {
				
			echo "<form action='' method='post'>

				<input type='hidden' name='Id' value='" . $data['Id'] . "'>

				<input type='text' name='NaamStudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' name='Datum' value='" . $data['Datum'] ."'></br>

				<input type='text' name='BatteryNo' value='" . $data['BatteryNo'] . "'></br>

				<input type='text' name='BatteryResidual' value='" . $data['BatteryResidual'] . "'></br>

				<input type='text' name='ChargeDate' value='" . $data['ChargeDate'] . "'></br>

				<input type='text' name='ChargeInput' value='" . $data['ChargeInput'] . "'></br>

				<input type='text' name='FlightDuration' value='" . $data['FlightDuration'] . "'></br>

				<input type='text' name='PreFlight' value='" . $data['PreFlight'] . "'></br>

				<input type='text' name='Notes' value='" . $data['Notes'] . "'></br>

				<input type='submit' name='update' value='Update'>

			</form>";

		}

	}	

?>