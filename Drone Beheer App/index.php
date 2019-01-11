<div class='container-fluid'>
<h1>Studenten</h1>

<?php  

	include 'functions/dbConnection.php';
	include 'classes/student.class.php';
	include 'functions/config.php';

	getStudentNames($Conn);

?>
</div>