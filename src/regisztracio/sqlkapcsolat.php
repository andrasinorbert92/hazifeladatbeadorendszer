<html lang="hu">
	<head>
		<meta charset="utf-8">
	</head>
<body>
<?php
$kapcsolat=mysqli_connect("localhost","rft","BCh32TzA14MyhdsZ","beadando");
if (mysqli_connect_error()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
mysqli_set_charset($kapcsolat,"utf8mb4");
?>
</body>
</html>
