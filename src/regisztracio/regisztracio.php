<html>
<head>
<meta charset="UTF-8" lang="HU">
<link rel="stylesheet" type="text/css" href="./css/main.css">
<link rel="stylesheet" type="text/css" href="./css/login.css">
<title>Regisztrációs űrlap</title>
</head>
<body>
<h1>Házifeladat-beadó rendszer</h1>
<div id="valign">
<div id="box">
<h2 id="regisztráció">Regisztráció</h2>
<form action="elfogadas.php" method="POST">
Vezetéknév:<input type="text" name="vezeteknev" size="50" required placeholder="pl.:Szabó"><br>
Keresztnév:<input type="text" name="keresztnev" size="50" required placeholder="pl.:István"><br>
Jelszó:<input type="password" name="jelszo1" size="50" required placeholder><br>
Jelszó megint: <input type="password" name="jelszo2" size="50" required placeholder><br>
Születési Dátum: <input type="date" name="datum" max="2014-12-31" size="50" required placeholder="pl.: 1998.04.21"><br>
E-mail:<input type="email" name="email" size="60" required placeholder="pl.:valami@valami.hu"><br>
Szülő1:<input type="text" name="szulo1" size="50" required placeholder="pl.:Szabóné Ilona"><br>
Szülő2:<input type="text" name="szulo2" size="50" required placeholder="pl.:Szabó Péter"><br>
Szülő E-mail:<input type="email" name="szuloemail" size="60" required placeholder="pl.:valami@valami.hu"><br>
<input type="submit" value="Regisztráció">
</form>
</div>
</div>
</body>
</html>