<?php
session_start();

$user = 'minileboncoin';
$pass = 'userjohnhardy';

$bdd = new PDO('mysql:host=localhost:3306;dbname=john-hardy_minileboncoin',$user,$pass);



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

    <div class="remove">
        <h2>Voulez vous supprimez une annonce ? :</h2>
        <form action="adddelete.php" method="post" enctype="multipart/form-data">
            <input type="text" name="produitdel" placeholder="    produit a supprimer :" required>   
            <button>Supprimer Produit</button>
        </form>

    </div>

    </main>

</body>

</html>