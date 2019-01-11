<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn, $studentName){

		$queryString = "UPDATE IncidentLog SET NaamStudent = '" . $_POST['NaamStudent'] . "'";

		// This query to get all the database names for the foreach later
		$result = $Conn->query("SELECT * FROM IncidentLog WHERE NaamStudent = '" . $studentName . "'");
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

		$result = $Conn->query("SELECT * FROM IncidentLog WHERE NaamStudent = '" . $studentName . "'");

		while ($data = $result->fetch_assoc()) {

			echo "<form class='form-horizontal' action='' method='post'>

				<input type='hidden' name='Id' value='" . $data['Id'] . "'>

				<input type='text' class='form-control' name='NaamStudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' class='form-control' name='Datum' value='" . $data['Datum'] ."'></br>

				<input type='text' class='form-control' name='IncidentTime' value='" . $data['IncidentTime'] . "'></br>

				<input type='text' class='form-control' name='Damage' value='" . $data['Damage'] . "'></br>

				<input type='text' class='form-control' name='Details' value='" . $data['Details'] . "'></br>

				<input type='text' class='form-control' name='ActionTaken' value='" . $data['ActionTaken'] . "'></br>

				<input type='text' class='form-control' name='Notes' value='" . $data['Notes'] . "'></br>

				<input type='submit' class='btn btn-primary' name='update' value='Update'>

			</form>";

		}

	}

?>