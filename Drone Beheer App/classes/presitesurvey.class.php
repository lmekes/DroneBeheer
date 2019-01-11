<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn, $studentName){

		$queryString = "UPDATE PreSitesSurvey SET NaamStudent = '" . $_POST['NaamStudent'] . "'";

		// This query to get all the database names for the foreach later
		$result = $Conn->query("SELECT * FROM PreSitesSurvey WHERE NaamStudent = '" . $studentName . "'");
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

		$result = $Conn->query("SELECT * FROM PreSitesSurvey WHERE NaamStudent = '" . $studentName . "'");

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

				<input type='text' class='form-control' name='JobNo' value='" . $data['JobNo'] . "'></br>

				<input type='text' class='form-control' name='Latitude' value='" . $data['Latitude'] . "'></br>

				<input type='text' class='form-control' name='Altitude' value='" . $data['Altitude'] . "'></br>

				<input type='text' class='form-control' name='WorkRequired' value='" . $data['WorkRequired'] . "'></br>

				<input type='text' class='form-control' name='DateWorkRequired' value='" . $data['DateWorkRequired'] . "'></br>

				Downloaded map to groundstation: <input type='checkbox' name='DownloadedToGround' value='1' " . $checked['DownloadedToGround'] . "></br>

				Vehicular access: <input type='checkbox' name='VehicularAccess' value='1' " . $checked['VehicularAccess'] . "></br>

				<input type='text' class='form-control' name='Pilot' value='" . $data['Pilot'] . "'></br>
				
				<input type='text'  class='form-control'name='Observer' value='" . $data['Observer'] . "'></br>
				
				<input type='text' class='form-control' name='UAVRegistration' value='" . $data['UAVRegistration'] . "'></br>
				
				<input type='text' class='form-control' name='Helper1' value='" . $data['Helper1'] . "'></br>
				
				<input type='text' class='form-control' name='Helper2' value='" . $data['Helper2'] . "'></br>
				
				<input type='text' class='form-control' name='Airspace' value='" . $data['Airspace'] . "'></br>
				
				<input type='text' class='form-control' name='Terrain' value='" . $data['Terrain'] . "'></br>
				
				<input type='text' class='form-control' name='Proximities' value='" . $data['Proximities'] . "'></br>
				
				<input type='text' class='form-control' name='Hazards' value='" . $data['Hazards'] . "'></br>
				
				<input type='text' class='form-control' name='Restrictions' value='" . $data['Restrictions'] . "'></br>
				
				<input type='text' class='form-control' name='Sensitivities' value='" . $data['Sensitivities'] . "'></br>
				
				<input type='text' class='form-control' name='People' value='" . $data['People'] . "'></br>
				
				<input type='text' class='form-control' name='Livestock' value='" . $data['Livestock'] . "'></br>
				
				<input type='text' class='form-control' name='Permission' value='" . $data['Permission'] . "'></br>
				
				<input type='text' class='form-control' name='Access' value='" . $data['Access'] . "'></br>
				
				<input type='text' class='form-control' name='Footpaths' value='" . $data['Footpaths'] . "'></br>
				
				<input type='text' class='form-control' name='Alternate' value='" . $data['Alternate'] . "'></br>
				
				<input type='text' class='form-control' name='RiskReduction' value='" . $data['RiskReduction'] . "'></br>
				
				<input type='text' class='form-control' name='Weather' value='" . $data['Weather'] . "'></br>
				
				<input type='text' class='form-control' name='NOTAMS' value='" . $data['NOTAMS'] . "'></br>
				
				<input type='text' class='form-control' name='LocalAirTraffic' value='" . $data['LocalAirTraffic'] . "'></br>
				
				<input type='text' class='form-control' name='RegionalAirTraffic' value='" . $data['RegionalAirTraffic'] . "'></br>
				
				<input type='text' class='form-control' name='MilitaryControl' value='" . $data['MilitaryControl'] . "'></br>
				
				<input type='text' class='form-control' name='NoticeToAirmen' value='" . $data['NoticeToAirmen'] . "'></br>			

				<input type='submit' class='btn btn-primary' name='update' value='Update'>

			</form>";

		}

	}

?>