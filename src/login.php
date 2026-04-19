<?php
session_start();
header('Content-Type: application/json');

try {
    $pdo = new PDO('mysql:host=localhost;dbname=login', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erreur de connexion BDD']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $identifiant = isset($_POST['username']) ? trim($_POST['username']) : ''; 
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if (!empty($identifiant) && !empty($password)) {
        $requete = $pdo->prepare("SELECT * FROM users WHERE username = :id OR email = :id");
        $requete->execute(['id' => $identifiant]);
        $user = $requete->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Identifiant ou mot de passe incorrect']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Veuillez remplir tous les champs']);
    }
}
?>