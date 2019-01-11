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

			echo "<form class='form-horizontal' action='' method='post'>

				<input type='hidden' name='Id' value='" . $data['Id'] . "'>

				<input type='text' class='form-control' name='NaamStudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' class='form-control' name='Datum' value='" . $data['Datum'] ."'></br>

				<input type='text' class='form-control' name='JobNo' value='" . $data['JobNo'] . "'></br>

				<input type='text' class='form-control' name='Version' value='" . $data['Version'] . "'></br>

				<input type='text' class='form-control' name='Pilot' value='" . $data['Pilot'] . "'></br>

				<input type='text' class='form-control' name='Observer' value='" . $data['Observer'] . "'></br>

				<input type='text' class='form-control' name='PayloadOperator' value='" . $data['PayloadOperator'] . "'></br>

				<input type='text' class='form-control' name='Helper' value='" . $data['Helper'] . "'></br>

				<input type='text' class='form-control' name='Address' value='" . $data['Address'] . "'></br>

				<input type='text' class='form-control' name='Latitude' value='" . $data['Latitude'] . "'></br>

				<input type='text' class='form-control' name='Elevation' value='" . $data['Elevation'] . "'></br>

				<input type='text' class='form-control' name='VehicularAccess' value='" . $data['VehicularAccess'] . "'></br>

				<input type='text' class='form-control' name='FlightPurpose' value='" . $data['FlightPurpose'] . "'></br>

				<input type='text' class='form-control' name='OperationType' value='" . $data['OperationType'] . "'></br>

				<input type='text' class='form-control' name='DateWorkRequired' value='" . $data['DateWorkRequired'] . "'></br>

				<input type='text' class='form-control' name='MissionDuration' value='" . $data['MissionDuration'] . "'></br>

				<input type='text' class='form-control' name='CruisingAltitude' value='" . $data['CruisingAltitude'] . "'></br>

				<input type='text' class='form-control' name='MaxAltitude' value='" . $data['MaxAltitude'] . "'></br>

				<input type='text' class='form-control' name='MaxDistance' value='" . $data['MaxDistance'] . "'></br>

				<input type='text' class='form-control' name='SatellitePic' value='" . $data['SatellitePic'] . "'></br>

				<input type='text' class='form-control' name='BAGViewerPic' value='" . $data['BAGViewerPic'] . "'></br>

				<input type='text' class='form-control' name='CrewPosition' value='" . $data['CrewPosition'] . "'></br>

				<input type='text' class='form-control' name='Flightbox' value='" . $data['Flightbox'] . "'></br>

				<input type='text' class='form-control' name='AltLandingSites' value='" . $data['AltLandingSites'] . "'></br>

				<input type='text' class='form-control' name='Distances' value='" . $data['Distances'] . "'></br>

				<input type='text' class='form-control' name='RiskAssessment' value='" . $data['RiskAssessment'] . "'></br>

				<input type='text' class='form-control' name='LocalAirTraffic' value='" . $data['LocalAirTraffic'] . "'></br>

				<input type='text' class='form-control' name='RegionalAirTraffic' value='" . $data['RegionalAirTraffic'] . "'></br>

				<input type='text' class='form-control' name='MilitaryControl' value='" . $data['MilitaryControl'] . "'></br>

				<input type='text' class='form-control' name='LowFlyingArea' value='" . $data['LowFlyingArea'] . "'></br>

				<input type='text' class='form-control' name='Airspace' value='" . $data['Airspace'] . "'></br>

				<input type='text' class='form-control' name='CivilMilitary' value='" . $data['CivilMilitary'] . "'></br>

				<input type='text' class='form-control' name='ATCPermission' value='" . $data['ATCPermission'] . "'></br>

				<input type='text' class='form-control' name='MilitaryLowFlying' value='" . $data['MilitaryLowFlying'] . "'></br>

				<input type='text' class='form-control' name='Prohibited' value='" . $data['Prohibited'] . "'></br>

				<input type='text' class='form-control' name='NOTAMAffect' value='" . $data['NOTAMAffect'] . "'></br>

				<input type='text' class='form-control' name='NOTAMpublished' value='" . $data['NOTAMpublished'] . "'></br>

				<input type='text' class='form-control' name='HelpdeskConsulted' value='" . $data['HelpdeskConsulted'] . "'></br>

				<input type='text' class='form-control' name='VisualFlightRules' value='" . $data['VisualFlightRules'] . "'></br>

				<input type='text' class='form-control' name='Distance150' value='" . $data['Distance150'] . "'></br>

				<input type='text' class='form-control' name='Distance50' value='" . $data['Distance50'] . "'></br>

				<input type='text' class='form-control' name='HorizontalDistance' value='" . $data['HorizontalDistance'] . "'></br>

				<input type='text' class='form-control' name='Class1Flight' value='" . $data['Class1Flight'] . "'></br>

				<input type='text' class='form-control' name='TUG' value='" . $data['TUG'] . "'></br>

				<input type='text' class='form-control' name='FlightReported' value='" . $data['FlightReported'] . "'></br>

				<input type='text' class='form-control' name='Terrain' value='" . $data['Terrain'] . "'></br>

				<input type='text' class='form-control' name='OtherAircraft' value='" . $data['OtherAircraft'] . "'></br>

				<input type='text' class='form-control' name='Hazards' value='" . $data['Hazards'] . "'></br>

				<input type='text' class='form-control' name='Restrictions' value='" . $data['Restrictions'] . "'></br>

				<input type='text' class='form-control' name='Sensitives' value='" . $data['Sensitives'] . "'></br>

				<input type='text' class='form-control' name='Permission' value='" . $data['Permission'] . "'></br>

				<input type='text' class='form-control' name='Weather' value='" . $data['Weather'] . "'></br>

				<input type='submit' class='btn btn-primary' name='update' value='Update'>

			</form>";

		}

	}

?>