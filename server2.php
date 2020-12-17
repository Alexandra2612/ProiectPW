<?php 
	session_start();
	$db1 = mysqli_connect('localhost', 'root', '', 'mywebsite');
	$titlu1 ="" ;
	$titlu2 ="" ;
	$descriere = "";
	
	$update1 = false;
	if (isset($_POST['update'])) {
		$titlu1 = $_POST['titlu1'];
		$titlu2 = $_POST['titlu2'];
		$descriere = $_POST['descriere'];
		mysqli_query($db1, "UPDATE descriere SET Descriere='$descriere',Titlu1='$titlu1',Titlu2='$titlu2'");
		$_SESSION['message'] = "About us page updated!"; 
		header('location: admin-descriere.php');
	}
?>