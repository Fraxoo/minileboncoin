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
    <link rel="stylesheet" href="style3.css">
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

        <div class="all">
            <p class="bold">Creez votre compte:</p>

            <form action="/" method="post">
                <div class="formulaire">
                    <p>E-mail *</p>
                    <input class="input" type="email" name="email" required>
                    <p>Mot de passe *</p>
                    <input class="input" type="password" name="password" required>
                    <p>Confirmation mot de passe *</p>
                    <input class="input" type="password" name="password2" required>
                    <button class="boutton">Continuer</button>
                </div>
            </form>
            <div class="none">
                <p>Vous avez deja un compte ? <a href="login.php">Se connecter</a></p>
            </div>
        </div>
    </main>




</body>

</html>