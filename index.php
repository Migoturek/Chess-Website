<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: gra.php');
		exit();
	}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" href="css/styles.css" />
	<title>Szachy - gra przeglądarkowa</title>
</head>

<body>
	
	
	
	<form action="zaloguj.php" method="post">
	<h3>Tylko martwi ujrzeli koniec wojny - Platon<h3>
    <label for="login">Login:</label><br>
    <input type="text" id="login" name="login"><br><br>
    <label for="haslo">Hasło:</label><br>
    <input type="password" id="haslo" name="haslo"><br><br>
    <input type="submit" value="Zaloguj się"><br><br>
	<a href="dodawanie.php" class="link" type="submit">Stwórz Konto</a><br><br>
</form>


<?php
	if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
?>

</body>
</html>