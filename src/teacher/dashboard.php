<?php
session_start();
if(!isSet($_SESSION['belepve'])){
	header("Location:../index.php");
}

?>

<html>
  <head>
    <title>Tanári felület</title>
    <link rel="stylesheet" href="/rft/css/main.css">
  </head>
  <body>
    <h1>Házifeladat-beadó Rendszer</h1>
    <div id="valign">
      <div id="box">
        <h2 id="tanári-felület">Tanári felület</h2>

        <p class="centered"><a href="assignments.php">Jelenleg kiadott házifeladatok</a></p>

        <p class="centered"><a href="create_assignment.php">Új házifeladat kiírása</a></p>

        <p class="centered"><a href="classes.php">Osztályok</a></p>

        <form action="kijelentkezes.php" method="post">
          <input type="submit" value="Kijelentkezés" />
        </form>

      </div>
    </div>
  </body>
</html>
