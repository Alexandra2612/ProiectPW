<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" href="index.css"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<body style="background-color:azure">
  <header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <img src="images/poza3.jpg" alt="Bucegi floare-LOGO" width="60" height="60" />
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Acasa<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="aboutus.php">Despre noi</a>
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
	  <?php
			session_start(); 
	     if(!isset($_SESSION["username"])):?>
	  <li class="nav-item" style="position:absolute;right:10px;top:2px">
	   <button class="button" onclick="location.href='buttons.php';" style="width:auto;">Login</button>
	  </li>
	     <?php endif;?>
	  <?php 
	     if(isset($_SESSION["username"])):?>
	  <li class="nav-item" style="position:absolute;right:10px;top:2px">
	   <button class="button" onclick="location.href='logout.php';" style="width:auto;">Logout</button>
	  </li>
	     <?php endif;?>
    </ul>
  </div>
</nav>
<br>
<?php
if(isset($_SESSION["username"]))
	echo "Utilizatorul conectat : ".$_SESSION["username"];
?>
    </header>
	<br>
    <section>
	
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="background-color:#3a7db0">
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
$sql2 = "SELECT * FROM imagini";
$result2 = $conn1->query($sql2);

	/*<ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>*/
	?>
	<ol class="carousel-indicators">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	<?php
	for ($i=2;$i<$result2->num_rows;i++)
	{
		echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i'></li>";
	}		
	?>
	</ol>
	<div class="carousel-inner">
	<?php
	
	$row2 = $result2->fetch_assoc();
	echo "
		<div class='carousel-item active'>
	<div class='parent d-flex justify-content-center'>
      <img src=".$row2["poza"]." alt='poza' width='600' height='400'>
	  </div>
    </div>
	";
	
	while($row2 = $result2->fetch_assoc();)
	echo "
		<div class='carousel-item'>
	<div class='parent d-flex justify-content-center'>
      <img src=".$row2["poza"]." alt='poza' width='600' height='400'>
	  </div>
    </div>
	";
	?>
	</div>

	<?php
$conn1->close();
?>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



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
$sql2 = "SELECT * FROM textintro";
$result2 = $conn1->query($sql2);

	$row2 = $result2->fetch_assoc();
	echo "
		<br>
      <h1>".$row2["Titlu"]."</h1>
	  <br>
	<p class='text1' style='color:#5a5a85'>".$row2["Descriere"]."</p>
	
	";
	
 
$conn1->close();
?>
</section>
	<br>
	<br>
	<br>
    <footer class="the-footer">
       <hr>
	 <h3 style="color:#16a695">Break free</h3>
      	 
   </footer>  
</body>
</html>
