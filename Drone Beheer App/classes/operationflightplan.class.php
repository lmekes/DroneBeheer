<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn){

		$query = "UPDATE OperationFlightPlan SET

		NaamStudent='" . $_POST['naamstudent'] . "',

		Datum='" . $_POST['datum'] . "',

		JobNo='" . $_POST['jobno'] . "',

		Version='" . $_POST['version'] . "',

		Pilot='" . $_POST['pilot'] . "',

		Observer='" . $_POST['observer'] . "',

		PayloadOperator='" . $_POST['payloadoperator'] . "',

		Helper='" . $_POST['helper'] . "',

		Address='" . $_POST['address'] . "',

		Latitude='" . $_POST['latitude'] . "',

		Elevation='" . $_POST['elevation'] . "',

		VehicularAccess='" . $_POST['vehicularaccess'] . "',

		FlightPurpose='" . $_POST['flightpurpose'] . "',

		OperationType='" . $_POST['operationtype'] . "',

		DateWorkRequired='" . $_POST['dateworkrequired'] . "',

		MissionDuration='" . $_POST['missionduration'] . "',

		CruisingAltitude='" . $_POST['cruisingaltitude'] . "',

		MaxAltitude='" . $_POST['maxaltitude'] . "',

		MaxDistance='" . $_POST['maxdistance'] . "',

		SatellitePic='" . $_POST['satellitepic'] . "',

		BAGViewerPic='" . $_POST['bagviewerpic'] . "',

		CrewPosition='" . $_POST['crewposition'] . "',

		Flightbox='" . $_POST['flightbox'] . "',

		AltLandingSites='" . $_POST['altlandingsites'] . "',

		Distances='" . $_POST['distances'] . "',

		RiskAssessment='" . $_POST['riskassessment'] . "',

		LocalAirTraffic='" . $_POST['localairtraffic'] . "',

		RegionalAirTraffic='" . $_POST['regionalairtraffic'] . "',

		MilitaryControl='" . $_POST['militarycontrol'] . "',

		LowFlyingArea='" . $_POST['lowflyingarea'] . "',

		Airspace='" . $_POST['airspace'] . "',

		CivilMilitary='" . $_POST['civilmilitary'] . "',

		ATCPermission='" . $_POST['atcpermission'] . "',

		MilitaryLowFlying='" . $_POST['militarylowflying'] . "',

		Prohibited='" . $_POST['prohibited'] . "',

		NOTAMAffect='" . $_POST['notamaffect'] . "',

		NOTAMpublished='" . $_POST['notampublished'] . "',

		HelpdeskConsulted='" . $_POST['helpdeskconsulted'] . "',

		VisualFlightRules='" . $_POST['visualflightrules'] . "',

		Distance150='" . $_POST['distance150'] . "',

		Distance50='" . $_POST['distance50'] . "',

		Class1Flight='" . $_POST['class1flight'] . "',

		TUG='" . $_POST['tug'] . "',

		FlightReported='" . $_POST['flightreported'] . "',

		Terrain='" . $_POST['terrain'] . "',

		OtherAircraft='" . $_POST['otheraircraft'] . "',

		Hazards='" . $_POST['hazards'] . "',

		Restrictions='" . $_POST['restrictions'] . "',

		Sensitives='" . $_POST['sensitives'] . "',

		Permission='" . $_POST['permission'] . "',

		Weather='" . $_POST['weather'] . "',

		WHERE Id='" . $_POST['id'] . "'";

		$Conn->query($query);

	}

	if(isset($_POST['update'])){

		updateForm($Conn);

	}

	function getForm($studentName, $Conn){

		$result = $Conn->query("SELECT * FROM OperationFlightPlan WHERE NaamStudent = '" . $studentName . "'");

		while ($data = $result->fetch_assoc()) {

			echo "<form action='' method='post'>

				<input type='hidden' name='id' value='" . $data['Id'] . "'>

				<input type='text' name='naamstudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' name='datum' value='" . $data['Datum'] ."'></br>

				<input type='text' name='jobno' value='" . $data['JobNo'] . "'></br>

				<input type='text' name='version' value='" . $data['Version'] . "'></br>

				<input type='text' name='pilot' value='" . $data['Pilot'] . "'></br>

				<input type='text' name='observer' value='" . $data['Observer'] . "'></br>

				<input type='text' name='payloadoperator' value='" . $data['PayloadOperator'] . "'></br>

				<input type='text' name='helper' value='" . $data['Helper'] . "'></br>

				<input type='text' name='address' value='" . $data['Address'] . "'></br>

				<input type='text' name='latitude' value='" . $data['Latitude'] . "'></br>

				<input type='text' name='elevation' value='" . $data['Elevation'] . "'></br>

				<input type='text' name='vehicularaccess' value='" . $data['VehicularAccess'] . "'></br>

				<input type='text' name='flightpurpose' value='" . $data['FlightPurpose'] . "'></br>

				<input type='text' name='operationtype' value='" . $data['OperationType'] . "'></br>

				<input type='text' name='dateworkrequired' value='" . $data['DateWorkRequired'] . "'></br>

				<input type='text' name='missionduration' value='" . $data['MissionDuration'] . "'></br>

				<input type='text' name='cruisingaltitude' value='" . $data['CruisingAltitude'] . "'></br>

				<input type='text' name='maxaltitude' value='" . $data['MaxAltitude'] . "'></br>

				<input type='text' name='maxdistance' value='" . $data['MaxDistance'] . "'></br>

				<input type='text' name='satellitepic' value='" . $data['SatellitePic'] . "'></br>

				<input type='text' name='bagviewerpic' value='" . $data['BAGViewerPic'] . "'></br>

				<input type='text' name='crewposition' value='" . $data['CrewPosition'] . "'></br>

				<input type='text' name='flightbox' value='" . $data['Flightbox'] . "'></br>

				<input type='text' name='altlandingsites' value='" . $data['AltLandingSites'] . "'></br>

				<input type='text' name='distances' value='" . $data['Distances'] . "'></br>

				<input type='text' name='riskassessment' value='" . $data['RiskAssessment'] . "'></br>

				<input type='text' name='localairtraffic' value='" . $data['LocalAirTraffic'] . "'></br>

				<input type='text' name='regionalairtraffic' value='" . $data['RegionalAirTraffic'] . "'></br>

				<input type='text' name='militarycontrol' value='" . $data['MilitaryControl'] . "'></br>

				<input type='text' name='lowflyingarea' value='" . $data['LowFlyingArea'] . "'></br>

				<input type='text' name='airspace' value='" . $data['Airspace'] . "'></br>

				<input type='text' name='civilmilitary' value='" . $data['CivilMilitary'] . "'></br>

				<input type='text' name='atcpermission' value='" . $data['ATCPermission'] . "'></br>

				<input type='text' name='militarylowflying' value='" . $data['MilitaryLowFlying'] . "'></br>

				<input type='text' name='prohibited' value='" . $data['Prohibited'] . "'></br>

				<input type='text' name='notamaffect' value='" . $data['NOTAMAffect'] . "'></br>

				<input type='text' name='notampublished' value='" . $data['NOTAMpublished'] . "'></br>

				<input type='text' name='helpdeskconsulted' value='" . $data['HelpdeskConsulted'] . "'></br>

				<input type='text' name='visualflightrules' value='" . $data['VisualFlightRules'] . "'></br>

				<input type='text' name='distance150' value='" . $data['Distance150'] . "'></br>

				<input type='text' name='distance50' value='" . $data['Distance50'] . "'></br>

				<input type='text' name='class1flight' value='" . $data['Class1Flight'] . "'></br>

				<input type='text' name='tug' value='" . $data['TUG'] . "'></br>

				<input type='text' name='flightreported' value='" . $data['FlightReported'] . "'></br>

				<input type='text' name='terrain' value='" . $data['Terrain'] . "'></br>

				<input type='text' name='otheraircraft' value='" . $data['OtherAircraft'] . "'></br>

				<input type='text' name='hazards' value='" . $data['Hazards'] . "'></br>

				<input type='text' name='restrictions' value='" . $data['Restrictions'] . "'></br>

				<input type='text' name='sensitives' value='" . $data['Sensitives'] . "'></br>

				<input type='text' name='permission' value='" . $data['Permission'] . "'></br>

				<input type='text' name='weather' value='" . $data['Weather'] . "'></br>

				<input type='submit' name='update' value='Update'>

			</form>";

		}

	}

?>