<?php
session_start();
require_once("common.php");
if(!isLoggedIn()||$_SESSION['level']!=0){
	header("Location:index.php");
}
$servername = "localhost";
$username = "rft";
$password = "BCh32TzA14MyhdsZ";
$dbname = "beadando";

$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<html>
  <head>
    <title>Diák Felület</title>
    <link rel="stylesheet" href="/rft/css/main.css">
    
    <link rel="stylesheet" href="/rft/css/student.css">
    
  </head>
  <body>
    <h1>Házifeladat-beadó Rendszer</h1>
    <div id="valign">
      <div id="box">

        <h2 id="diák">          <?php
				$sql = "SELECT * FROM users WHERE id = ".$_SESSION['belepve'];
				$result = $conn->query($sql);
				echo mysqli_error($conn);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						echo $row["firstname"]." ".$row["lastname"];
					}
				}
           ?></h2>

        <h3 id="házifeladatok">Házifeladatok</h3>

        <ul id="hfs">
          <?php
           // Itt legyen az adatbázisból lekérés, mely a lentebb
           // látható módon kell, hogy adatokat kiírjon:
           //<li>
           // <form class="card">
           //   <div>
           //     <p class="subject">Tantárgy</p>
           //     <p class="topic">A feladat neve</p>
           //     <p class="grade">Osztályzat: [szám]</p>
           //   </div>
           //   <p class="date">Dátum</p>
           // </form>
           // </li>
           // Vagy pedig:
           // <li>
           //   <form class="card" action="feltoltes.php" method="post">
           //     <div>
           //       <p class="subject">Tantárgy</p>
           //       <p class="topic">A feladat neve</p>
           //       <p class="grade">Osztályzat: Nincs</p>
           //       <input id="fajl" type="file" placeholder="Fájlok feltöltése" />
           //       <input type="submit" value="Házifeladat beküldése" />
           //     </div>
           //     <p class="date">Dátum</p>
           //   </form>
           // </li>
           ?>
          <li>
            <form class="card">
              <div>
                <p class="subject">Történelem</p>
                <p class="topic">A Dualizmus-kora - Házidolgozat</p>
                <p class="grade">Osztályzat: Nincs</p>
                <input type="file" placeholder="Fájlok feltöltése" />
                <input type="submit" value="Házifeladat beküldése" />
              </div>
              <p class="date">2020.01.01</p>
            </form>
          </li>
          <li>
            <form class="card">
              <div>
                <p class="subject">Bevezetés az Informatikába</p>
                <p class="topic">Egyszerű tömörítési algoritmusok</p>
                <p class="grade">Osztályzat: 3</p>
              </div>
              <p class="date">2019.06.12</p>
            </form>
          </li>
          <li>
            <form class="card">
              <div>
                <p class="subject">Teszt</p>
                <p class="topic">Teszt</p>
                <p class="grade">Osztályzat: 5</p>
              </div>
              <p class="date">2019.01.01</p>
            </form>
          </li>
        </ul>
        <form action="kijelentkezes.php" action="post">
          <input type="submit" value="Kijelentkezés" />
        </form>

      </div>
    </div>
  </body>
</html>
