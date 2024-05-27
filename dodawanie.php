<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="css/styles.css" />
    <title>Dodawanie nowego użytkownika</title>
</head>
<body>



<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<h2>Dodaj nowego użytkownika</h2>
    Nazwa użytkownika:<br>
    <input type="text" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>" required><br><br>
    Hasło:<br>
    <input type="password" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>" required><br><br>
    Adres email:<br>
    <input type="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required><br><br>
    <input type="submit" value="Dodaj użytkownika"><br><br>
    <a href="index.php" class="link" type="submit">Zaloguj Się</a><br><br>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = 'localhost'; 
    $db_user = 'root'; 
    $db_password = '';
    $db_name = 'szachy'; 

    $conn = new mysqli($host, $db_user, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Błąd połączenia z bazą danych: " . $conn->connect_error);
    }

    $newUser = $_POST['username'];
    $newPassword = $_POST['password'];
    $newEmail = $_POST['email'];

    // Dodatkowa walidacja hasła (minimum 8 znaków, co najmniej jedna duża i jedna mała litera)
    if (strlen($newPassword) < 8 || !preg_match('/[a-z]/', $newPassword) || !preg_match('/[A-Z]/', $newPassword)) {
        echo "Hasło powinno mieć co najmniej 8 znaków oraz zawierać przynajmniej jedną dużą i jedną małą literę.";
        $conn->close();
        exit(); 
    }

    // Haszowanie hasła przed zapisaniem do bazy danych
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    if (strlen($newUser) < 4 || !preg_match('/[a-z]/', $newUser)) {
        echo "Nazwa użytkownika powinna mieć co najmniej 4 znaki.";
        $conn->close();
        exit();
    }

    $newUser = $conn->real_escape_string($newUser);
    $newEmail = $conn->real_escape_string($newEmail);

    $sql = "INSERT INTO uzytkownicy (user, pass, email, `Ilość Gier`, Wygrane, Przegrane, Remis) VALUES ('$newUser', '$hashedPassword', '$newEmail', 0, 0, 0, 0)";

    if ($conn->query($sql) === TRUE) {
        echo "Nowy użytkownik został dodany do bazy danych.";
    } else {
        echo "Błąd podczas dodawania użytkownika: " . $conn->error;
    }

    $conn->close();
}
?>
</body>
</html>
