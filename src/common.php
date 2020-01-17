<?php
function isLoggedIn() {
if(isSet($_SESSION['loggedin']))
	return true;
else
	return false; 
}

function beleptet($name,$pswd,$conn) {
	$sql = "SELECT id FROM users WHERE username='".$name."' AND passwd='".hash('sha256',$pswd)."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	session_start();
    while($row = $result->fetch_assoc()) {
        $_SESSION["loggedin"] = $row["id"];
		$_SESSION["level"]= 0;
    }
}
else{
		$sql = "SELECT id FROM teachers WHERE username='".$name."' AND passwd='".hash('sha256',$pswd)."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		session_start();
		while($row = $result->fetch_assoc()) {
        $_SESSION["loggedin"] = $row["id"];
		$_SESSION["level"]= 1;
    }
}
}
}
?>