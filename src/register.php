<?php

 // Regisztráció implementáció ide.
 // Ha a $_POST váltózóban a "name" és egyéb változók nem üresek, akkor
 // végezd el a regisztrációt és ne ezt az oldalt jelenítsd meg.

 ?>

<html>
  <head>
    <title>Regisztráció</title>
    <link rel="stylesheet" href="/css/main.css">
    
    <link rel="stylesheet" href="/css/login.css">
    
  </head>
  <body>
    <h1>Házifeladat-beadó Rendszer</h1>
    <div id="valign">
      <div id="box">
        <h2 id="regisztráció">Regisztráció</h2>

        <form action="register.php" method="post">
          <input placeholder="E-mail" type="email" />
          <input id="name" placeholder="Név" />
          <select id="class">
            <?php
             // Itt kell lekérni a szervertől az osztályokat.
             ?>
            <option value="6b">6.b</option>
            <option value="6c">6.c</option>
            <option value="7a">7.a</option>
          </select>
          <input id="parent1" placeholder="Első szülő" />
          <input id="parent2" placeholder="Második szülő" />
          <input type="submit" value="Regisztrálok" />
        </form>

        <p class="centered"><a href="index.php">Vissza a főoldalra</a></p>

      </div>
    </div>
  </body>
</html>
