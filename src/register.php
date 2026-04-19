<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=login', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la BDD : " . $e->getMessage();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password) && !empty($username)) {
        
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $requete = $pdo->prepare("INSERT INTO users (username, email, password) 
                                  VALUES (:username, :email, :password)");

        try {
            $requete->execute([
                'username' => $username,
                'email'    => $email,
                'password' => $hashedPassword,
            ]);
            header('Location: ../profil.php');
            echo 'Inscription réussie ! <a href="../connexion.html">Connectez-vous ici</a>';
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                echo "Erreur : Ce pseudo ou cet email est déjà utilisé.";
            } else {
                echo "Erreur lors de l'inscription : " . $e->getMessage();
            }
        }

    } else {
        echo 'Veuillez renseigner tous les champs.';
    }
}
?>