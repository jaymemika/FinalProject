<?php 
	session_start();
	$db = mysqli_connect("localhost", "root", "root", "SchedulePlanner");

	// initialize variables
	$Crn = "";
	$Subject = "";
	$Number = "";
	$Title = "";
	$Day = "";
	$Time = "";
	$Instructor = "";
	$Attributes = "";
	$Credits = "";
	$Description = "";
	
	$update = false;

	if (isset($_POST['save'])) {
		$Crn = $_POST['Crn'];
		$Subject = $_POST['Subject'];
		$Number = $_POST['Number'];
		$Title = $_POST['Title'];
		$Day = $_POST['Day'];
		$Time = $_POST['Time'];
		$Instructor = $_POST['Instructor'];
		$Attributes = $_POST['Attributes'];
		$Credits = $_POST['Credits'];
		$Description = $_POST['Description'];

		mysqli_query($db, "INSERT INTO SchedulePlanner (Crn, Subject, Number, Title, Day, Time, Instructor, Attributes, Credits, Description) VALUES ('$Crn', '$Subject', '$Number', '$Title', '$Day', '$Time', '$Instructor', '$Attributes', '$Credits', '$Description')"); 
		$_SESSION['message'] = "Class added!"; 
		header('location: Class.php');
	}

// updated

	if (isset($_POST['update'])) {
	$Crn = $_POST['Crn'];
	$Subject = $_POST['Subject'];
	$Number = $_POST['Number'];	
	$Title = $_POST['Title'];
	$Day = $_POST['Day'];
	$Time = $_POST['Time'];
	$Instructor = $_POST['Instructor'];
	$Attributes = $_POST['Attributes'];
	$Credits = $_POST['Credits'];
	$Description = $_POST['Description'];

	mysqli_query($db, "UPDATE SchedulePlanner SET Crn='$Crn', Subject='$Subject', Number='$Number', Title='$Title', Day='$Day', Time='$Time', Instructor='$Instructor', Attributes='$Attributes', Credits='$Credits', Description='$Description' WHERE Crn=$Crn");
	$_SESSION['message'] = "Class updated!"; 
	header('location: Class.php');
}

//delete

if (isset($_GET['del'])) {
	$Crn = $_GET['del'];
	mysqli_query($db, "DELETE FROM SchedulePlanner WHERE Crn=$Crn");
	$_SESSION['message'] = "Class deleted!"; 
	header('location: Class.php');
}