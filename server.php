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
		$_SESSION['message'] = "Destination saved"; 
		header('location: admin.php');
	}
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$poza = $_POST['poza'];
		$titlu = $_POST['titlu'];
		$descriere=$_POST['descriere'];
		mysqli_query($db, "UPDATE destinatii SET Poza='$poza', Titlu='$titlu',Descriere='$descriere' WHERE Id=$id");
		$_SESSION['message'] = "Destination updated!"; 
		header('location: admin.php');
	}
	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM destinatii WHERE Id=$id");
		$_SESSION['message'] = "Destination deleted!"; 
		header('location: admin.php');
}
?>