<?php

	include_once '../functions/dbConnection.php';

	if ($Conn->connect_error) {
	   die("Connection failed: " . $Conn->connect_error);
	}else{
		echo "Connected successfully";
	}
	  
	if(isset($_POST['check']) && $_POST['check'] === 'pizza'){
		$_POST['naamStudent'];
		$_POST['datum'];
		$_POST['incidentTime'];
		$_POST['damage'];
		$_POST['details'];
		$_POST['actionTaken'];
		$_POST['notes'];

		$query = "INSERT INTO IncidentLog(NaamStudent, Datum, IncidentTime, Damage, Details, ActionTaken, Notes) VALUES('" . $_POST['naamStudent'] . "', '" . $_POST['datum'] . "', '" . $_POST['incidentTime'] . "', '" . $_POST['damage'] . "', '" . $_POST['details'] . "', '" . $_POST['actionTaken'] . "', '" . $_POST['notes'] . "')";
		$result = $Conn->query($query);
		if($result){
			echo "Gelukt! :{D";
		}else{
			echo "Mislukt! >:3";
		}
	}

?>


<form method='POST'>
	<input type='password' name='check' value='pizza'/>
	<input type='text' name='naamStudent'/>
	<input type='date' name='datum'/>
	<input type='text' name='incidentTime'/>
	<input type='text' name='damage'/>
	<input type='text' name='details'/>
	<input type='text' name='actionTaken'/>
	<input type='text' name='notes'/>
	<input type='submit' name='submit'/>
</form>