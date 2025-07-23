<?php
session_start();


$user = 'root';
$pass = 'root';

$bdd = new PDO('mysql:host=127.0.0.1;dbname=minileboncoin', $user, $pass);


$bddphotos = $bdd->prepare('SELECT * FROM produit');
$bddphotos->execute();
$bddphoto = $bddphotos->fetchall();

$nom = $_POST['nom'];

if (isset($nom)) {
    foreach ($bddphoto as $produit) {
        if ($produit['nom'] == $nom && $produit['idcompte'] == $_SESSION['id']) {
            unlink('post/' . $produit['photos']);
        }
    }
    $delbdd = $bdd->prepare('DELETE FROM produit WHERE nom = :nom AND idcompte = :idcompte');
    $delbdd->execute([
        'nom' => $nom,
        'idcompte' => $_SESSION['id']
    ]);
}

$bddphotos = $bdd->prepare('SELECT * FROM produit');
$bddphotos->execute();
$bddphoto = $bddphotos->fetchAll();



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <title>MiniLeboncoin</title>

</head>

<body>

    <header>

        <a href="index.php">
            <h1>MiniLeboncoin</h1>
        </a>

    </header>

    <main>

        <div class="tout">


            <div class="produit">
                <p>Liste de vos annonce :</p>
                <?php foreach ($bddphoto as $produit): ?>
                    <?= $produit['nom'] ?>
                <?php endforeach ?>
            </div>


            <div class="remove">
                <h2>Voulez vous supprimez une annonce ? :</h2>
                <form action="remove.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="nom" placeholder="    produit a supprimer :" required>
                    <button>Supprimer Produit</button>
                </form>

            </div>
        </div>
    </main>

</body>

</html>