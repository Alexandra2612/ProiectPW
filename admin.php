<?php  include('server.php'); ?>
<html>
<head>
<link rel="stylesheet" href="index.css"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
<form style="width:30%;margin-left:50px" method="post" action="server.php" >
		<div class="input-group">
			<label>Poza</label>
			<input type="text" name="poza" value="">
		</div>
		<div class="input-group">
			<label>Titlu</label>
			<input type="text" name="titlu" value="">
		</div>
		<div class="input-group">
			<label>Descriere</label>
			<input type="text" name="descriere" value="">
		</div>
		<div class="input-group">
			<button style="width:25%" class="button" type="submit" name="save" >Save</button>
		</div>
</form>
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
		          <img src='".$row["Poza"]."' style='width:200px;height:200px' alt=''/>
	           </div>
				<div class='col-md-6'>
					<h4 style='margin-left:-25%;'>".$row["Id"]."] ".$row["Titlu"]."</h4>
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
</body>
</html>