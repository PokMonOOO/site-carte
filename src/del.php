<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: connexion.html');
    exit;
}

try {
    $pdo = new PDO('mysql:host=localhost;dbname=login', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur lors de la connexion à la BDD : " . $e->getMessage());
}

$user_id = $_SESSION['user_id'];

try {
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
    $stmt->execute(['id' => $user_id]);

    session_unset();
    session_destroy();

    header('Location: ../index.html');
    exit;

} catch (PDOException $e) {
    die("Erreur lors de la suppression du compte : " . $e->getMessage());
}
?>