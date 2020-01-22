<?php
session_start();
require_once("../common.php");
if(!isLoggedIn()||$_SESSION['level']!=1){
	header("Location:../index.php");
}

?>
<html>
  <head>
    <title>Osztályok</title>
    <link rel="stylesheet" href="/rft/css/main.css">
    <link rel="stylesheet" href="/rft/css/classes.css">
  </head>
  <body>
    <h1>Házifeladat-beadó Rendszer</h1>
    <div id="valign">
      <div id="box">
        <h2 id="osztályok-lekérése">Osztályok lekérése</h2>

        <form id="classchooser" action="classes.php" method="post">
          <select id="class">
            <?php
             // Itt kell lekérni a szervertől milyen osztályok vannak.
             ?>
            <option value="6b">6.b</option>
            <option value="6c">6.c</option>
            <option value="7a">7.a</option>
          </select>
          <input type="submit" value="Osztály lekérése" />
        </form>

        <hr style="width: 80%; margin-bottom: 3rem;" />

        <div id="class_table">
          <?php
           // Itt kell lekérni, hogy kik egy-egy osztály diákjai.
           // A kiíratás módját a lentebbi példák mutatják.
           ?>
          <div class="person">
            <p class="name">Kis Pista</p>
            <div class="grades">
              <div class="grade_item">
                <p class="topic">Bevezetés az Informatikába</p>
                <p class="grade">3</p>
              </div>
              <div class="grade_item">
                <p class="topic">Matematika</p>
                <p class="grade">5</p>
              </div>
            </div>
          </div>
          <div class="person">
            <p class="name">Szabó Ferenc</p>
            <div class="grades">
              <div class="grade_item">
                <p class="topic">Programozás</p>
                <p class="grade">5</p>
              </div>
              <div class="grade_item">
                <p class="topic">Tánc</p>
                <p class="grade">1</p>
              </div>
            </div>
          </div>
          <div class="person">
            <p class="name">Mégnincsjegye Győző</p>
            <div class="grades"></div>
          </div>
        </div>

        <p class="centered"><a href="dashboard.php">Vissza</a></p>

      </div>
    </div>
  </body>
</html>
