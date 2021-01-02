<?php
session_start();
if(isset($_SESSION["username"]))
$username1=$_SESSION["username"];
$pass1='';
$dbname1='mywebsite';

$user1='root'; $conn1=mysqli_connect('localhost',$user1,$pass1,$dbname1);
if(isset($_POST['like'])){
	$sql1 ="SELECT * FROM clients where username='$username1'";
    $result1 = mysqli_query($conn1,$sql1);
    $row1=mysqli_fetch_assoc($result1);

    $query1 = "insert into likes(userid,destinationid) values('".$row1['id']."','".$_POST['id']."')";
    mysqli_query($conn1,$query1);

    mysqli_close($conn1);
    header('Location:destinations.php');
}
if(isset($_POST['unlike'])){
	$sql1 ="SELECT * FROM clients where username='$username1'";
    $result1 = mysqli_query($conn1,$sql1);
    $row1=mysqli_fetch_assoc($result1);

    $query1 = "DELETE FROM likes WHERE userid='".$row1['id']."' AND destinationid='".$_POST['id']."'";
    mysqli_query($conn1,$query1);

    mysqli_close($conn1);
    header('Location:destinations.php');
}
if (isset($_POST['trimite'])&&isset($_POST['Comentariu'])){
    $sql1 ="SELECT * FROM clients where username='$username1'";
    $result1 = mysqli_query($conn1,$sql1);

    $row1=mysqli_fetch_assoc($result1);
    $data1=date("Y-m-d");
    $comentariu1=$_POST['Comentariu'];

    $query1 = "insert into comentarii(Id_client,Data,Comentariu) values('".$row1['id']."','$data1','$comentariu1')";
    mysqli_query($conn1,$query1);

    mysqli_close($conn1);
    header('Location:destinations.php');
}
?>
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
	  <li class="nav-item" style="position:absolute;right:120px;top:2px">
	   <button class="button" onclick="location.href='userregistration.php';" style="width:auto;">Register</button>
	  </li>
	 <?php
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
</header>
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
	$sql1 ="SELECT * FROM likes";
                $result1 = mysqli_query($conn1,$sql1);
                $resultCheck1=mysqli_num_rows($result1);
				$userid=0;
                $count=0;
				$liked=0;
				if(isset($_SESSION["username"])){
				$sql2="SELECT * FROM clients WHERE username='".$_SESSION["username"]."'";
				$result2=mysqli_query($conn1,$sql2);
				
				if($result2){
					$row2=$result2->fetch_assoc();
					$userid=$row2["id"];
				}
				}
                if($resultCheck1>0)
                while($row1=mysqli_fetch_assoc($result1)) {
                   if($row1["destinationid"]== $row["Id"])
				   {
					   $count++;
			           if($row1["userid"]==$userid)
						   $liked=1;
			       }
                 
                  
                }
				
			echo "
             <div class='row'>
                <div class='col-md-6 how-img'>
		          <img src='".$row["Poza"]."' class='img-fluid' alt=''/>
	           </div>
				<div class='col-md-6'>
					<h4 style='margin-left:-25%;'>".$row["Titlu"]."</h4>
				<p class='text-muted' style='margin-left:-25%;'>".$row["Descriere"]."</p>
				</div>
			";
			if(isset($_SESSION["username"]))
				if($liked==0)
					echo "
						<form action='' method='post' >
							<input type='hidden' name='id' value='".$row["Id"]."'>
							<input style='margin-left:15px;margin-top:4px' font size='4' color=white  name='like' type='submit' value='LIKE'></font>
						</form>";
				else
					echo "
						<form action='' method='post' >
							<input type='hidden' name='id' value='".$row["Id"]."'>
							<input style='color:white;background-color:blue;margin-left:15px;margin-top:4px' font size='4' color=white  name='unlike' type='submit' value='LIKED'></font>
						</form>";
			echo "
				<p style='margin-top:4px;margin-left:15px'>Liked by ".$count." users</p>
			</div> 
		    ";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
</div>
 <div id="extra">
        <div class="container">

                <?php
                $sql1 ="SELECT * FROM comentarii";
                $result1 = mysqli_query($conn1,$sql1);
                $resultCheck1=mysqli_num_rows($result1);
                $i=0;

                if($resultCheck1>0)
                while($row1=mysqli_fetch_assoc($result1)) {

                    echo "<div  style='  width: 100%;
                                                          padding: 10px;
                                                          border: 1px solid black;
                                                          margin: 2px; 
                                                          align-content: center;
                                                          background-color: #c18bc9'>";


                    echo"
                    <section  > 
                    <span  >Utilizator : ";
                    $id_client1=$row1["Id_client"];
                    $sql2 ="SELECT username FROM clients where id='$id_client1'";
                    $result2 = mysqli_query($conn1,$sql2);
                    $resultCheck2=mysqli_num_rows($result2);

                    if($resultCheck2==1){
                        $row2=mysqli_fetch_assoc($result2);

                        echo $row2["username"];  }
					
                    echo"</span><br>  Data : ";
                    echo $row1['Data'];

                    echo" <hr><br>
                    <span  ><strong>"; echo $row1['Comentariu']; echo"</strong></span>
                    </section></div>";
                  
                }

                ?>

        </div>

            </div>




<br><br>
<div class="container">
<?php
if(isset($_SESSION["username"])):?>
<form  action="" method="post" >
    <font size="3" color=black><strong>LASA-NE O PARERE<br></strong><br><input name="Comentariu" type="text" placeholder="Ce crezi despre destinatiile noastre?"  size="15" required><br><br></font>

    <input font size="4" color=white  name="trimite" type="submit" value="SEND"></font>
</form>
<?php
else:
?>
<p>You have to be logged in in order to leave comments!</p>
<?php endif; ?>
</div>
    <footer class="the-footer">
       <hr>
	 <h3 style="color:#16a695">Break free</h3>
      	 
   </footer>  
    </header>
</body>
</html>