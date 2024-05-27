<?php
	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Szachy - gra przeglądarkowa</title>
	<link rel="stylesheet" href="css/styles2.css" />
</head>

<body>
	
<?php

	echo "<p>Witaj ".$_SESSION['user'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';
	echo "<p><b>Ilość Gier</b>: ".$_SESSION['Ilość Gier'];
	echo " | <b>Wygrane</b>: ".$_SESSION['Wygrane'];
	echo " | <b>Przegrane</b>: ".$_SESSION['Przegrane'];
	echo " | <b>Remis</b>: ".$_SESSION['Remis']."</p>";
	echo "<p><b>E-mail</b>: ".$_SESSION['email'];
	
?>
<br>
<br>
  <a href="index1.php" class="przycisk">Strona Główna</a>

</body>
</html>
