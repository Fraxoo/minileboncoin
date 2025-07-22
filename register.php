<?php
session_start();


$user = 'root';
$pass = 'root';

$bdd = new PDO('mysql:host=127.0.0.1;dbname=minileboncoin',$user,$pass);

$email = $_POST['email'];
$password = $_POST['password'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];


if(isset($email,$password,$nom,$prenom)){
    $double = $bdd->prepare('SELECT * FROM compte WHERE email = :email');
    $double->execute([
        'email'=>$email
    ]);
    $doublemail = $double->fetchColumn();

    if($doublemail > 0){
        $used = "Adresse email déja utilisée";
    }else{

$addcomptes = $bdd->prepare('INSERT INTO compte (email,password,nom,prenom) VALUES (:email,:password,:nom,:prenom)');
$addcomptes->execute([
    'email'=>$email,
    'password'=>$password,
    'nom'=>$nom,
    'prenom'=>$prenom
]);
}
}

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

            <form action="register.php" method="post">
                <div class="formulaire">
                    <p>Prenom *</p>
                    <input class="input" type="text" name="prenom" required>
                    <p>Nom *</p>
                    <input class="input" type="text" name="nom" required>
                    <p>E-mail *</p>
                    <input class="input" type="email" name="email" required>
                    <p>Mot de passe *</p>
                    <input class="input" type="password" name="password" required>
                    <p>Confirmation mot de passe *</p>
                    <input class="input" type="password" name="confirm" required>
                    <p>* Requis</p>
                    <p class="red"> <?= $used ?></p>
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