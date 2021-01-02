<?php
session_start();
if(isset($_SESSION["username"]))
$username=$_SESSION["username"];
$pass='';
$dbname='mywebsite';

$user='root'; $conn=mysqli_connect('localhost',$user,$pass,$dbname);

if (isset($_POST['trimite'])&&isset($_POST['Comentariu'])){
    $sql ="SELECT * FROM clients where username='$username'";
    $result = mysqli_query($conn,$sql);

    $row=mysqli_fetch_assoc($result);
    $data=date("Y-m-d");
    $comentariu=$_POST['Comentariu'];

    $query = "insert into comentarii(Id_client,Data,Comentariu) values('".$row['id']."','$data','$comentariu')";
    mysqli_query($conn,$query);

    mysqli_close($conn);
    header('Location:comments.php');
}
?>

<!-- Banner -->

<div <html>

    <head>
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
<br>
    <div id="extra">
        <div class="container">

                <?php
                $sql ="SELECT * FROM comentarii";
                $result = mysqli_query($conn,$sql);
                $resultCheck=mysqli_num_rows($result);
                $i=0;

                if($resultCheck>0)
                while($row=mysqli_fetch_assoc($result)) {

                    echo "<div  style='  width: 1200px;
                                                          padding: 10px;
                                                          border: 1px solid black;
                                                          margin: 2px; 
                                                          align-content: center;
                                                          background-color: #c18bc9'>";


                    echo"
                    <section  > 
                    <span  >Utilizator : ";
                    $id_client=$row["Id_client"];
                    $sql1 ="SELECT username FROM clients where id='$id_client'";
                    $result1 = mysqli_query($conn,$sql1);
                    $resultCheck1=mysqli_num_rows($result1);

                    if($resultCheck1==1){
                        $row1=mysqli_fetch_assoc($result1);

                        echo $row1["username"];  }
					
                    echo"</span><br>  Data : ";
                    echo $row['Data'];

                    echo" <hr><br>
                    <span  ><strong>"; echo $row['Comentariu']; echo"</strong></span>
                    </section></div>";
                  
                }

                ?>

        </div>

            </div>




<br><br>
<div style="width:50%;margin-left:19%">
<?php
if(isset($_SESSION["username"])):?>
<form action="" method="post" >
    <font size="3" color=black><strong>LASA-NE O PARERE<br></strong><br><input name="Comentariu" type="text" placeholder="Ce crezi despre destinatiile noastre?"  size="15" required><br><br></font>

    <input font size="4" color=white  name="trimite" type="submit" value="SEND"></font>
</form>
<?php
else:
?>
<p>You have to be logged in in order to leave comments!</p>
<?php endif; ?>
</div>
</div>
</body>
</html>
