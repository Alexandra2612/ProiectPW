<?php  include('server4.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$id1 = $_GET['edit'];
		$update1 = true;
		$record1 = mysqli_query($db1, "SELECT * FROM imagini WHERE Id=$id1");
        $n1=mysqli_fetch_array($record1);
		if (count($n1) == 1 ) {
			$poza1 = $n1['Imagine'];
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
<?php $results1 = mysqli_query($db1, "SELECT * FROM imagini"); ?>
<table style="margin-left:3%;margin-right:3%">
	<thead>
		<tr>
			<th>Imagine</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>	
	<?php while ($row1 = mysqli_fetch_array($results1)) { ?>
		<tr style="border:3px solid #5b7385;padding:5px;">
			<td><?php echo $row1['Imagine']; ?></td>
			<td style="height:50px;">
				<a href="admin-index-pics.php?edit=<?php echo $row1['Id']; ?>" class="button" >Edit</a>
			</td>
			<td>
				<a href="server4.php?del=<?php echo $row1['Id']; ?>" class="button">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
<form style="width:30%;margin-left:50px" method="post" action="server4.php" >
		<div class="input-group">
			<input type="hidden" name="id" value="<?php echo $id1?>">
		</div>
		<div class="input-group">
			<label>Imagine</label>
			<input type="text" name="imagine" value="">
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
	<<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="background-color:#3a7db0">
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
	for ($i=1;$i<$result2->num_rows;$i++)
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
      <img src=".$row2["Imagine"]." alt='poza' width='600' height='400'>
	  </div>
    </div>
	";
	
	while($row2 = $result2->fetch_assoc())
	echo "
		<div class='carousel-item'>
	<div class='parent d-flex justify-content-center'>
      <img src=".$row2["Imagine"]." alt='poza' width='600' height='400'>
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
</div>
</body>
</html>