<!DOCTYPE html>
<html>
<head>
  <title>About us</title>
  <link rel="stylesheet" href="index.css"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<body style="background-color:azure;">
  <header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <img src="images/poza3.jpg" alt="Bucegi floare-LOGO" width="60" height="60" />
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Acasa<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Despre noi</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="calendar.php">Calendar activitati</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="destinations.php">Destinatii</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="announcements.php">Informatii utile</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
	  <li class="nav-item" style="position:absolute;right:10px;top:2px">
	   <button class="button" onclick="location.href='buttons.php';" style="width:auto;">Login</button>
	  </li>
    </ul>
  </div>
</nav>
    </header>
	<div style="margin-left:1%;margin-right:1%">
	<section>
	<br>
	<?php
	
$servername1 = "localhost";
$username1 = "root";
$password1 = "";
$dbname1 = "mywebsite";

// Create connection
$conn1 = new mysqli($servername1, $username1, $password1, $dbname1);
// Check connection
if ($conn1->connect_error) {
  die("Connection failed: " . $conn1->connect_error);
}
$sql2 = "SELECT * FROM descriere";
$result2 = $conn1->query($sql2);

$sql1 = "SELECT * FROM `despre-noi`";
$result1 = $conn1->query($sql1);

	$row2 = $result2->fetch_assoc();
	echo "
		<h3 align='middle'>".$row2["Titlu1"]."</h3>
		<br>
		<p style='color:#6c6ce6' align='middle'>".$row2["Descriere"]."</p>
		</section>
		<br>
		<br>
		<br>
		<br>
		<h3>".$row2["Titlu2"]."</h3>
		<br>
	";





if ($result1->num_rows > 0) {
  // output data of each row
  while($row1 = $result1->fetch_assoc()) {
	echo "
	<div class='card' style='width: 18rem;display:inline-block'>
  <img class='card-img-top' src='".$row1["Imagine"]."' alt='Chief Executive Officer' width='200' height='200'/>
  <div class='card-body'>
    <h5 class='card-title'>".$row1["Titlu3"]."</h5>
    <p class='card-text'>".$row1["Subtitlu3"]."</p>
	<p class='card-text'>".$row1["Mail"]."</p>
  </div>
</div>";
  }
} else {
  echo "0 results";
}
$conn1->close();
?>
</div>
	<br>
	<br>
	<br>
    <footer class="the-footer">
       <hr>
	 <h3 style="color:#16a695">Break free</h3>
      	 
   </footer>  
</body>
</html>