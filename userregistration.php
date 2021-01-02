<html>
<head>
  <title>User Register Page</title>
  <link rel="stylesheet" href="index.css"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}
.container {
  width:700px;
  height:700px;
  padding: 70px;
  background-color:white;
  border:7px solid #4f9e1e;
}
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #7eb7e0;
}
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
</style>
</head>
<body style="background-color:azure">
<br>
<br>
<br>
<br>
<form action="" method="post">
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="parola" required>
     
	<label for="mail"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

	<label for="phonbr"><b>Phone Number</b></label>
    <input type="text" placeholder="Enter Phone Number" name="phoneNumber" required>

	 
    <button  name="register" value="register" class="button" type="submit">Register</button>
	<div style="color:red">
<?php  
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=mywebsite", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed to database: " . $e->getMessage();
}
session_start();
$db=mysqli_connect('localhost',$username,$password,'mywebsite');
$username="";
$parola="";  
$email="";
$phoneNumber="";        
if(isset($_POST['register'])){
	        $username = $_POST['username'];
		    $parola = $_POST['parola'];
			$email = $_POST['email'];
			$phoneNumber = $_POST['phoneNumber'];
		    mysqli_query($db, "INSERT INTO clients (username,password,Mail,PhoneNumber) VALUES ('$username', '$parola','$email','$phoneNumber')"); 
		    $_SESSION['message'] = "Registration completed successfully"; 
		header('location: index.php');
            }
?> 
</div>
  </div>
</form>
</body>
</html>