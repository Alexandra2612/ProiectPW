<?php 
	session_start();
	$db1 = mysqli_connect('localhost', 'root', '', 'mywebsite');
	$poza1 ="" ;
	$id1 = 0;
	$update1 = false;
	if (isset($_POST['save'])) {
		$poza1 = $_POST['imagine'];
		mysqli_query($db1, "INSERT INTO imagini (Imagine) VALUES ('$poza1')"); 
		$_SESSION['message'] = "Changes saved"; 
		header('location: admin-index-pics.php');
	}
	if (isset($_POST['update'])) {
		$id1 = $_POST['id'];
		$poza1 = $_POST['imagine'];
		mysqli_query($db1, "UPDATE imagini SET Imagine='$poza1' WHERE Id=$id1");
		$_SESSION['message'] = "About us page updated!"; 
		header('location: admin-index-pics.php');
	}
	if (isset($_GET['del'])) {
		$id1 = $_GET['del'];
		mysqli_query($db1, "DELETE FROM `despre-noi` WHERE Id=$id1");
		$_SESSION['message'] = "Info in about us page deleted!"; 
		header('location: admin-index-pics.php');
}
?>