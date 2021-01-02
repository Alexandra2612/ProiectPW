<!DOCTYPE html>
<html>
<head>
  <title>Calendar</title>
  <link rel="stylesheet" href="index.css"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 85%;
  table-rows:
}

td, th {
  border: 3px solid #5b7385;
  text-align: left;
  padding: 10px;
}

tr:nth-child(n) {
  background-color: #aed5f2;
}
td {
   font-family:"Trebuchet MS", Helvetica, sans-serif;
}
</style>
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
	  <li class="nav-item active">
        <a class="nav-link" href="#">Calendar activitati</a>
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
<br>
<div style="margin-left:1%">
<h2 style="color:#b51d61">Tabel luna octombrie</h2>
<br>
<br>
<p style="color:#b51d61">Reducere <span id="reducere">10</span>% pentru cei ce se inscriu pana in 5 septembrie</p>
<table id="my-table">
  <tr>
    <th style="color:#37662f">Perioada</th>
	<th style="color:#37662f">Ghid</th>
    <th style="color:#37662f">Destinatie</th>
    <th style="color:#37662f">Detalii</th>
	<th style="color:#37662f">Pret</th>
  </tr>
  <tr>
    <td>12-15</td>
    <td>Maria Andrei</td>
    <td>Marseille,Franta</td>
	<td>Plecarea va avea loc cu avionul prin Lufthansa.Biletele de avion vor fi achizitionate pe cont propriu si deci nu vor fi incluse in pret.<span id="dots">...</span><span id="more">In prima zi ajungem si ne cazam la un hotel de 3 stele aproape de port.Micul dejun si cina se iau la hotel.A doua zi vom pleca cu vaporul sa vizitam insulele din zona.La intoarcere ne vom opri in port sa mancam fructe de mare sau fiecare ce isi doreste.Vom vizita biserica ce se vede din port si muzeul.</span><button  class="more" onclick="myFunction()" id="myBtn">Read more</button></td>
	<td>300 euro</td>
  </tr>
  <tr>
    <td>15-17</td>
    <td>Mihai Crang</td>
    <td>Viena,Austria</td>
	<td>Plecarea va fi la 8:00 dimineata cu autocarul din fata sediului nostru.<span id="dots1">...</span><span id="more1">In prima zi ne vom caza intr-un hotel de 3 stele,unde vom manca pranzul.Apoi vom face cumparaturi int-un centru comercial.A doua zi vom vizita gradina zoo si castelul Schonbrunn.Pentru cei care isi doresc exista posibilitatea de croaziera la pretul de 35 euro.</span><button class="more" onclick="myFunction1()" id="myBtn1">Read more</button></td>
	<td>150 euro</td>
  </tr>
  <tr>
    <td>18-20</td>
	<td>George Vespa</td>
    <td>Muntii Apuseni,Romania</td>
    <td>Plecare la ora 8:30 dimineata cu autocarul din fata sediului.<span id="dots2">...</span><span id="more2">In prima zi ne vom caza intr-o cabana.Precum e zona de munte,fiecare isi ia de acasa mancare pentru toata perioada sejurului.Vom face drumetii si foc de tabara in a doua seara.</span><button class="more" onclick="myFunction2()" id="myBtn2">Read more</button></td>
    <td>100 euro</td>
  </tr>
  <tr>
    <td>20-27</td>
    <td>Andreea Caras</td>
    <td>Bordeaux,Franta</td>
    <td>Plecare cu avionul.Biletele vor fi achizitionate pe cont propriu si deci nu vor fi incluse in pret.<span id="dots3">...</span><span id="more3">In pima zi ne vom caza intr-un hotel de 3 stele in centrul orasului.Ne vom plimba prin centru si vom lua cina intr-unul din restaurantele din centru.Fiecare pe unde doreste.Dupa ce vizitam obiectivele turistice ale orasului,vom pleca cu trenul spre Arcachon,unde vom fi cazati int-o pensiune timp de doua zile pe malul oceanului.</span><button class="more" onclick="myFunction3()" id="myBtn3">Read more</button></td>
    <td>1200 euro</td>
  </tr>
</table>
</div>
       <br>
	<br>
	<br>
    <footer class="the-footer">
       <hr>
	 <h3 style="color:#16a695">Break free</h3>
      	 
   </footer>   
    </header>
	<script>
	function appendColumn() {
    var tbl = document.getElementById('my-table'), // table reference
        i, red = document.getElementById('reducere');
    // open loop for each row and append cell
	
	var div = document.createElement('div'), // create DIV element
        txt = document.createTextNode('Pret dupa reducere'); // create text node
    div.appendChild(txt);                    // append text node to the DIV
	div.setAttribute('style', 'color:#37662f;font-weight:bold;text-align: left;padding: 10px;');
    div.setAttribute('class', 'col');        // set DIV class attribute
    div.setAttribute('className', 'col');    // set DIV class attribute for IE (?!)
    (tbl.rows[0].insertCell(tbl.rows[0].cells.length)).appendChild(div);                   // append DIV to the table cell
	
    for (i = 1; i < tbl.rows.length; i++) {
		var pret=(parseInt(tbl.rows[i].cells[(tbl.rows[i].cells.length)-1].innerHTML))*((100-parseInt(red.innerHTML))/100);
		var str=(pret.toString()).concat(" euro");
        createCell(tbl.rows[i].insertCell(tbl.rows[i].cells.length), str, 'col');
    }
}
function createCell(cell, text, style) {
    var div = document.createElement('div'), // create DIV element
        txt = document.createTextNode(text); // create text node
    div.appendChild(txt);                    // append text node to the DIV
    div.setAttribute('class', style);        // set DIV class attribute
    div.setAttribute('className', style);    // set DIV class attribute for IE (?!)
    cell.appendChild(div);                   // append DIV to the table cell
}
appendColumn();
	</script>
	<script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>
<script>
function myFunction1() {
  var dots = document.getElementById("dots1");
  var moreText = document.getElementById("more1");
  var btnText = document.getElementById("myBtn1");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>
<script>
function myFunction2() {
  var dots = document.getElementById("dots2");
  var moreText = document.getElementById("more2");
  var btnText = document.getElementById("myBtn2");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>
<script>
function myFunction3() {
  var dots = document.getElementById("dots3");
  var moreText = document.getElementById("more3");
  var btnText = document.getElementById("myBtn3");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>

</body>
</html>