<?php


	//test comment

	include 'functions/dbConnection.php';

	function getStudentNames(){

		$query = $myPDO->query("SELECT NaamStudent FROM database");

		foreach ($result as $row) {
			
			print $row['NaamStudent'] . "</br>";
            
            $test = "test variable";

		}
		
	}

?>