<?php
session_start();


$user = 'root';
$pass = 'root';

$bdd = new PDO('mysql:host=127.0.0.1;dbname=minileboncoin',$user,$pass);

$email = $_POST['email'];
$password = $_POST['password'];

if(isset($email,$password)){
    $verifcompte = $bdd->prepare('SELECT * FROM compte WHERE email = :email');
    $verifcompte->execute([
        'email'=>$email
    ]);

    $usercompte = $verifcompte->fetch(pdo::FETCH_ASSOC);

 if ($usercompte && password_verify($password,$usercompte['password'])) {
        $_SESSION['id'] = $usercompte['id'];
        $_SESSION['prenom'] = $usercompte['prenom'];
        header("Location: index.php");
        exit();
    } else {
        $erreur = "Email ou mot de passe incorrect";
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
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
            <p class="bold">Connectez-vous a votre compte:</p>

            <form action="login.php" method="post">
                
                <div class="formulaire">
                    <p>E-mail*</p>
                    <input class="mail" type="email" name="email" required>
                    <p>Mot de passe*</p>
                    <input class="mail" type="password" name="password" required>
                    <?= $erreur ?>
                    <button class="boutton">Continuer</button>
                </div>
            </form>
            <div class="none">
                <p>Vous n'avez pas de compte ? <a href="register.php">S'inscrire</a></p>
            </div>
        </div>
    </main>

</body>

</html>