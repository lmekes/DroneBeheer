<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn){

		$query = "UPDATE EmbarkationChecklist SET

		NaamStudent='" . $_POST['naamstudent'] . "',

		Datum='" . $_POST['datum'] . "',

		GroundStation='" . $_POST['groundstation'] . "',

		CameraMonitor='" . $_POST['cameramonitor'] . "',

		Receiver='" . $_POST['receiver'] . "',

		TelemetryReceiver='" . $_POST['telemetryreceiver'] . "',

		Laptop='" . $_POST['laptop'] . "',

		MobilePhone='" . $_POST['mobilephone'] . "',

		Anemometer='" . $_POST['anemometer'] . "',

		FirstAid='" . $_POST['firstaid'] . "',

		HardHat='" . $_POST['hardhat'] . "',

		Radio='" . $_POST['radio'] . "',

		Clothing='" . $_POST['clothing'] . "',

		AirNavigationMap='" . $_POST['airnavigationmap'] . "',

		Checklist='" . $_POST['checklist'] . "',

		Notepad='" . $_POST['notepad'] . "',

		SiteAssessment='" . $_POST['siteassessment'] . "',

		Signs='" . $_POST['signs'] ."',

		FlightBattery='" . $_POST['flightbattery'] ."',

		TransmitterBattery='" . $_POST['transmitterbattery'] . "',

		CameraBattery='" . $_POST['camerabattery'] . "',

		StationBattery='" . $_POST['stationbattery'] . "',

		ChargerBattery='" . $_POST['chargerbattery'] . "',

		PhoneBattery='" . $_POST['phonebattery'] . "',

		Airframe='" . $_POST['airframe'] . "',

		CameraMount='" . $_POST['cameramount'] . "',

		CalibrationPlatform='" . $_POST['calibrationplatform'] . "',

		CameraLens='" . $_POST['cameralens'] . "',

		CameraConnection='" . $_POST['cameraconnection'] . "',

		CameraMemory='" . $_POST['cameramemory'] . "',

		CameraLanyard='" . $_POST['cameralanyard'] . "',

		AttachmentBolt='" . $_POST['attachmentbolt'] . "',

		MultiFunctionCharger='" . $_POST['multifunctioncharger'] . "',

		RequiredCharger='" . $_POST['requiredcharger'] . "',

		BatteryChecker='" . $_POST['batterychecker'] . "',

		Screwdrivers='" . $_POST['screwdrivers'] . "',

		AllenKeys='" . $_POST['allenkeys'] . "',

		Pliers='" . $_POST['pliers'] . "',

		CableTies='" . $_POST['cableties'] . "',

		SideCutters='" . $_POST['sidecutters'] . "',

		PropellerNuts='" . $_POST['propellernuts'] . "',

		SpareProps='" . $_POST['spareprops'] . "',

		SocketSet='" . $_POST['socketset'] . "'

		WHERE Id='" . $_POST['id'] . "'";

		$Conn->query($query);

	}

	if(isset($_POST['update'])){

		updateForm($Conn);

	}

	function getForm($studentName, $Conn){

		$result = $Conn->query("SELECT * FROM EmbarkationChecklist WHERE NaamStudent = '" . $studentName . "'");

		while ($data = $result->fetch_assoc()) {

			echo "<form action='' method='post'>

				<input type='hidden' name='id' value='" . $data['Id'] . "'>

				<input type='text' name='naamstudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' name='datum' value='" . $data['Datum'] ."'></br>

				Ground Station & Leads: <input type='checkbox' name='groundstation' value='" . $data['GroundStation'] . "'></br>

				Camera Monitor & Leads: <input type='checkbox' name='cameramonitor' value='" . $data['CameraMonitor'] . "'></br>

				A/V Receiver & Leads: <input type='checkbox' name='receiver' value='" . $data['Receiver'] . "'></br>

				Telemetery Receiver & Leads: <input type='checkbox' name='telemetryreceiver' value='" . $data['TelemetryReceiver'] . "'></br>

				Laptop & Leads: <input type='checkbox' name='laptop' value='" . $data['Laptop'] . "'></br>

				Mobile Phone & Emergency No's: <input type='checkbox' name='mobilephone' value='" . $data['MobilePhone'] . "'></br>

				Anemometer: <input type='checkbox' name='anemometer' value='" . $data['Anemometer'] . "'></br>

				First Aid Kit & Extinguisher: <input type='checkbox' name='firstaid' value='" . $data['FirstAid'] . "'></br>

				Fluorescent Jacket(s) / Hard Hats: <input type='checkbox' name='hardhat' value='" . $data['HardHat'] . "'></br>

				Two Way Radios: <input type='checkbox' name='radio' value='" . $data['Radio'] . "'></br>

				Clothing (Boots, Coat, Gloves): <input type='checkbox' name='clothing' value='" . $data['Clothing'] . "'></br>

				Air Navigation Map: <input type='checkbox' name='airnavigationmap' value='" . $data['AirNavigationMap'] . "'></br>

				Checklists, Manuals & Logbooks: <input type='checkbox' name='checklist' value='" . $data['Checklist'] . "'></br>

				Notepad & Pens: <input type='checkbox' name='notepad' value='" . $data['Notepad'] . "'></br>

				Site Assesment Form: <input type='checkbox' name='siteassessment' value='" . $data['SiteAssessment'] . "'></br>

				Signs, Safety Tape, Cones: <input type='checkbox' name='signs' value='" . $data['Signs'] . "'></br>

				Flight Battery Packs: <input type='checkbox' name='flightbattery' value='" . $data['FlightBattery'] . "'></br>

				Transmitter Battery Packs: <input type='checkbox' name='transmitterbattery' value='" . $data['TransmitterBattery'] . "'></br>

				Camera Battery Packs: <input type='checkbox' name='camerabattery' value='" . $data['CameraBattery'] . "'></br>

				Ground Station Battery: <input type='checkbox' name='stationbattery' value='" . $data['StationBattery'] . "'></br>

				Charger Battery Packs: <input type='checkbox' name='chargerbattery' value='" . $data['ChargerBattery'] . "'></br>

				Mobile Phone Battery: <input type='checkbox' name='phonebattery' value='" . $data['PhoneBattery'] . "'></br>

				Airframe: <input type='checkbox' name='airframe' value='" . $data['Airframe'] . "'></br>

				Camera Mount: <input type='checkbox' name='cameramount' value='" . $data['CameraMount'] . "'></br>

				Flight Controller / Transmitter(s): <input type='checkbox' name='calibrationplatform' value='" . $data['CalibrationPlatform'] . "'></br>

				Calibration Platform: <input type='checkbox' name='cameralens' value='" . $data['CameraLens'] . "'></br>

				Camera(s) & Lens(es): <input type='checkbox' name='cameraconnection' value='" . $data['CameraConnection'] . "'></br>

				Camera Connection Leads: <input type='checkbox' name='cameramemory' value='" . $data['CameraMemory'] . "'></br>

				Camera Memory Cards: <input type='checkbox' name='cameralanyard' value='" . $data['CameraLanyard'] . "'></br>

				Camera to Airframe Lanyard: <input type='checkbox' name='attachmentbolt' value='" . $data['AttachmentBolt'] . "'></br>

				Multi Function Battery Charger: <input type='checkbox' name='multifunctioncharger' value='" . $data['MultiFunctionCharger'] . "'></br>

				Required Charger Leads: <input type='checkbox' name='requiredcharger' value='" . $data['RequiredCharger'] . "'></br>

				Battery Checker: <input type='checkbox' name='batterychecker' value='" . $data['BatteryChecker'] . "'></br>

				Screwdrivers (Flat / Cross Drive): <input type='checkbox' name='screwdrivers' value='" . $data['ScrewDrivers'] . "'></br>

				Allen Keys: <input type='checkbox' name='allenkeys' value='" . $data['AllenKeys'] . "'></br>

				Pliers (Standard / Long Nose): <input type='checkbox' name='pliers' value='" . $data['Pliers'] . "'></br>

				Cable Ties (Various Sizes): <input type='checkbox' name='cableties' value='" . $data['CableTies'] . "'></br>

				Side Cutters: <input type='checkbox' name='sidecutters' value='" . $data['SideCutters'] . "'></br>

				Nylock Propellers Nuts: <input type='checkbox' name='propellernuts' value='" . $data['PropellerNuts'] . "'></br>

				Spare Props. (Tractor & Pusher): <input type='checkbox' name='spareprops' value='" . $data['SpareProps'] . "'></br>

				Small Socket Set: <input type='checkbox' name='socketset' value='" . $data['SocketSet'] . "'></br>

				<input type='submit' name='update' value='Update'>

			</form>";

		}

	}

?>