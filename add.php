<?php
session_start();

$user = 'root';
$pass = 'root';

$bdd = new PDO('mysql:host=127.0.0.1;dbname=minileboncoin', $user, $pass);

$nom = $_POST['nom'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$photos = $_FILES['photos']['name'];
$chemintmp = $_FILES['photos']['tmp_name'];


if(isset($nom,$photos,$description,$prix)){
    $addproduit = $bdd->prepare('INSERT INTO produit (nom,description,prix,photos,idcompte) VALUES (:nom,:description,:prix,:photos,:idcompte)');
    $addproduit->execute([
        'nom'=>$nom,
        'description'=>$description,
        'prix'=>$prix,
        'photos'=>$photos,
        'idcompte'=>$_SESSION['id']
    ]);
    move_uploaded_file($chemintmp,'post/' .$photos);
};




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

        <div class="add">
            <h2>Voulez vous ajoutez une annonce ? :</h2>
            <form action="add.php" method="post" enctype="multipart/form-data">
                <p>Produit :</p>
                    <input type="text" name="nom" required>
                <p>Photo :</p>
                    <input class="files" type="file" id="files" name="photos" required>
                <p>Description de l'annonce :</p>
                    <input type="text" name="description" required>
                <p>Prix de l'article :</p>
                    <input class="prix" type="number" name="prix" required>
                <button>Ajoutez Produit</button>
            </form>

        </div>

    </main>

</body>

</html>