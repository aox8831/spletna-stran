<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spletna stran</title>
</head>
<body>

<?php
include 'database.php';

session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo '<h1>Pozdravljeni, ' . $username . '!</h1>';
    echo '<a href="logout.php">Odjava</a>';
} else {
    echo '<h1>Novice</h1>';
    echo '<a href="login.php">Prijava</a>';
}

foreach ($articles as $article) {
    echo '<h2>' . $article->title . '</h2>';
    echo '<p>' . $article->abstract . '</p>';
    echo '<p>Avtor: ' . $article->author . '</p>';
    echo '<p>Datum objave: ' . $article->date . '</p>';
    echo '<a href="article.php?id=' . $article->id . '"><button>Beri več</button></a>';
    echo '<hr>';
}

?>

</body>
</html>
