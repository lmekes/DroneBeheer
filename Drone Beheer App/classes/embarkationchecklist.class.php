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

			echo "<form class='form-horizontal' action='' method='post'>

				<input type='hidden' name='Id' value='" . $data['Id'] . "'>

				<input type='text' class='form-control' name='NaamStudent' value='" . $data['NaamStudent'] . "'></br>

				<input type='date' class='form-control' name='Datum' value='" . $data['Datum'] ."'></br>

				<table class='table table-striped'>

				<tr><td>Ground Station & Leads: <input type='checkbox' name='GroundStation' value='1' " . $checked['GroundStation'] . "></tr></td>

				<tr><td>Camera Monitor & Leads: <input type='checkbox' name='CameraMonitor' value='1' " . $checked['CameraMonitor'] . "></tr></td>

				<tr><td>A/V Receiver & Leads: <input type='checkbox' name='Receiver' value='1' " . $checked['Receiver'] . "></tr></td>

				<tr><td>Telemetery Receiver & Leads: <input type='checkbox' name='TelemetryReceiver' value='1' " . $checked['TelemetryReceiver'] . "></tr></td>

				<tr><td>Laptop & Leads: <input type='checkbox' name='Laptop' value='1' " . $checked['Laptop'] . "></tr></td>

				<tr><td>Mobile Phone & Emergency No's: <input type='checkbox' name='MobilePhone' value='1' " . $checked['MobilePhone'] . "></tr></td>

				<tr><td>Anemometer: <input type='checkbox' name='Anemometer' value='1' " . $checked['Anemometer'] . "></tr></td>

				<tr><td>First Aid Kit & Extinguisher: <input type='checkbox' name='FirstAid' value='1' " . $checked['FirstAid'] . "></tr></td>

				<tr><td>Crew Identification: <input type='checkbox' name='CrewIdentification' value='1' " . $checked['CrewIdentification'] . "></tr></td>

				<tr><td>Fluorescent Jacket(s) / Hard Hats: <input type='checkbox' name='HardHat' value='1' " . $checked['HardHat'] . "></tr></td>

				<tr><td>Two Way Radios: <input type='checkbox' name='Radio' value='1' " . $checked['Radio'] . "></tr></td>

				<tr><td>Clothing (Boots, Coat, Gloves): <input type='checkbox' name='Clothing' value='1' " . $checked['Clothing'] . "></tr></td>

				<tr><td>Air Navigation Map: <input type='checkbox' name='AirNavigationMap' value='1' " . $checked['AirNavigationMap'] . "></tr></td>

				<tr><td>Checklists, Manuals & Logbooks: <input type='checkbox' name='CheckList' value='1' " . $checked['Checklist'] . "></tr></td>

				<tr><td>Notepad & Pens: <input type='checkbox' name='Notepad' value='1' " . $checked['Notepad'] . "></tr></td>

				<tr><td>Site Assesment Form: <input type='checkbox' name='SiteAssessment' value='1' " . $checked['SiteAssessment'] . "></tr></td>

				<tr><td>Signs, Safety Tape, Cones: <input type='checkbox' name='Signs' value='1' " . $checked['Signs'] . "></tr></td>

				<tr><td>Flight Battery Packs: <input type='checkbox' name='FlightBattery' value='1' " . $checked['FlightBattery'] . "></tr></td>

				<tr><td>Transmitter Battery Packs: <input type='checkbox' name='TransmitterBattery' value='1' " . $checked['TransmitterBattery'] . "></tr></td>

				<tr><td>Camera Battery Packs: <input type='checkbox' name='CameraBattery' value='1' " . $checked['CameraBattery'] . "></tr></td>

				<tr><td>Ground Station Battery: <input type='checkbox' name='StationBattery' value='1' " . $checked['StationBattery'] . "></tr></td>

				<tr><td>Charger Battery Packs: <input type='checkbox' name='ChargerBattery' value='1' " . $checked['ChargerBattery'] . "></tr></td>

				<tr><td>Mobile Phone Battery: <input type='checkbox' name='PhoneBattery' value='1' " . $checked['PhoneBattery'] . "></tr></td>

				<tr><td>Airframe: <input type='checkbox' name='Airframe' value='1' " . $checked['Airframe'] . "></tr></td>

				<tr><td>Camera Mount: <input type='checkbox' name='CameraMount' value='1' " . $checked['CameraMount'] . "></tr></td>

				<tr><td>Flight Controller / Transmitter(s): <input type='checkbox' name='Transmitters' value='1' " . $checked['Transmitters'] . "></tr></td>

				<tr><td>Calibration Platform: <input type='checkbox' name='CalibrationPlatform' value='1' " . $checked['CalibrationPlatform'] . "></tr></td>

				<tr><td>Camera(s) & Lens(es): <input type='checkbox' name='CameraLens' value='1' " . $checked['CameraLens'] . "></tr></td>

				<tr><td>Camera Connection Leads: <input type='checkbox' name='CameraConnection' value='1' " . $checked['CameraConnection'] . "></tr></td>

				<tr><td>Camera Memory Cards: <input type='checkbox' name='CameraMemory' value='1' " . $checked['CameraMemory'] . "></tr></td>

				<tr><td>Camera to Airframe Lanyard: <input type='checkbox' name='CameraLanyard' value='1' " . $checked['CameraLanyard'] . "></tr></td>

				<tr><td>Camera Attachment Bolt: <input type='checkbox' name='AttachmentBolt' value='1' " . $checked['AttachmentBolt'] . "></tr></td>

				<tr><td>Multi Function Battery Charger: <input type='checkbox' name='MultiFunctionCharger' value='1' " . $checked['MultiFunctionCharger'] . "></tr></td>

				<tr><td>Required Charger Leads: <input type='checkbox' name='RequiredCharger' value='1' " . $checked['RequiredCharger'] . "></tr></td>

				<tr><td>Battery Checker: <input type='checkbox' name='BatteryChecker' value='1' " . $checked['BatteryChecker'] . "></tr></td>

				<tr><td>Screwdrivers (Flat / Cross Drive): <input type='checkbox' name='Screwdrivers' value='1' " . $checked['Screwdrivers'] . "></tr></td>

				<tr><td>Allen Keys: <input type='checkbox' name='AllenKeys' value='1' " . $checked['AllenKeys'] . "></tr></td>

				<tr><td>Pliers (Standard / Long Nose): <input type='checkbox' name='Pliers' value='1' " . $checked['Pliers'] . "></tr></td>

				<tr><td>Cable Ties (Various Sizes): <input type='checkbox' name='CableTies' value='1' " . $checked['CableTies'] . "></tr></td>

				<tr><td>Side Cutters: <input type='checkbox' name='SideCutters' value='1' " . $checked['SideCutters'] . "></tr></td>

				<tr><td>Nylock Propellers Nuts: <input type='checkbox' name='PropellerNuts' value='1' " . $checked['PropellerNuts'] . "></tr></td>

				<tr><td>Spare Props. (Tractor & Pusher): <input type='checkbox' name='SpareProps' value='1' " . $checked['SpareProps'] . "></tr></td>

				<tr><td>Small Socket Set: <input type='checkbox' name='SocketSet' value='1' " . $checked['SocketSet'] . "></tr></td>

				</table>

				<input type='submit' class='btn btn-primary' name='update' value='Update'>

			</form>";

		}

	}

?>