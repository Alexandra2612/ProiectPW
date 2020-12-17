<?php  include('server1.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$id1 = $_GET['edit'];
		$update1 = true;
		$record1 = mysqli_query($db1, "SELECT * FROM `despre-noi` WHERE Id=$id1");
        $n1=mysqli_fetch_array($record1);
		if (count($n1) == 1 ) {
			$poza1 = $n1['Imagine'];
			$titlu3 = $n1['Titlu3'];
			$subtitlu3=$n1['Subtitlu3'];
			$mail=$n1["Mail"];
		}
	}
?>
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
<?php $results1 = mysqli_query($db1, "SELECT * FROM `despre-noi`"); ?>
<table style="margin-left:3%;margin-right:3%">
	<thead>
		<tr>
			<th>Imagine</th>
			<th>Titlu3</th>
			<th>Subtitlu3</th>
			<th>E-mail</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>	
	<?php while ($row1 = mysqli_fetch_array($results1)) { ?>
		<tr style="border:3px solid #5b7385;padding:5px;">
			<td><?php echo $row1['Imagine']; ?></td>
			<td><?php echo $row1['Titlu3']; ?></td>
			<td><?php echo $row1['Subtitlu3']; ?></td>
			<td><?php echo $row1['Mail']; ?></td>
			<td style="height:50px;">
				<a href="admin-aboutus.php?edit=<?php echo $row1['Id']; ?>" class="button" >Edit</a>
			</td>
			<td>
				<a href="server1.php?del=<?php echo $row1['Id']; ?>" class="button">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
<form style="width:30%;margin-left:50px" method="post" action="server1.php" >
		<div class="input-group">
			<input type="hidden" name="id" value="<?php echo $id1?>">
		</div>
		<div class="input-group">
			<label>Imagine</label>
			<input type="text" name="imagine" value="">
		</div>
		<div class="input-group">
			<label>Titlu3</label>
			<input type="text" name="titlu3" value="">
		</div>
		<div class="input-group">
			<label>Subtitlu3</label>
			<input type="text" name="subtitlu3" value="">
		</div>
		<div class="input-group">
			<label>E-mail</label>
			<input type="text" name="mail" value="">
		</div>
		<div class="input-group">
			<?php if ($update1 == true): ?>
				<button style="width:25%" class="button" type="submit" name="update" style="background: #556B2F;" >update</button>
			<?php else: ?>
				<button style="width:25%" class="button" type="submit" name="save" >Save</button>
			<?php endif ?>
		</div>
</form>
<div style="margin-left:1%;margin-right:1%">
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

$sql1 = "SELECT * FROM `despre-noi`";
$result1 = $conn1->query($sql1);

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
</body>
</html>