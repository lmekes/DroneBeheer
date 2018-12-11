<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn, $studentName){

		$queryString = "UPDATE OnSiteSurvey SET NaamStudent = '" . $_POST['NaamStudent'] . "'";

		// This query to get all the database names for the foreach later
		$result = $Conn->query("SELECT * FROM OnSiteSurvey WHERE NaamStudent = '" . $studentName . "'");
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

		$result = $Conn->query("SELECT * FROM OnSiteSurvey WHERE NaamStudent = '" . $studentName . "'");

		while ($data = $result->fetch_assoc()) {

			echo "<form action='' method='post'>

				<input type='hidden' name='Id' value='" . $data['Id'] . "'>

				<input type='text' name='NaamStudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' name='Datum' value='" . $data['Datum'] ."'></br>

				<input type='text' name='Pilot' value='" . $data['Pilot'] . "'></br>

				<input type='text' name='Observer' value='" . $data['Observer'] . "'></br>

				<input type='text' name='WindSpeed' value='" . $data['WindSpeed'] . "'></br>

				<input type='text' name='Direction' value='" . $data['Direction'] . "'></br>

				<input type='text' name='Obstruction' value='" . $data['Obstruction'] . "'></br>

				<input type='text' name='ViewLimitations' value='" . $data['ViewLimitations'] . "'></br>

				<input type='text' name='People' value='" . $data['People'] . "'></br>

				<input type='text' name='Livestock' value='" . $data['Livestock'] . "'></br>

				<input type='text' name='Temperature' value='" . $data['Temperature'] . "'></br>

				<input type='text' name='Visibility' value='" . $data['Visibility'] . "'></br>

				<input type='text' name='Surface' value='" . $data['Surface'] . "'></br>

				<input type='text' name='Permission' value='" . $data['Permission'] . "'></br>

				<input type='text' name='Public' value='" . $data['Public'] . "'></br>

				<input type='text' name='AirTraffic' value='" . $data['AirTraffic'] . "'></br>

				<input type='text' name='Communication' value='" . $data['Communication'] . "'></br>

				<input type='text' name='Proximity' value='" . $data['Proximity'] . "'></br>

				<input type='text' name='TakeOffArea' value='" . $data['TakeOffArea'] . "'></br>

				<input type='text' name='LandingArea' value='" . $data['LandingArea'] . "'></br>

				<input type='text' name='OperationalZone' value='" . $data['OperationalZone'] . "'></br>

				<input type='text' name='EmergencyArea' value='" . $data['EmergencyArea'] . "'></br>

				<input type='text' name='HoldingArea' value='" . $data['HoldingArea'] . "'></br>

				<input type='submit' name='update' value='Update'>

			</form>";

		}

	}

?>