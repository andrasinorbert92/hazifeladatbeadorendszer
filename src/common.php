<?php
function isLoggedIn() {
if(isSet($_SESSION['belepve']))
	return true;
else
	return false; 
}

function beleptet($email,$pswd,$conn) {
	$sql = "SELECT id FROM users WHERE email='".$email."' AND passwd='".$pswd."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	session_start();
    while($row = $result->fetch_assoc()) {
        $_SESSION["belepve"] = $row["id"];
		$_SESSION["level"]= 0;
    }
}
else{
		$sql = "SELECT id FROM teachers WHERE email='".$email."' AND passwd='".$pswd."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		session_start();
		while($row = $result->fetch_assoc()) {
        $_SESSION["belepve"] = $row["id"];
		$_SESSION["level"]= 1;
    }
}
}
}
?>