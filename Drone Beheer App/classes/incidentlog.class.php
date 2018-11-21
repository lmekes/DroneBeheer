<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn){

		$query = "UPDATE IncidentLog SET

		NaamStudent='" . $_POST['naamstudent'] . "',

		Datum='" . $_POST['datum'] . "',

		IncidentTime='" . $_POST['incidenttime'] . "',

		Damage='" . $_POST['damage'] . "',

		Details='" . $_POST['details'] . "',

		ActionTaken='" . $_POST['actiontaken'] . "',

		Notes='" . $_POST['notes'] . "'

		WHERE Id='" . $_POST['id'] . "'";

		$Conn->query($query);

	}

	if(isset($_POST['update'])){

		updateForm($Conn);

	}

	function getForm($studentName, $Conn){

		$result = $Conn->query("SELECT * FROM IncidentLog WHERE NaamStudent = '" . $studentName . "'");

		while ($data = $result->fetch_assoc()) {

			echo "<form action='' method='post'>

				<input type='hidden' name='id' value='" . $data['Id'] . "'>

				<input type='text' name='naamstudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' name='datum' value='" . $data['Datum'] ."'></br>

				<input type='text' name='incidenttime' value='" . $data['IncidentTime'] . "'></br>

				<input type='text' name='damage' value='" . $data['Damage'] . "'></br>

				<input type='text' name='details' value='" . $data['Details'] . "'></br>

				<input type='text' name='actiontaken' value='" . $data['ActionTaken'] . "'></br>

				<input type='text' name='notes' value='" . $data['Notes'] . "'></br>

				<input type='submit' name='update' value='Update'>

			</form>";

		}

	}

?>