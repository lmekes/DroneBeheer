<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn, $studentName){

		$queryString = "UPDATE PostFlightChecklist SET NaamStudent = '" . $_POST['NaamStudent'] . "'";

		// This query to get all the database names for the foreach later
		$result = $Conn->query("SELECT * FROM PostFlightChecklist WHERE NaamStudent = '" . $studentName . "'");
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

		// echo $queryString;

		// echo "<br><pre>";

		// var_dump(array_keys($dataRows[0])); testing

		// echo "</pre>";

		$Conn->query($queryString);

	}

	if(isset($_POST['update'])){

		updateForm($Conn, $_GET['studentName']);

	}

	function getForm($studentName, $Conn){

		$result = $Conn->query("SELECT * FROM PostFlightChecklist WHERE NaamStudent = '" . $studentName . "'");

		while ($data = $result->fetch_assoc()) {

			// foreach data fill the array with the key being it's own name to checked or empty
			foreach($data AS $key => $value){
				if($value && $key){
					$checked[$key] = "checked";
				}else{
					$checked[$key] = "";
				}
			}

			// echo "<pre>"; testing
			// var_dump($data);
			// echo "</pre>";

			echo "<form class='form-horizontal' action='' method='post'>

				<input type='hidden' name='Id' value='" . $data['Id'] . "'>

				<input type='text' class='form-control' name='NaamStudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' class='form-control' name='Datum' value='" . $data['Datum'] ."'></br>

				<table class='table table-striped'>

				<tr><td>Touchdown: <input type='checkbox' name='Touchdown' value='1' " . $checked['Touchdown'] . "></tr></td>

				<tr><td>Power down: <input type='checkbox' name='PowerDown' value='1' " . $checked['PowerDown'] . "></tr></td>

				<tr><td>Removal: <input type='checkbox' name='Removal' value='1' " . $checked['Removal'] . "></tr></td>

				<tr><td>Data recording: <input type='checkbox' name='DataRecording' value='1' " . $checked['DataRecording'] . "></tr></td>

				<tr><td>Transmitter: <input type='checkbox' name='Transmitter' value='1' " . $checked['Transmitter'] . "></tr></td>

				<tr><td>Camera: <input type='checkbox' name='Camera' value='1' " . $checked['Camera'] . "></tr></td>

				<tr><td>Airframe: <input type='checkbox' name='Airframe' value='1' " . $checked['Airframe'] . "></tr></td>

				<tr><td>Battery: <input type='checkbox' name='Battery' value='1' " . $checked['Battery'] . "></tr></td>

				<tr><td>Memory card: <input type='checkbox' name='MemoryCard' value='1' " . $checked['MemoryCard'] . "></tr></td>

				<tr><td>Review: <input type='checkbox' name='Review' value='1' " . $checked['Review'] . "></tr></td>

				</table>

				<input type='submit' class='btn btn-primary' name='update' value='Update'>

			</form>";

			
		}

	}

?>