<?php
session_start();
require_once("../common.php");
if(!isLoggedIn()||$_SESSION['level']!=1){
	header("Location:../index.php");
}

?>
<html>
  <head>
    <title>Kiírt házifeladatok</title>
    <link rel="stylesheet" href="/rft/css/main.css">
    <link rel="stylesheet" href="/rft/css/student.css">
  </head>
  <body>
    <h1>Házifeladat-beadó Rendszer</h1>
    <div id="valign">
      <div id="box">
        <h2 id="kiírt-házifeladatok">Kiírt házifeladatok</h2>

        <ul id="hfs">
          <?php
           // Itt kell lekérés az adatbázisból.
           // A kétféle formátum lent látható.
           ?>
          <li>
            <form class="card">
              <p class="subject">Történelem</p>
              <p class="topic">A Dualizmus-kora - Házidolgozat</p>
              <div class="flexer">
                <p class="student">Diák neve: Kis Pista</p>
                <a href="#"><p>Csatolmány letöltése</p></a>
              </div>
              <input type="number" min="1" max="5" placeholder="Osztályzat" />
              <input type="submit" value="Osztályzat adása" />
              <p class="date">2020.01.01</p>
            </form>
          </li>
          <li>
            <form class="card">
              <p class="subject">Bevezetés az Informatikába</p>
              <p class="topic">Egyszerű tömörítési algoritmusok</p>
              <div class="flexer">
                <p class="student">Diák neve: Kis Pista</p>
                <p class="grade">Osztályzat: 3</p>
              </div>
              <p class="date">2019.06.12</p>
            </form>
          </li>
        </ul>

        <p class="centered"><a href="dashboard.php">Vissza</a></p>

      </div>
    </div>
  </body>
</html>
