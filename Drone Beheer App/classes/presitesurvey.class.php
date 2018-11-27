<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn){

		$query="UPDATE PreSitesSurvey SET

		NaamStudent='" . $_POST['naamstudent'] . "', 

		Datum='" . $_POST['datum'] . "',

		JobNo='" . $_POST['jobno'] . "',

		Latitude='" . $_POST['latitude'] . "',

		Altitude='" . $_POST['altitude'] . "',

		WorkRequired='" . $_POST['workrequired'] . "',

		DateWorkRequired='" . $_POST['dateworkrequired'] . "',

		DownloadedToGround='" . $_POST['downloadedtoground'] . "',

		VehicularAccess='" . $_POST['vehicularaccess'] . "',

		Pilot='" . $_POST['pilot'] . "',

		Observer='" . $_POST['observer'] . "',

		UAVRegistration='" . $_POST['uavregistration'] . "',

		Helper1='" . $_POST['helper1'] . "',

		Helper2='" . $_POST['helper2'] . "',

		Airspace='" . $_POST['airspace'] . "',

		Terrain='" . $_POST['terrain'] . "',

		Proximities='" . $_POST['proximities'] . "',

		Hazards='" . $_POST['hazards'] . "',

		Restrictions='" . $_POST['restrictions'] . "',

		Sensitivities='" . $_POST['sensitivities'] . "',

		People='" . $_POST['people'] . "',

		Livestock='" . $_POST['livestock'] . "',

		Permission='" . $_POST['permission'] . "',

		Access='" . $_POST['access'] . "',

		Footpaths='" . $_POST['footpaths'] . "',

		Alternate='" . $_POST['alternate'] . "',

		RiskReduction='" . $_POST['riskreduction'] . "',

		Weather='" . $_POST['weather'] . "',

		NOTAMS='" . $_POST['notams'] . "',

		LocalAirTraffic='" . $_POST['localairtraffic'] . "',

		RegionalAirTraffic='" . $_POST['regionalairtraffic'] . "',

		MilitaryControl='" . $_POST['militarycontrol'] . "',

		NoticeToAirmen='" . $_POST['noticetoairmen'] . "'

		WHERE Id='" . $_POST['id'] . "'";

		$Conn->query($query);

	}

	if(isset($_POST['update'])){

		updateForm($Conn);

	}

	function getForm($studentName, $Conn){

		$result = $Conn->query("SELECT * FROM PreSitesSurvey WHERE NaamStudent = '" . $studentName . "'");

		while ($data = $result->fetch_assoc()) {

			echo "<form action='' method='post'>

				<input type='hidden' name='id' value='" . $data['Id'] . "'>

				<input type='text' name='naamstudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' name='datum' value='" . $data['Datum'] ."'></br>

				<input type='text' name='jobno' value='" . $data['JobNo'] . "'></br>

				<input type='text' name='latitude' value='" . $data['Latitude'] . "'></br>

				<input type='text' name='altitude' value='" . $data['Altitude'] . "'></br>

				<input type='text' name='workrequired' value='" . $data['WorkRequired'] . "'></br>

				<input type='text' name='dateworkrequired' value='" . $data['DateWorkRequired'] . "'></br>

				Downloaded map to groundstation: <input type='checkbox' name='downloadedtoground' value='" . $data['DownloadedToGround'] . "'></br>

				Vehicular access: <input type='checkbox' name='vehicularaccess' value='" . $data['VehicularAccess'] . "'></br>

				<input type='text' name='pilot' value='" . $data['Pilot'] . "'></br>
				
				<input type='text' name='observer' value='" . $data['Observer'] . "'></br>
				
				<input type='text' name='uavregistration' value='" . $data['UAVRegistration'] . "'></br>
				
				<input type='text' name='helper1' value='" . $data['Helper1'] . "'></br>
				
				<input type='text' name='helper2' value='" . $data['Helper2'] . "'></br>
				
				<input type='text' name='airspace' value='" . $data['Airspace'] . "'></br>
				
				<input type='text' name='terrain' value='" . $data['Terrain'] . "'></br>
				
				<input type='text' name='proximities' value='" . $data['Proximities'] . "'></br>
				
				<input type='text' name='hazards' value='" . $data['Hazards'] . "'></br>
				
				<input type='text' name='restrictions' value='" . $data['Restrictions'] . "'></br>
				
				<input type='text' name='sensitivities' value='" . $data['Sensitivities'] . "'></br>
				
				<input type='text' name='people' value='" . $data['People'] . "'></br>
				
				<input type='text' name='livestock' value='" . $data['Livestock'] . "'></br>
				
				<input type='text' name='permission' value='" . $data['Permission'] . "'></br>
				
				<input type='text' name='access' value='" . $data['Access'] . "'></br>
				
				<input type='text' name='footpaths' value='" . $data['Footpaths'] . "'></br>
				
				<input type='text' name='alternate' value='" . $data['Alternate'] . "'></br>
				
				<input type='text' name='riskreduction' value='" . $data['RiskReduction'] . "'></br>
				
				<input type='text' name='weather' value='" . $data['Weather'] . "'></br>
				
				<input type='text' name='notams' value='" . $data['NOTAMS'] . "'></br>
				
				<input type='text' name='localairtraffic' value='" . $data['LocalAirTraffic'] . "'></br>
				
				<input type='text' name='regionalairtraffic' value='" . $data['RegionalAirTraffic'] . "'></br>
				
				<input type='text' name='militarycontrol' value='" . $data['MilitaryControl'] . "'></br>
				
				<input type='text' name='noticetoairmen' value='" . $data['NoticeToAirmen'] . "'></br>			

				<input type='submit' name='update' value='Update'>

			</form>";

		}

	}

?>