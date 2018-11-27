<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn){

		$query = "UPDATE PostFlightChecklist SET

		NaamStudent='" . $_POST['naamstudent'] . "', 

		Datum='" . $_POST['datum'] . "',

		Touchdown='" . $_POST['touchdown'] . "',

		PowerDown='" . $_POST['powerdown'] . "',

		Removal='" . $_POST['removal'] . "',

		DataRecording='" . $_POST['datarecording'] . "',

		Transmitter='" . $_POST['transmitter'] . "',

		Camera='" . $_POST['camera'] . "',

		Airframe='" . $_POST['airframe'] . "',

		Battery='" . $_POST['battery'] . "',

		MemoryCard='" . $_POST['memorycard'] . "',

		Review ='" . $_POST['review'] . "'

		WHERE Id='" . $_POST['id'] . "'";

		$Conn->query($query);

	}

	if(isset($_POST['update'])){

		updateForm($Conn);

	}

	function getForm($studentName, $Conn){

		$result = $Conn->query("SELECT * FROM PostFlightChecklist WHERE NaamStudent = '" . $studentName . "'");

		while ($data = $result->fetch_assoc()) {

			echo "<form action='' method='post'>

				<input type='hidden' name='id' value='" . $data['Id'] . "'>

				<input type='text' name='naamstudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' name='datum' value='" . $data['Datum'] ."'></br>

				Touchdown: <input type='checkbox' name='touchdown' value='" . $data['Touchdown'] . "'></br>

				Power down: <input type='checkbox' name='powerdown' value='" . $data['PowerDown'] . "'></br>

				Removal: <input type='checkbox' name='removal' value='" . $data['Removal'] . "'></br>

				Data recording: <input type='checkbox' name='datarecording' value='" . $data['DataRecording'] . "'></br>

				Transmitter: <input type='checkbox' name='transmitter' value='" . $data['Transmitter'] . "'></br>

				Camera: <input type='checkbox' name='camera' value='" . $data['Camera'] . "'></br>

				Airframe: <input type='checkbox' name='airframe' value='" . $data['Airframe'] . "'></br>

				Battery: <input type='checkbox' name='battery' value='" . $data['Battery'] . "'></br>

				Memory card: <input type='checkbox' name='memorycard' value='" . $data['MemoryCard'] . "'></br>

				Review: <input type='checkbox' name='review' value='" . $data['Review'] . "'></br>

				<input type='submit' name='update' value='Update'>

			</form>";

		}

	}

?>