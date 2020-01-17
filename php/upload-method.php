<!DOCTYPE html>
<?php
include("../php/kapcsolodas.php");
	 if(isset($_POST['submit']))
		{	

			echo"<pre>";
				print_r($_FILES['file']);
			echo"</pre>"; 
		
$fajlnev=$_FILES['file']['name'];
//echo"$fajnev";

			
			if($_FILES['file']['type']=="application/octet-stream" || $_FILES['file']['type']=="application/x-msdownload")
			{
	
				echo"Nem jó a fájl típusa";
			}
			
			else
			{
				move_uploaded_file($_FILES['file']['tmp_name'],"./uploads/".$_FILES['file']['name']);
				$sql="insert into fajlok (nev,datum) values ('$fajlnev', NOW());";
				mysqli_query($kapcsolat,$sql);
				//echo"$sql<br />";
				
				echo"A feltöltés sikerült";
			}
		}
	
?>

<html lang="hu">
	<head>
		<meta charset="utf-8">
	</head>
	
	<body>
	</body>
</html>