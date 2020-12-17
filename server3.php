<?php 
	session_start();
	$db1 = mysqli_connect('localhost', 'root', '', 'mywebsite');
	$titlu ="" ;
	$descriere = "";
	
	$update1 = false;
	if (isset($_POST['update'])) {
		$titlu = $_POST['titlu'];
		$descriere = $_POST['descriere'];
		mysqli_query($db1, "UPDATE textintro SET Descriere='$descriere',Titlu='$titlu'");
		$_SESSION['message'] = "Home page updated!"; 
		header('location: admin-index-descriere.php');
	}
?>