<?php
// Bejelentkezés implementáció ide
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
  <input id="name" placeholder="Felhasználónév" />
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
