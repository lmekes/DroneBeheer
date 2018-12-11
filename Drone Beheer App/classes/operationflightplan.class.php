<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn, $studentName){

		$queryString = "UPDATE OperationFlightPlan SET NaamStudent = '" . $_POST['NaamStudent'] . "'";

		// This query to get all the database names for the foreach later
		$result = $Conn->query("SELECT * FROM OperationFlightPlan WHERE NaamStudent = '" . $studentName . "'");
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

		$result = $Conn->query("SELECT * FROM OperationFlightPlan WHERE NaamStudent = '" . $studentName . "'");

		while ($data = $result->fetch_assoc()) {

			echo "<form action='' method='post'>

				<input type='hidden' name='Id' value='" . $data['Id'] . "'>

				<input type='text' name='NaamStudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' name='Datum' value='" . $data['Datum'] ."'></br>

				<input type='text' name='JobNo' value='" . $data['JobNo'] . "'></br>

				<input type='text' name='Version' value='" . $data['Version'] . "'></br>

				<input type='text' name='Pilot' value='" . $data['Pilot'] . "'></br>

				<input type='text' name='Observer' value='" . $data['Observer'] . "'></br>

				<input type='text' name='PayloadOperator' value='" . $data['PayloadOperator'] . "'></br>

				<input type='text' name='Helper' value='" . $data['Helper'] . "'></br>

				<input type='text' name='Address' value='" . $data['Address'] . "'></br>

				<input type='text' name='Latitude' value='" . $data['Latitude'] . "'></br>

				<input type='text' name='Elevation' value='" . $data['Elevation'] . "'></br>

				<input type='text' name='VehicularAccess' value='" . $data['VehicularAccess'] . "'></br>

				<input type='text' name='FlightPurpose' value='" . $data['FlightPurpose'] . "'></br>

				<input type='text' name='OperationType' value='" . $data['OperationType'] . "'></br>

				<input type='text' name='DateWorkRequired' value='" . $data['DateWorkRequired'] . "'></br>

				<input type='text' name='MissionDuration' value='" . $data['MissionDuration'] . "'></br>

				<input type='text' name='CruisingAltitude' value='" . $data['CruisingAltitude'] . "'></br>

				<input type='text' name='MaxAltitude' value='" . $data['MaxAltitude'] . "'></br>

				<input type='text' name='MaxDistance' value='" . $data['MaxDistance'] . "'></br>

				<input type='text' name='SatellitePic' value='" . $data['SatellitePic'] . "'></br>

				<input type='text' name='BAGViewerPic' value='" . $data['BAGViewerPic'] . "'></br>

				<input type='text' name='CrewPosition' value='" . $data['CrewPosition'] . "'></br>

				<input type='text' name='Flightbox' value='" . $data['Flightbox'] . "'></br>

				<input type='text' name='AltLandingSites' value='" . $data['AltLandingSites'] . "'></br>

				<input type='text' name='Distances' value='" . $data['Distances'] . "'></br>

				<input type='text' name='RiskAssessment' value='" . $data['RiskAssessment'] . "'></br>

				<input type='text' name='LocalAirTraffic' value='" . $data['LocalAirTraffic'] . "'></br>

				<input type='text' name='RegionalAirTraffic' value='" . $data['RegionalAirTraffic'] . "'></br>

				<input type='text' name='MilitaryControl' value='" . $data['MilitaryControl'] . "'></br>

				<input type='text' name='LowFlyingArea' value='" . $data['LowFlyingArea'] . "'></br>

				<input type='text' name='Airspace' value='" . $data['Airspace'] . "'></br>

				<input type='text' name='CivilMilitary' value='" . $data['CivilMilitary'] . "'></br>

				<input type='text' name='ATCPermission' value='" . $data['ATCPermission'] . "'></br>

				<input type='text' name='MilitaryLowFlying' value='" . $data['MilitaryLowFlying'] . "'></br>

				<input type='text' name='Prohibited' value='" . $data['Prohibited'] . "'></br>

				<input type='text' name='NOTAMAffect' value='" . $data['NOTAMAffect'] . "'></br>

				<input type='text' name='NOTAMpublished' value='" . $data['NOTAMpublished'] . "'></br>

				<input type='text' name='HelpdeskConsulted' value='" . $data['HelpdeskConsulted'] . "'></br>

				<input type='text' name='VisualFlightRules' value='" . $data['VisualFlightRules'] . "'></br>

				<input type='text' name='Distance150' value='" . $data['Distance150'] . "'></br>

				<input type='text' name='Distance50' value='" . $data['Distance50'] . "'></br>

				<input type='text' name='HorizontalDistance' value='" . $data['HorizontalDistance'] . "'></br>

				<input type='text' name='Class1Flight' value='" . $data['Class1Flight'] . "'></br>

				<input type='text' name='TUG' value='" . $data['TUG'] . "'></br>

				<input type='text' name='FlightReported' value='" . $data['FlightReported'] . "'></br>

				<input type='text' name='Terrain' value='" . $data['Terrain'] . "'></br>

				<input type='text' name='OtherAircraft' value='" . $data['OtherAircraft'] . "'></br>

				<input type='text' name='Hazards' value='" . $data['Hazards'] . "'></br>

				<input type='text' name='Restrictions' value='" . $data['Restrictions'] . "'></br>

				<input type='text' name='Sensitives' value='" . $data['Sensitives'] . "'></br>

				<input type='text' name='Permission' value='" . $data['Permission'] . "'></br>

				<input type='text' name='Weather' value='" . $data['Weather'] . "'></br>

				<input type='submit' name='update' value='Update'>

			</form>";

		}

	}

?>