<?php
session_start();

$user = 'root';
$pass = 'root';

$bdd = new PDO('mysql:host=127.0.0.1;dbname=minileboncoin', $user, $pass);

function lire_dossier()
{
    $files = scandir('post');
    return array_diff($files, ['.', '..', '/']);
}

$photos = lire_dossier();

$bddphotos = $bdd->prepare('SELECT * FROM produit');
$bddphotos->execute();
$bddphoto = $bddphotos->fetchall();




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

        <a class="acceuil" href="index.php">
            <h1>MiniLeboncoin</h1>
        </a>

        <a class="add" href="adddelete.php">Ajoutez / Supprimer un produit</a>

        <form action="/" method="post">
            <input class="bar" type="search" placeholder="rechercher un produit"><input class="loupe" type="image" src="imgsites/search.png"">
        </form>

        <?php if (!isset($_SESSION['id'])): ?>
            <a class=" login" href="login.php">Se Connecter</a>
        <?php else : ?>
            <a class="login" href="logout.php">Se Deconnecter</a>
        <?php endif ?>

    </header>

    <main>



        <?php if (count($photos) > 0): ?>
            <?php foreach ($photos as $photo): ?>
                <?php foreach ($bddphoto as $produit): ?>
                    <?php if ($produit['photos'] == $photo) : ?>
                        <div class="product">
                            <div class="post">
                                <img src="post/<?= ($produit['photos']) ?>" alt="<?= ($produit['nom']) ?>">
                                <p>produit: <?= ($produit['nom']) ?></p>
                                <p>Description: <?= ($produit['description']) ?></p>
                                <p>Prix :<?= ($produit['prix']) ?> €</p>
                                <p>Publier par : <?= $_SESSION['prenom'] ?></p>

                            </div>
                        </div>


                    <?php endif ?>
                <?php endforeach ?>
            <?php endforeach ?>
        <?php else : ?>
            <div class="hauteur">
                <div class="rien">
                    <p>Aucune annonce en ligne actuellement soyez le premier a en mettre une ! <a href="adddelete.php">Ajoutez</a></p>
                </div>
            </div>
        <?php endif ?>

    </main>



</body>

</html>