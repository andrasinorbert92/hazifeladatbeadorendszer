<html>
<head>
<meta charset="UTF-8" lang="HU">
</head>
<body>
Nem sikerült a regisztráció! Hiba!
	<?php
include "sqlkapcsolat.php";

$Vezeteknev=$_REQUEST['vezeteknev'];
$Keresztnev=$_REQUEST['keresztnev'];
$Jelszo1=$_REQUEST['jelszo1'];
$Jelszo2=$_REQUEST['jelszo2'];
$Szuletesi_datum=$_REQUEST['datum'];
$Email=$_REQUEST['email'];
$Szulo1=$_REQUEST['szulo1'];
$Szulo2=$_REQUEST['szulo2'];
$SzuloEmail=$_REQUEST['szuloemail'];
if($Jelszo1==$Jelszo2)
{
	$Jelszo=md5($Jelszo1);
	$sql="insert into Regisztracio (Vezeteknev,Keresztnev,Jelszo,Szuletesi_datum,Email,Szulo1,Szulo2,Szuloemail) values ('$Vezeteknev','$Keresztnev','$Jelszo','$Szuletesi_datum','$Email','$Szulo1','$Szulo2','$SzuloEmail');";
	mysqli_query($kapcsolat,$sql);
	//echo mysqli_error($kapcsolat);
	header("Location: index.php");
}
else
{
	echo "A két jelszó nem egyezik!";
}


mysqli_close($kapcsolat);
?>
	
	
	
	
</body>
</html>