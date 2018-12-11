<?php

	include '../functions/dbConnection.php';

	function updateForm($Conn, $studentName){

		$queryString = "UPDATE EmbarkationChecklist SET NaamStudent = '" . $_POST['NaamStudent'] . "'";

		// This query to get all the database names for the foreach later
		$result = $Conn->query("SELECT * FROM EmbarkationChecklist WHERE NaamStudent = '" . $studentName . "'");
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

		$result = $Conn->query("SELECT * FROM EmbarkationChecklist WHERE NaamStudent = '" . $studentName . "'");

		while ($data = $result->fetch_assoc()) {

			foreach($data AS $key => $value){
				if($value && $key){
					$checked[$key] = "checked";
				}else{
					$checked[$key] = "";
				}
			}

			echo "<form action='' method='post'>

				<input type='hidden' name='Id' value='" . $data['Id'] . "'>

				<input type='text' name='NaamStudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' name='Datum' value='" . $data['Datum'] ."'></br>

				Ground Station & Leads: <input type='checkbox' name='GroundStation' value='1' " . $checked['GroundStation'] . "></br>

				Camera Monitor & Leads: <input type='checkbox' name='CameraMonitor' value='1' " . $checked['CameraMonitor'] . "></br>

				A/V Receiver & Leads: <input type='checkbox' name='Receiver' value='1' " . $checked['Receiver'] . "></br>

				Telemetery Receiver & Leads: <input type='checkbox' name='TelemetryReceiver' value='1' " . $checked['TelemetryReceiver'] . "></br>

				Laptop & Leads: <input type='checkbox' name='Laptop' value='1' " . $checked['Laptop'] . "></br>

				Mobile Phone & Emergency No's: <input type='checkbox' name='MobilePhone' value='1' " . $checked['MobilePhone'] . "></br>

				Anemometer: <input type='checkbox' name='Anemometer' value='1' " . $checked['Anemometer'] . "></br>

				First Aid Kit & Extinguisher: <input type='checkbox' name='FirstAid' value='1' " . $checked['FirstAid'] . "></br>

				Crew Identification: <input type='checkbox' name='CrewIdentification' value='1' " . $checked['CrewIdentification'] . "></br>

				Fluorescent Jacket(s) / Hard Hats: <input type='checkbox' name='HardHat' value='1' " . $checked['HardHat'] . "></br>

				Two Way Radios: <input type='checkbox' name='Radio' value='1' " . $checked['Radio'] . "></br>

				Clothing (Boots, Coat, Gloves): <input type='checkbox' name='Clothing' value='1' " . $checked['Clothing'] . "></br>

				Air Navigation Map: <input type='checkbox' name='AirNavigationMap' value='1' " . $checked['AirNavigationMap'] . "></br>

				Checklists, Manuals & Logbooks: <input type='checkbox' name='CheckList' value='1' " . $checked['Checklist'] . "></br>

				Notepad & Pens: <input type='checkbox' name='Notepad' value='1' " . $checked['Notepad'] . "></br>

				Site Assesment Form: <input type='checkbox' name='SiteAssessment' value='1' " . $checked['SiteAssessment'] . "></br>

				Signs, Safety Tape, Cones: <input type='checkbox' name='Signs' value='1' " . $checked['Signs'] . "></br>

				Flight Battery Packs: <input type='checkbox' name='FlightBattery' value='1' " . $checked['FlightBattery'] . "></br>

				Transmitter Battery Packs: <input type='checkbox' name='TransmitterBattery' value='1' " . $checked['TransmitterBattery'] . "></br>

				Camera Battery Packs: <input type='checkbox' name='CameraBattery' value='1' " . $checked['CameraBattery'] . "></br>

				Ground Station Battery: <input type='checkbox' name='StationBattery' value='1' " . $checked['StationBattery'] . "></br>

				Charger Battery Packs: <input type='checkbox' name='ChargerBattery' value='1' " . $checked['ChargerBattery'] . "></br>

				Mobile Phone Battery: <input type='checkbox' name='PhoneBattery' value='1' " . $checked['PhoneBattery'] . "></br>

				Airframe: <input type='checkbox' name='Airframe' value='1' " . $checked['Airframe'] . "></br>

				Camera Mount: <input type='checkbox' name='CameraMount' value='1' " . $checked['CameraMount'] . "></br>

				Flight Controller / Transmitter(s): <input type='checkbox' name='Transmitters' value='1' " . $checked['Transmitters'] . "></br>

				Calibration Platform: <input type='checkbox' name='CalibrationPlatform' value='1' " . $checked['CalibrationPlatform'] . "></br>

				Camera(s) & Lens(es): <input type='checkbox' name='CameraLens' value='1' " . $checked['CameraLens'] . "></br>

				Camera Connection Leads: <input type='checkbox' name='CameraConnection' value='1' " . $checked['CameraConnection'] . "></br>

				Camera Memory Cards: <input type='checkbox' name='CameraMemory' value='1' " . $checked['CameraMemory'] . "></br>

				Camera to Airframe Lanyard: <input type='checkbox' name='CameraLanyard' value='1' " . $checked['CameraLanyard'] . "></br>

				Camera Attachment Bolt: <input type='checkbox' name='AttachmentBolt' value='1' " . $checked['AttachmentBolt'] . "></br>

				Multi Function Battery Charger: <input type='checkbox' name='MultiFunctionCharger' value='1' " . $checked['MultiFunctionCharger'] . "></br>

				Required Charger Leads: <input type='checkbox' name='RequiredCharger' value='1' " . $checked['RequiredCharger'] . "></br>

				Battery Checker: <input type='checkbox' name='BatteryChecker' value='1' " . $checked['BatteryChecker'] . "></br>

				Screwdrivers (Flat / Cross Drive): <input type='checkbox' name='Screwdrivers' value='1' " . $checked['Screwdrivers'] . "></br>

				Allen Keys: <input type='checkbox' name='AllenKeys' value='1' " . $checked['AllenKeys'] . "></br>

				Pliers (Standard / Long Nose): <input type='checkbox' name='Pliers' value='1' " . $checked['Pliers'] . "></br>

				Cable Ties (Various Sizes): <input type='checkbox' name='CableTies' value='1' " . $checked['CableTies'] . "></br>

				Side Cutters: <input type='checkbox' name='SideCutters' value='1' " . $checked['SideCutters'] . "></br>

				Nylock Propellers Nuts: <input type='checkbox' name='PropellerNuts' value='1' " . $checked['PropellerNuts'] . "></br>

				Spare Props. (Tractor & Pusher): <input type='checkbox' name='SpareProps' value='1' " . $checked['SpareProps'] . "></br>

				Small Socket Set: <input type='checkbox' name='SocketSet' value='1' " . $checked['SocketSet'] . "></br>

				<input type='submit' name='update' value='Update'>

			</form>";

		}

	}

?>