<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'mywebsite');
	$poza = "";
	$titlu = "";
	$descriere = "";
	$id = 0;
	$update = false;
	if (isset($_POST['save'])) {
		$poza = $_POST['poza'];
		$titlu = $_POST['titlu'];
        $descriere=$_POST['descriere'];
		mysqli_query($db, "INSERT INTO destinatii (Poza, Titlu,Descriere) VALUES ('$poza', '$titlu','$descriere')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: admin.php');
	}
