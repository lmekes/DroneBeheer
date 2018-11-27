<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn){

		$query = "UPDATE MaintenanceLog SET

		NaamStudent='" . $_POST['naamstudent'] . "',

		Datum='" . $_POST['datum'] . "',

		Reason='" . $_POST['reason'] . "',

		WorkDone='" . $_POST['workdone'] . "',

		PartsReplaced='" . $_POST['partsreplaced'] . "',

		SystemTested='" . $_POST['systemtested'] . "',

		Notes='" . $_POST['notes'] . "'

		WHERE Id='" . $_POST['id'] . "'";

		$Conn->query($query);

	}

	if(isset($_POST['update'])){

		updateForm($Conn);

	}

	function getForm($studentName, $Conn){

		$result = $Conn->query("SELECT * FROM MaintenanceLog WHERE NaamStudent = '" . $studentName . "'");

		while ($data = $result->fetch_assoc()) {

			echo "<form action='' method='post'>

				<input type='hidden' name='id' value='" . $data['Id'] . "'>

				<input type='text' name='naamstudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' name='datum' value='" . $data['Datum'] ."'></br>

				<input type='text' name='reason' value='" . $data['Reason'] . "'></br>

				<input type='text' name='workdone' value='" . $data['WorkDone'] . "'></br>

				<input type='text' name='partsreplaced' value='" . $data['PartsReplaced'] . "'></br>

				<input type='text' name='systemtested' value='" . $data['SystemTested'] . "'></br>

				<input type='text' name='notes' value='" . $data['Notes'] . "'></br>

				<input type='submit' name='update' value='Update'>

			</form>";

		}

	}

?>