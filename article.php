<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Članek</title>
</head>
<body>

<?php
include 'database.php';

session_start();

if (!isset($_SESSION['username'])) {
    echo '<p>Opozorilo: Za branje vsebine se morate prijaviti. <a href="login.php">Prijava</a></p>';
} else {
    if (isset($_GET['id'])) {
        $Id = $_GET['id'];

        $selected = null;
        foreach ($articles as $article) {
            if ($article->id == $Id) {
                $selected = $article;
                break;
            }
        }

        if ($selected) {
            echo '<h1>' . $selected->title . '</h1>';
            echo '<p>Povzetek: ' . $selected->abstract . '</p>';
            echo '<p>Vsebina: ' . $selected->content . '</p>';
            echo '<p>Avtor: ' . $selected->author . '</p>';
            echo '<p>Datum objave: ' . $selected->date . '</p>';
            echo '<a href="index.php">Nazaj</a>';
        } else {
            echo '<p>Opozorilo: Novica s podanim ID-jem ni bila najdena!</p>';
        }
    } else {
        echo '<p>Opozorilo: Manjkajoči parameter "id" v URL naslovu.</p>';
    }
}

?>

</body>
</html>