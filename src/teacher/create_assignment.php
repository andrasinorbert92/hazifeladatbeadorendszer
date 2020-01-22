<?php
session_start();
require_once("../common.php");
if(!isLoggedIn()||$_SESSION['level']!=1){
	header("Location:../index.php");
}

?>
<html>
  <head>
    <title>Új házifeladat kiírása</title>
    <link rel="stylesheet" href="/rft/css/main.css">
    
    <link rel="stylesheet" href="/rft/css/create_assignment.css">
    
  </head>
  <body>
    <h1>Házifeladat-beadó Rendszer</h1>
    <div id="valign">
      <div id="box">
        <h2 id="új-házifeladat-kiírása">Új házifeladat kiírása</h2>

        <form id="new_hf" action="create_assignment.php" method="post">
          <select id="hf_class">
            <?php
             // Itt kell lekérni az osztályokat a szervertől
             ?>
            <option value="6b">6.b</option>
            <option value="6c">6.c</option>
            <option value="7a">7.a</option>
          </select>
          <input id="hf_subject" placeholder="Tantárgy..." />
          <input id="hf_name" placeholder="Házifeladat neve..." />
          <input id="hf_hatar" type="date" placeholder="Határidő..." />
          <input type="submit" value="Házifeladat kiírása" />
        </form>

        <p class="centered"><a href="dashboard.php">Vissza</a></p>

      </div>
    </div>
  </body>
</html>
