<?php 
	session_start();
	$db1 = mysqli_connect('localhost', 'root', '', 'mywebsite');
	$poza1 ="" ;
	$titlu3 = "";
	$subtitlu3="";
	$mail="";
	$id1 = 0;
	$update1 = false;
	if (isset($_POST['save'])) {
		$poza1 = $_POST['imagine'];
		$titlu3 = $_POST['titlu3'];
		$subtitlu3 = $_POST['subtitlu3'];
		$mail=$_POST['mail'];
		mysqli_query($db1, "INSERT INTO `despre-noi` (Imagine, Titlu3,Subtitlu3,Mail) VALUES ('$poza1','$titlu3','$subtitlu3','$mail')"); 
		$_SESSION['message'] = "Changes saved"; 
		header('location: admin-aboutus.php');
	}
	if (isset($_POST['update'])) {
		$id1 = $_POST['id'];
		$poza1 = $_POST['imagine'];
		$titlu3 = $_POST['titlu3'];
		$subtitlu3 = $_POST['subtitlu3'];
		$mail=$_POST['mail'];
		mysqli_query($db1, "UPDATE `despre-noi` SET Imagine='$poza1',Titlu3='$titlu3',Subtitlu3='$subtitlu3',Mail='$mail' WHERE Id=$id1");
		$_SESSION['message'] = "About us page updated!"; 
		header('location: admin-aboutus.php');
	}
	if (isset($_GET['del'])) {
		$id1 = $_GET['del'];
		mysqli_query($db1, "DELETE FROM `despre-noi` WHERE Id=$id1");
		$_SESSION['message'] = "Info in about us page deleted!"; 
		header('location: admin-aboutus.php');
}
?>