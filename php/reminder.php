<html>
  <head>
    <title>Jelszóemlékeztető</title>
    <link rel="stylesheet" href="/css/main.css">
    
    <link rel="stylesheet" href="/css/reminder.css">
    
    <link rel="stylesheet" href="/css/login.css">
    
  </head>
  <body>
    <h1>Házifeladat-beadó Rendszer</h1>
    <div id="valign">
      <div id="box">
        <h2 id="jelszóemlékeztető">Jelszóemlékeztető</h2>

        <?php
         // Ha isset($_POST["email"]), akkor küldj emlékezetetőt és
         // irányíts át a reminder_sent.php oldalra,
         // különben jelenítsd meg a formot.
         ?>
        
<form action="reminder.php" method="post">
    <p id="desc">Ezen az oldalon kérhetsz jelszó emlékeztetőt magadnak, ha
    elfelejtetted a mostani jelszavad.</p>
    <input id="email" placeholder="E-mail cím" type="email" />
    <div id="buttons">
        <input type="submit" value="Emlékeztető küldése" />
    </div>
</form>

<p class="centered"><a href="index.php">Vissza a főoldalra</a></p>

      </div>
    </div>
  </body>
</html>
