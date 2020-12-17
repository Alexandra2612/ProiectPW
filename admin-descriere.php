<?php  include('server2.php'); ?>
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
<form action="admin.php">
    <input type="submit" value="Back" />
</form>

<?php $results1 = mysqli_query($db1, "SELECT * FROM descriere"); ?>
<table style="margin-left:3%;margin-right:3%">
	<thead>
		<tr>
			<th>Titlu1</th>
			<th>Descriere</th>
			<th>Titlu2</th>
			<th>Action</th>
		</tr>
	</thead>	
	<?php while ($row1 = mysqli_fetch_array($results1)) { ?>
		<tr style="border:3px solid #5b7385;padding:5px;">
			<td><?php echo $row1['Titlu1']; ?></td>
			<td><?php echo $row1['Descriere']; ?></td>
			<td><?php echo $row1['Titlu2']; ?></td>
			<td style="height:50px;">
				<a href="admin-descriere.php" class="button" >Edit</a>
			</td>
		</tr>
	<?php } ?>
</table>
<form style="width:30%;margin-left:50px" method="post" action="server2.php" >
		<div class="input-group">
			<label>Titlu1</label>
			<input type="text" name="titlu1" value="">
		</div>
		<div class="input-group">
			<label>Descriere</label>
			<input type="text" name="descriere" value="">
		</div>
		<div class="input-group">
			<label>Titlu2</label>
			<input type="text" name="titlu2" value="">
		</div>
		<div class="input-group">
				<button style="width:25%" class="button" type="submit" name="update" style="background: #556B2F;" >update</button>
		</div>
</form>
<div style="margin-left:1%;margin-right:1%;padding:1%;border-style:double;">
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

$sql1 = "SELECT * FROM descriere";
$result1 = $conn1->query($sql1);

if ($result1->num_rows > 0) {
  // output data of each row
  while($row1 = $result1->fetch_assoc()) {
	echo "
		<h3 align='middle'>".$row1["Titlu1"]."</h3>
		<br>
		<p style='color:#6c6ce6' align='middle'>".$row1["Descriere"]."</p>
		</section>
		<br>
		<br>
		<br>
		<br>
		<h3>".$row1["Titlu2"]."</h3>
		<br>
	";
  }
} else {
  echo "0 results";
}
$conn1->close();
?>
</div>
</body>
</html>