<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn, $studentName){

		$queryString = "UPDATE FlightLog SET NaamStudent = '" . $_POST['NaamStudent'] . "'";

		// This query to get all the database names for the foreach later
		$result = $Conn->query("SELECT * FROM FlightLog WHERE NaamStudent = '" . $studentName . "'");
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

		$result = $Conn->query("SELECT * FROM FlightLog WHERE NaamStudent = '" . $studentName . "'");

		while ($data = $result->fetch_assoc()) {

			echo "<form action='' method='post'>

				<input type='hidden' name='Id' value='" . $data['Id'] . "'>

				<input type='text' name='NaamStudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' name='Datum' value='" . $data['Datum'] ."'></br>

				<input type='text' name='TakeOffTime' value='" . $data['TakeOffTime'] . "'></br>

				<input type='text' name='LandingTime' value='" . $data['LandingTime'] . "'></br>

				<input type='text' name='Duration' value='" . $data['Duration'] . "'></br>

				<input type='text' name='Aircraft' value='" . $data['Aircraft'] . "'></br>

				<input type='text' name='AircraftSystem' value='" . $data['AircraftSystem'] . "'></br>

				<input type='text' name='BatteryNo' value='" . $data['BatteryNo'] . "'></br>

				<input type='text' name='Pilot' value='" . $data['Pilot'] . "'></br>

				<input type='text' name='Observer' value='" . $data['Observer'] . "'></br>

				<input type='text' name='PayloadOperator' value='" . $data['PayloadOperator'] . "'></br>

				<input type='text' name='Location' value='" . $data['Location'] . "'></br>

				<input type='text' name='FlightPurpose' value='" . $data['FlightPurpose'] . "'></br>

				<input type='text' name='Comment' value='" . $data['Comment'] . "'></br>

				<input type='submit' name='update' value='Update'>

			</form>";

		}

	}

?>