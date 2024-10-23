<?php
include 'database.php';

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    foreach ($users as $user) {
        if ($user->username == $username && $user->password == $password) {
            $_SESSION['username'] = $username;

            header("Location: index.php");
            exit();
        }
    }

    $login_error = "Uporabniško ime ali geslo ni pravilno!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>
</head>
<body>
    <h1>Prijava</h1>

    <?php
    if (isset($login_error)) {
        echo '<p style="color: red;">' . $login_error . '</p>';
    }
    ?>

    <form method="POST" action="login.php">
        <label for="username">Uporabniško ime:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Geslo:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Prijava">
    </form>

</body>
</html>
