<html>
<head>
<meta charset="UTF-8" lang="HU">
<link rel="stylesheet" type="text/css" href="../css/fooldal.css">
<title>Regisztrációs űrlap</title>
</head>
<body>
<div class="main" style="width:40%">
<form action="elfogadas.php" method="POST">
Vezetéknév:<input type="text" name="vezeteknev" size="50" required placeholder="pl.:Szabó"><br>
Keresztnév:<input type="text" name="keresztnev" size="50" required placeholder="pl.:István"><br>
<form action="/action_page.php">
  Születési dátum: <input type="date" name="bday">
</form>
E-mail:<input type="text" name="email" size="60" required placeholder="pl.:valami@valami.hu"><br>
Szülő1:<input type="text" name="szulo1" size="50" required placeholder="pl.:Szabóné Ilona"><br>
Szülő2:<input type="text" name="szulo2" size="50" required placeholder="pl.:Szabó Péter"><br>
Szülő E-mail:<input type="text" name="email2" size="60" required placeholder="pl.:valami@valami.hu"><br>
<input type="submit" value="Regisztráció">
</form>
</div>
</body>
</html>