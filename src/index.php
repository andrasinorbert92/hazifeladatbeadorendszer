
<?php
session_start();
require_once("common.php");
$servername = "localhost";
$username = "rft";
$password = "BCh32TzA14MyhdsZ";
$dbname = "beadando";

$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isSet($_POST["username"])&&isSet($_POST["password"])&&!isLoggedIn())
{
	beleptet($_POST["username"],$_POST["password"],$conn);
	if(!isLoggedIn()) { ?>
	<h5>Rossz felhasználónév vagy jelszó</h5>
	<?php }
	else if(isLoggedIn()){
		if($_SESSION['level']==0)
			header("Location:student.php");
		else if($_SESSION['level']==1)
			header("Location:teacher/dashboard.php");
	 }
}	 
$conn->close();
	
?>

<html>
  <head>
    <title>Bejelentkezés</title>
    <link rel="stylesheet" href="/css/main.css">
    
    <link rel="stylesheet" href="/css/login.css">
    
  </head>
  <body>
    <h1>Házifeladat-beadó Rendszer</h1>
    <div id="valign">
      <div id="box">
        <h2 id="add-meg-az-adataid">Add meg az adataid:</h2>

<form id="login" action="index.php" method="post">
  <input id="username" placeholder="Felhasználónév" />
  <input id="password" placeholder="Jelszó" type="password" />
  <div id="buttons">
    <input type="submit" value="Bejelentkezés" />
    <a href="register.php"><input type="button" value="Regisztráció" /></a>
  </div>
  <p id="reminder"><a href="reminder.php">Elfelejtettem a jelszavam!</a></p>
</form>

      </div>
    </div>
  </body>
</html>
