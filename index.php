<?php

function lire_dossier(){
    $files = scandir('post');
    return array_diff($files,['.','..','/']);
}

$photos = lire_dossier();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <title>MiniLeboncoin</title>

</head>

<body>

<header>

    <a class="acceuil" href="index.php"><h1>MiniLeboncoin</h1></a>
    <a class="add" href="adddelete.php">Ajoutez / Supprimer un produit</a>
    <form action="/" method="post">
    <input class="bar" type="search" placeholder="rechercher un produit"><input class="loupe" type="image" src="imgsites/search.png"">
    </form>
    <a class="login" href="login.php">Se Connecter</a>

</header>

<main>

    <?php foreach($photos as $photo): ?>
        <div class="post">
            <img src="post/<?= $photo ?>" alt="$photo">
            <p><?= $photo ?></p>
        </div>
    <?php endforeach ?>

</main>



</body>

</html>