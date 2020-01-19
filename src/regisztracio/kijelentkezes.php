<?php
session_start();
echo "<font color='lighblue'>Üdvözöllek: " .$_SESSION["Keresztnev"]. "</font><br />";
if($_SESSION["Vezeteknev"]==$_SESSION["Vezeteknev"] && $_SESSION["Keresztnev"]==$_SESSION["Keresztnev"])
	{
		session_unset();
		session_destroy();
	header("Location: ../index.php");
	}

?>

