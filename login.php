<html>
<head>
  <title>Login Page</title>
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
  width:500px;
  height:450px;
  padding: 60px;
  background-color: white;
  border:7px solid #275659;
}
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
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

    <button  name="login" value="login" class="button" type="submit">Login</button>
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
if(isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['parola'])){
	        $conn=mysqli_connect('localhost',$username,$password,'mywebsite');
            $user=$_POST['username'];
            $sql ="SELECT * FROM users where username='$user'";
            $result = mysqli_query($conn,$sql);
            $resultCheck=mysqli_num_rows($result);
            if($resultCheck>0) {
                $row = mysqli_fetch_assoc($result);
                $hash=password_hash($row['password'],PASSWORD_DEFAULT);
                if (password_verify($_POST['parola'],$hash)) {
                    $_SESSION["username"] = $user;
                    $_SESSION["logged_in"] = true;
                    header('Location:admin.php');

                }
                else echo("Parola incorecta!");

            }
            else echo("Utilizatorul nu exista!");
    mysqli_close($conn);
}
?> 
</div>
  </div>
</form>
</body>
</html>