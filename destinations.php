<!DOCTYPE html>
<html>
<head>
  <title>Destinations</title>
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
      <li class="nav-item">
        <a class="nav-link" href="index.php">Acasa<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="aboutus.php">Despre noi</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="calendar.php">Calendar activitati</a>
      </li>
	  <li class="nav-item active">
        <a class="nav-link" href="#">Destinatii</a>
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
<div class="how-section1">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mywebsite";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM destinatii";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	echo "
             <div class='row'>
                <div class='col-md-6 how-img'>
		          <img src='".$row["Poza"]."' class='img-fluid' alt=''/>
	           </div>
				<div class='col-md-6'>
					<h4 style='margin-left:-25%;'>".$row["Titlu"]."</h4>
				<p class='text-muted' style='margin-left:-25%;'>".$row["Descriere"]."</p>
				</div>
			</div>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
</div>
    <footer class="the-footer">
       <hr>
	 <h3 style="color:#16a695">Break free</h3>
      	 
   </footer>  
    </header>
</body>
</html>