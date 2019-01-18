<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn, $studentName){

		$queryString = "UPDATE ArrivalChecklist SET NaamStudent = '" . $_POST['NaamStudent'] . "'";

		// This query to get all the database names for the foreach later
		$result = $Conn->query("SELECT * FROM ArrivalChecklist WHERE NaamStudent = '" . $studentName . "'");
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

		$result = $Conn->query("SELECT * FROM ArrivalChecklist WHERE NaamStudent = '" . $studentName . "'");

		while ($data = $result->fetch_assoc()) {

			foreach($data AS $key => $value){
				if($value && $key){
					$checked[$key] = "checked";
				}else{
					$checked[$key] = "";
				}
			}
				
			echo "<form class='form-horizontal' action='' method='post'>

				<input type='hidden' name='Id' value='" . $data['Id'] . "'>

				<input type='text' class='form-control' name='NaamStudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' class='form-control' name='Datum' value='" . $data['Datum'] ."'></br>

				<table class='table table-striped'>

				<tr><td>Site survey: <input type='checkbox' name='SiteSurvey' value='1' " . $checked['SiteSurvey'] . "></tr></td>
				
				<tr><td>Flight plan: <input type='checkbox' name='Flightplan' value='1' " . $checked['FlightPlan'] . "></tr></td>
				
				<tr><td>Airframe: <input type='checkbox' name='Airframe' value='1' " . $checked['Airframe'] . "></tr></td>
				
				<tr><td>Camera: <input type='checkbox' name='Camera' value='1' " . $checked['Camera'] . "></tr></td>
				
				<tr><td>Connections: <input type='checkbox' name='Connections' value='1' " . $checked['Connections'] . "></tr></td>
				
				<tr><td>Propellers: <input type='checkbox' name='Propellers' value='1' " . $checked['Propellers'] . "></tr></td>
				
				<tr><td>Calibration platform: <input type='checkbox' name='CalibrationPlatform' value='1' " . $checked['CalibrationPlatform'] . "></tr></td>
				
				<tr><td>Ground station: <input type='checkbox' name='GroundStation' value='1' " . $checked['GroundStation'] . "></tr></td>
				
				<tr><td>Monitor: <input type='checkbox' name='Monitor' value='1' " . $checked['Monitor'] . "></tr></td>
				
				<tr><td>Crew id badges: <input type='checkbox' name='CrewIdBadges' value='1' " . $checked['CrewIdBadges'] . "></tr></td>
				
				<tr><td>Hard hat: <input type='checkbox' name='HardHat' value='1' " . $checked['HardHat'] . "></tr></td>
				
				<tr><td>Radio: <input type='checkbox' name='Radio' value='1' " . $checked['Radio'] . "></tr></td>
				
				<tr><td>First aid: <input type='checkbox' name='FirstAid' value='1' " . $checked['FirstAid'] . "></tr></td>
				
				<tr><td>Extinguisher: <input type='checkbox' name='Extinguisher' value='1' " . $checked['Extinguisher'] . "></tr></td>
				
				<tr><td>Signs: <input type='checkbox' name='Signs' value='1' " . $checked['Signs'] . "></tr></td>

				</table>

				<input type='submit' class='btn btn-primary' name='update' value='Update'>

			</form>";

		}

	}

?>